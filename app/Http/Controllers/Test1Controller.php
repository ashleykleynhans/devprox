<?php

namespace App\Http\Controllers;

use App\Test1;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Validator;

class Test1Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function renderForm(Request $request)
    {
        return view('test1');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveForm(Request $request)
    {
        // Check whether the ID number already exists in the DB before attempting to save it
        $id_number = trim($request->input('id_number'));
        $exists = Test1::where('id_number', $id_number)->get();

        if ($exists->count()) {
            $request->session()->flash('danger', 'A record with a duplicate ID already exists in the database.');

            return redirect('/test1')->withInput();
        }

        $test1 = new Test1();
        $test1->name = $request->input('name');
        $test1->surname = $request->input('surname');
        $test1->id_number = $request->input('id_number');
        $test1->date_of_birth = $request->input('date_of_birth');

        $test1->save();
        $request->session()->flash('success', 'Record was successfully saved to the database.');

        return redirect('/test1');
    }
}
