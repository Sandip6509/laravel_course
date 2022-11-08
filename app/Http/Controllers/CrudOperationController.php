<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CrudOperation;
use Illuminate\Http\Request;

class CrudOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = CrudOperation::with('getCountry')->paginate(1);
        return view('crud.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('crud.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $requestData = $request->except(['_token']);
        $imgName = 'course_' . rand() . '.' . $request->profile->extension();
        $request->profile->move(public_path('profiles/'), $imgName);
        $requestData['profile'] = $imgName;
        $requestData['country'] = $request->country_id;
        CrudOperation::create($requestData);
        return redirect()->route('crud.index')->with('success', 'User Inserted Successfully.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrudOperation  $crudOperation
     * @return \Illuminate\Http\Response
     */
    public function show(CrudOperation $crud)
    {
        $countries = Country::all();
        return view('crud.show', compact('countries','crud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrudOperation  $crudOperation
     * @return \Illuminate\Http\Response
     */
    public function edit(CrudOperation $crud)
    {
        $countries = Country::all();
        return view('crud.edit', compact('countries','crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrudOperation  $crudOperation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CrudOperation $crud)
    {
        $crud->first_name = $request->first_name ?? $crud->first_name;
        $crud->last_name = $request->last_name ?? $crud->last_name;
        $crud->email = $request->email ?? $crud->email;
        $crud->contact = $request->contact ?? $crud->contact;
        $crud->gender = $request->gender ?? $crud->gender;
        $crud->hobbies = $request->hobbies ?? $crud->hobbies;
        $crud->address = $request->address ?? $crud->address;
        $crud->country = $request->country_id ?? $crud->country;
        if(isset($request->profile)){
            $imgName = 'course_' . rand() . '.' . $request->profile->extension();
            $request->profile->move(public_path('profiles/'), $imgName);
            $request->profile = $imgName;
        }
        $crud->save();
        return redirect()->route('crud.index')->with('success', 'User updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrudOperation  $crudOperation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CrudOperation $crud)
    {
        $crud->delete();
        return redirect()->route('crud.index')->with('success', 'User deleted Successfully.');
    }
}
