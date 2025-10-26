<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\LaporanSkm;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = LaporanSkm::all();

        return view('laporan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate( [
            'tanggal_penyerahan' => 'required|date',
            'id_permohonan' => 'required|exists:permohonan_skm,id',
            'id_user' => 'required|exists:users,id',
            'id_pemohon' => 'required|exists:pemohon,id',
        ]);

        $create = LaporanSkm::create($validate);

        return redirect()->route('laporan.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = LaporanSkm::find($id);

        return view('laporan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = LaporanSkm::find($id);

        return view('laporan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate( [
            'tanggal_penyerahan' => 'nullable|date',
            'id_permohonan' => 'nullable|exists:permohonan_skm,id',
            'id_user' => 'nullable|exists:users,id',
            'id_pemohon' => 'nullable|exists:pemohon,id',
        ]);

        $update = LaporanSkm::find($id)->update($validate);

        return redirect()->route('laporan.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = LaporanSkm::find($id)->delete();

        return redirect()->route('laporan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
