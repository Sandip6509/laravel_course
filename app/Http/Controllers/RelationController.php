<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class RelationController extends Controller
{
    public function viewCities(Request $request)
    {
        $cities = new \stdClass;
        $countries = Country::get();
        if(isset($request->county)){
            $cities = Country::where('id',$request->county)->with('cities')->first();
            $cities = $cities->cities;
        }
        return view('has_one_through',compact('countries','cities'));
    }

    public function viewMultipleCities(Request $request)
    {
        $cities = new \stdClass;
        $countries = Country::get();
        if(isset($request->county)){
            $cities = Country::where('id',$request->county)->with('multiplecities')->first();
            $cities = $cities->multiplecities;
        }
        return view('has_many_through',compact('countries','cities'));
    }
}
