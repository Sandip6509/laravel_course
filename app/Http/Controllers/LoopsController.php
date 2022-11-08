<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoopsController extends Controller
{
    public function loopExample()
    {
        $retArr =[
            'Core Php',
            'Advance Php',
            'Laravel',
            'Codeignter'
        ];
        $count = 1;
        return view('loop', compact('retArr','count'));
    }
}
