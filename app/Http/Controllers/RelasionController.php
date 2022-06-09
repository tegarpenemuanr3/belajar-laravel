<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Hadiah;
use App\Models\AnggotaHadiah;
use Illuminate\Support\Facades\DB;

class RelasionController extends Controller
{
    public function index()
    {
        $anggota = Anggota::orderBy('nama', 'asc')->get();
        $hadiah = Hadiah::orderBy('nama_hadiah', 'asc')->get();
        // $anggotaHadiah = AnggotaHadiah::orderBy('anggota_id', 'asc')->get();
        // dd($anggota);
        return view('anggota.index', [
            'anggota' => $anggota,
            'hadiah' => $hadiah,
            // 'anggotaHadiah' => $anggotaHadiah,
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

    public function edit($id)
    {
        //$anggota = AnggotaHadiah::where($id);
        // $anggota = AnggotaHadiah::find($id);
        // return view('anggota.edit', compact('anggota'));
        $anggota = AnggotaHadiah::findOrFail($id);
        $products = $anggota->anggota_id;
        dd($products);
    }
}
