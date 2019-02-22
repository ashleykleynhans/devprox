<?php

namespace App\Http\Controllers;

use App\Test2;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Validator;

class Test2Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function renderForm(Request $request)
    {
        return view('test2');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function uploadCsv(Request $request)
    {
        try {
            $filename = $request->csv->getClientOriginalName();
            $request->csv->storeAs('csv', $filename);

            $path = storage_path('app/csv');

            $fh = fopen("$path/$filename", 'r');

            if ($fh) {
                // Discard the headings
                $line = fgets($fh);

                while (($line = fgets($fh)) !== false) {
                    // process the line read.
                    $line = trim($line);

                    $data = explode(',', $line);
                    $dob = explode('/', $data[5]);

                    $test2 = new Test2();
                    $test2->id = $data[0];
                    $test2->name = $data[1];
                    $test2->surname = $data[2];
                    $test2->initials = $data[3];
                    $test2->age = $data[4];
                    $test2->date_of_birth = implode('-', array_reverse($dob));
                    $test2->save();
                }

                fclose($fh);

                $request->session()->flash('success', 'CSV file was successfully imported to the database.');
            } else {
                $request->session()->flash('danger', 'Unable to open the CSV file that was uploaded.');
            }
        } catch(\Exception $e) {
            $request->session()->flash('danger', 'Unable to upload CSV: '. $e->getMessage());
        }

        return redirect('/test2');
    }
}
