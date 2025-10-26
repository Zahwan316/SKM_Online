<?php

namespace App\Http\Controllers\Pembayaran;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pembayaran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate( [
            'id_permohonan' => 'required|exists:permohonan_skm,id',
            'kode_permohonan' => 'required|string',
            'status_pembayaran' => 'required|string',
            'tanggal_pembayaran' => 'required|date',
        ]);

        Pembayaran::create($validate);

        return redirect()->route('pembayaran.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Pembayaran::find($id);

        return view('pembayaran.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Pembayaran::find($id)->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Data Berhasil Dihapus');
    }
}
