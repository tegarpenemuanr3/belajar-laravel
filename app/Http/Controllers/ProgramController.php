<?php

namespace App\Http\Controllers;

use App\Models\Edulevel;
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
        $edulevels = Edulevel::all();
        return view('program.create', compact('edulevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3',
                'edulevel_id' => 'required'
            ],
            [
                'name.required' => 'Nama jenjang tidak boleh kosong',
                'edulevel_id.required' => 'Jenjang tidak boleh kosong'
            ]
        );

        //Cara 1 : Eloquent orm bawaan
        // $program = new Program;
        // $program->name = $request->name;
        // $program->edulevel_id = $request->edulevel_id;
        // $program->student_price = $request->student_price;
        // $program->student_max = $request->student_max;
        // $program->info = $request->info;
        // $program->save();

        //Cara 2 : mass assignment cocok untuk penerapan API
        //Syarat di model terdeapat $fillable / $guarded
        //$hidden bisa untuk optional
        // Program::create([
        //     'name' => $request->name,
        //     'edulevel_id' => $request->edulevel_id,
        //     'student_price' => $request->student_price,
        //     'student_max' => $request->student_max,
        //     'info' => $request->info,
        // ]);

        //Cara 3: quick mass assigment > syarat: field tabel dan name inputan harus sama
        // Program::create($request->all());

        //Cara 4: gabungan antara Eloquent bawaan dengan mass assigment
        $program = new Program([
            'name' => $request->name,
            'edulevel_id' => $request->edulevel_id,
            'student_price' => $request->student_price,
            'student_max' => $request->student_max,
            'info' => $request->info,
        ]);
        $program->student_price = $request->student_price;
        $program->save();

        //Penjelasan cara 4
        //yang digunakan adalah 2 jalur jadi ketika data di model misal student_price di guarded. maka jalur masuk student_price akan masuk lewat eloquent biasa. kenapa begini karena ketika data umum bisa masuk lewat mass assigment dan data penting akan masuk lewat eloquent bawaan

        return redirect('programs')->with('status', 'Program berhasil ditambah!');
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
        $edulevels = Edulevel::all();
        return view('program.edit', compact('program', 'edulevels'));
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
        $request->validate(
            [
                'name' => 'required|min:3',
                'edulevel_id' => 'required'
            ],
            [
                'name.required' => 'Nama jenjang tidak boleh kosong',
                'edulevel_id.required' => 'Jenjang tidak boleh kosong'
            ]
        );

        //$program = Program::find($program->id); //ini tidak perlu dilakukan karena di $program sudah sesuai ID

        //Cara 1 : Eloquent orm bawaan
        // $program->name = $request->name;
        // $program->edulevel_id = $request->edulevel_id;
        // $program->student_price = $request->student_price;
        // $program->student_max = $request->student_max;
        // $program->info = $request->info;
        // $program->save();

        //Cara 2: Mass Assigment
        Program::where('id', $program->id)
            ->update([
                'name' => $request->name,
                'edulevel_id' => $request->edulevel_id,
                'student_price' => $request->student_price,
                'student_max' => $request->student_max,
                'info' => $request->info,
            ]);

        return redirect('programs')->with('status', 'Program berhasil diedit!');
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
