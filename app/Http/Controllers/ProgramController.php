<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

// Generate Controller lewat cmd dengan 'php artisan make:controller NameController --resource --model=Program'
// --resource  artinya akan mengenerate function secara otomatis 
// untuk cek route 'php artisan route:list' dan untuk generate route dengan resource dengan 'Route::resource('nameURI','NameController')'
// --model=Program artinya kita membuat sebuah model dengan nama Program


class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all(); //retrieve model

        //untuk tampil data langsung (debugging)
        // $programs = Program::with('edulevel')->get();
        // return $programs;

        return view('program/index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //penerapan route model binding
        //route binding artinya ketika ada route yang sesuai maka auto menjalankan program

        //$program->makeHidden('edulevel_id'); //hidden data
        $program->makeHidden(['edulevel_id', 'id']); //hidden data
        //return $program;
        return view('program/show', compact('program'));
    }

    // public function show($id)
    // {
    //     //$program = Program::find($id); //jadi objek

    //     $program = Program::where('id', $id)->get(); //jadi array objek
    //     $program = $program[0];

    //     return $program;
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        //
    }
}
