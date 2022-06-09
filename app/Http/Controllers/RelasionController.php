<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Hadiah;
use App\Models\AnggotaHadiah;

class RelasionController extends Controller
{
    public function index()
    {
        $anggota = Anggota::get();
        $anggotaHadiah = AnggotaHadiah::get();
        // dd($anggota);
        return view('anggota.index', [
            'anggota' => $anggota,
            'anggotaHadiah' => $anggotaHadiah,
        ]);
    }

    public function create()
    {
        $anggota = Anggota::all();
        $hadiah = Hadiah::all();
        return view('anggota.create', compact('anggota', 'hadiah'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'anggota_id' => 'required',
                'hadiah_id' => 'required',
            ],
            [
                'anggota_id.required' => 'Anggota tidak boleh kosong',
                'hadiah_id.required' => 'Hadiah tidak boleh kosong',
            ]
        );

        AnggotaHadiah::create([
            'anggota_id' => $request->anggota_id,
            'hadiah_id' => $request->hadiah_id,
        ]);

        return redirect('anggota')->with('status', 'Hadiah Anggota berhasil ditambah!');
    }

    public function destroy($id)
    {
        $student = AnggotaHadiah::find($id);
        $student->delete();
        return redirect('anggota')->with('status', 'Anggota Deleted Successfully');
    }
}
