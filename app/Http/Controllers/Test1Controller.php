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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'surname'       => 'required',
            'id_number'     => 'required|max:13',
            'date_of_birth' => 'required|date'
        ];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveForm(Request $request)
    {
        //$validated = $request->validated();

        //var_dump($validated); exit;

        // Validate input
        if (true) {
            $id_number = trim($request->input('id_number'));

            $exists = Test1::where('id_number', $id_number)->get();
            var_dump($exists);

            $test1 = new Test1();
            $test1->name = $request->input('name');
            $test1->surname = $request->input('surname');
            $test1->id_number = $request->input('id_number');
            $test1->date_of_birth = $request->input('date_of_birth');

            $test1->save();
        } else {
            $request->session()->flash('danger', 'All fields are required!');

            return redirect('/test1')->withInput();
        }
    }
}
