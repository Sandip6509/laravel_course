<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConditionalController extends Controller
{
    public function conditionStatement()
    {
        $retArr =[
            'Core PHP Course',
            'Advance PHP Course',
            'Laravel Course'
        ];
        $name = "Sandeep Patel";
        return view('condition_statement',compact('retArr','name'));
    }
}
