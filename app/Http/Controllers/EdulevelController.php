<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdulevelController extends Controller
{
    public function data()
    {
        $edulevel = DB::table('edulevels')->get();
        //dd($edulevel);
        // return view('edulevel.data', ['edulevel' => $edulevel]);
        // return view('edulevel.data', compact('edulevel'));
        return view('edulevel.data')->with('edulevel', $edulevel);
    }
}
