<?php

namespace App\Http\Controllers\API;

use App\Events\WelcomeEmail;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CrudOperation;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $requestData = $request->all();
            $search = empty($requestData['search']) ? $requestData['serach'] : null;
            $users = CrudOperation::where('first_name', 'LIKE','%'.$search .'%')->with('getCountry')->paginate(5);
            return response()->json(['status' => 200, 'message' => 'Data retrieved successfully.','data'=> $users]);
        } catch (\Exception $ex) {
            return response()->json(['status' => 500, 'message' => $ex->getMessage(),'data'=> null]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $requestData = $request->all();
            if(!empty($requestData['profile'])){
                $imgName = 'course_' . rand() . '.' . $request->profile->extension();
                $request->profile->move(public_path('profiles/'), $imgName);
                $requestData['profile'] = $imgName;
            }
            $requestData['country'] = $request->country_id;
            $user = CrudOperation::create($requestData);
            event(new WelcomeEmail($user));
            return response()->json(['status' => 200, 'message' => 'User data stored successfully.','data'=> $user]);
        }catch(\Exception $ex){
            return response()->json(['status' => 500, 'message' => $ex->getMessage(),'data'=> null]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CrudOperation $crud)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CrudOperation $crud)
    {
        try {
            $crud->first_name = $request->first_name ?? $crud->first_name;
            $crud->last_name = $request->last_name ?? $crud->last_name;
            $crud->email = $request->email ?? $crud->email;
            $crud->contact = $request->contact ?? $crud->contact;
            $crud->gender = $request->gender ?? $crud->gender;
            $crud->hobbies = $request->hobbies ?? $crud->hobbies_arr;
            $crud->address = $request->address ?? $crud->address;
            $crud->country = $request->country ?? $crud->country;
            $crud->save();
            return response()->json(['status' => 200, 'message' => 'User Updated Successfully.', 'data' => $crud]);
        } catch (\Exception $ex) {
            return response()->json(['status' => 500, 'message' => $ex->getMessage(), 'data' => null]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CrudOperation $crud)
    {
        try{
            $crud->delete();
            return response()->json(['status' => 200, 'message' => 'User deleted Successfully.', 'data' => $crud]);
        }catch(\Exception $ex){
            return response()->json(['status' => 500, 'message' => $ex->getMessage(), 'data' => null]);
        }
    }

    public function imageUpdate(Request $request)
    {
        try{
            $requestData = $request->all();
            $user = CrudOperation::find($requestData['user_id']);
            if(!empty($requestData['profile'])){
                $imgName = 'course_' . rand() . '.' . $request->profile->extension();
                $request->profile->move(public_path('profiles/'), $imgName);
                $user->profile = $imgName;
                $user->save();
            }
            return response()->json(['status' => 200, 'message' => 'User image updated Successfully.', 'data' => $user]);
        }catch(\Exception $ex){
            return response()->json(['status' => 500, 'message' => $ex->getMessage(), 'data' => null]);
        }
    }
}
