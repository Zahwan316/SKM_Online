<?php

namespace App\Http\Controllers\PermohonanSkm;

use App\Http\Controllers\Controller;
use App\Models\PermohonanSkm;
use Illuminate\Http\Request;

class PermohonanSkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = PermohonanSkm::all();

        return view('permohonan_skm.index', compact($data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('permohonan_skm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate( [
            'id_pemohon' => 'required|exists:pemohon,id',
            'id_user' => 'required|exists:users,id',
            'tarif' =>'required|integer',
            'tanggal_permohonan' => 'required|date',
            'status_permohonan' => 'required|string',
            'nama_dokter' => 'required|string',
            'status_verifikasi_permohonan' => 'required|string',
        ]);

        $insert = PermohonanSkm::create($validate);

        return redirect()->route('permohonan_skm.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = PermohonanSkm::find($id);

        return view('permohonan_skm.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = PermohonanSkm::find($id);

        return view('permohonan_skm.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate( [
            'id_pemohon' => 'nullable|exists:pemohon,id',
            'id_user' => 'nullable|exists:users,id',
            'tarif' =>'nullable|integer',
            'tanggal_permohonan' => 'nullable|date',
            'status_permohonan' => 'nullable|string',
            'nama_dokter' => 'nullable|string',
            'status_verifikasi_permohonan' => 'nullable|string',
        ]);


        $insert = PermohonanSkm::find($id)->create($validate);

        return redirect()->route('permohonan_skm.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = PermohonanSkm::find($id)->delete();

        return redirect()->route('permohonan_skm.index')->with('success', 'Data Berhasil Dihapus');
    }
}
