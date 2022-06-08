<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;

class ApiProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::with('edulevel')->get();

        if ($programs->count() > 0) {
            return response()->json($programs);
        } else {
            return response()->json([
                'message' => 'Data Kosong'
            ]);
        }
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
        //belum dibuat validasi

        try {
            $response = Program::create([
                'name' => $request->name,
                'edulevel_id' => $request->edulevel_id,
                'student_price' => $request->student_price,
                'student_max' => $request->student_max,
                'info' => $request->info,
            ]);
            return response()->json([
                'message' => 'Data Berhasil Ditambahkan',
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Belum ada validasi

        try {
            Program::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'edulevel_id' => $request->edulevel_id,
                    'student_price' => $request->student_price,
                    'student_max' => $request->student_max,
                    'info' => $request->info,
                ]);
            return response()->json([
                'message' => 'Data Berhasil Diedit',
                'data' => Program::find($id)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage()
            ], 422);
        }

        // return response()->json([
        //     'data' => $program,
        //     'response' => $request
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $program = Program::find($id);
            $program->delete();
            return response()->json([
                'message' => 'Data Berhasil Dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([ //nilai balik
                'message' => 'Error',
                'errors' => $e->getMessage()
            ]);
        }
    }
}
