<?php

namespace App\Http\Controllers\Pemohon;

use App\Http\Controllers\Controller;
use App\Models\Pemohon;
use App\Models\Upload;
use Illuminate\Http\Request;

class PemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Pemohon::all();

        return view('admin.pemohon.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pemohon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //
        $validate = $request->validate( [
            // 'id_upload' => 'required',
            'nama_pemohon' => 'required|string',
            'nama_pasien' => 'required|string',
            'no_RMpasien' => 'required|integer',
            'tempat_lahir_pasien' => 'required|string',
            'tanggal_lahir_pasien' => 'required|date',
            'tanggal_perawatan_pasien' => 'required|date',
            'jenis_permohonan' => 'required|string',
            'no_telepon' => 'required|string',
            'status_pemohon' => 'required|string',
            'upload' => 'nullable|mimes:pdf',
            'jenis_pengiriman' => 'required|string',
            'alamat_pasien' => 'required|string',
        ]);

        if($request->hasFile('upload')) {
            $upload = $request->file('upload');
            $uploadName = time() . '.' . $upload->getClientOriginalExtension();
            $saveUpload = Upload::create([
                'upload' => $uploadName,
                'id_user' => auth()->guard()->user()->id
            ]);
            $upload->move(public_path('upload'), $uploadName);
            $insert = Pemohon::create([
                'nama_pemohon' => $request->nama_pemohon,
                'nama_pasien' => $request->nama_pasien,
                'id_upload' => $saveUpload->id,
                'no_RMpasien' => $request->no_RMpasien,
                'tempat_lahir_pasien' => $request->tempat_lahir_pasien,
                'tanggal_lahir_pasien' => $request->tanggal_lahir_pasien,
                'tanggal_perawatan_pasien' => $request->tanggal_perawatan_pasien,
                'jenis_permohonan' => $request->jenis_permohonan,
                'no_telepon' => $request->no_telepon,
                'status_pemohon' => $request->status_pemohon,
                'jenis_pengiriman' => $request->jenis_pengiriman,
                'alamat_pasien' => $request->alamat_pasien,
            ]);
        }
        else{
            $insert = Pemohon::create($validate);
        }



        return redirect()->route('pemohon.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Pemohon::find($id);

        return view('admin.pemohon.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Pemohon::find($id);

        return view('admin.pemohon.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate( [
            'id_upload' => 'nullable',
            'nama_pemohon' => 'nullable|string',
            'nama_pasien' => 'nullable|string',
            'no_rm_pasien' => 'nullable|integer',
            'tempat_lahir_pasien' => 'nullable|string',
            'tanggal_lahir_pasien' => 'nullable|date',
            'tanggal_perawatan_pasien' => 'nullable|date',
            'jenis_pasien' => 'nullable|string',
            'no_telepon' => 'nullable|string',
            'status_pemohon' => 'nullable|string',
            'upload' => 'nullable|mimes:pdf',
            'jenis_pengiriman' => 'nullable|string',
            'alamat_pasien' => 'nullable|string'
        ]);


        if($request->hasFile('upload')) {
            $upload = $request->file('upload');
            $uploadName = time() . '.' . $upload->getClientOriginalExtension();
            $saveUpload = Upload::create([
                'upload' => $uploadName,
                'user_id' => auth()->guard()->user()->id
            ]);
            $upload->move(public_path('upload'), $uploadName);
            $update = Pemohon::find($id)->update([
                'nama_pemohon' => $request->nama_pemohon,
                'nama_pasien' => $request->nama_pasien,
                'id_upload' => $request->id_upload,
                'no_rm_pasien' => $request->no_rm_pasien,
                'tempat_lahir_pasien' => $request->tempat_lahir_pasien,
                'tanggal_lahir_pasien' => $request->tanggal_lahir_pasien,
                'tanggal_perawatan_pasien' => $request->tanggal_perawatan_pasien,
                'jenis_pasien' => $request->jenis_pasien,
                'no_telepon' => $request->no_telepon,
                'status_pemohon' => $request->status_pemohon,
                'jenis_pengiriman' => $request->jenis_pengiriman
            ]);
        }
        else{
            $update = Pemohon::find($id)->update([
                'nama_pemohon' => $request->nama_pemohon,
                'nama_pasien' => $request->nama_pasien,
                'no_rm_pasien' => $request->no_rm_pasien,
                'tempat_lahir_pasien' => $request->tempat_lahir_pasien,
                'tanggal_lahir_pasien' => $request->tanggal_lahir_pasien,
                'tanggal_perawatan_pasien' => $request->tanggal_perawatan_pasien,
                'jenis_pasien' => $request->jenis_pasien,
                'no_telepon' => $request->no_telepon,
                'status_pemohon' => $request->status_pemohon,
                'jenis_pengiriman' => $request->jenis_pengiriman,
                'alamat_pasien' => $request->alamat_pasien,
            ]);
        }


        return redirect()->route('pemohon.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{
            $delete = Pemohon::find($id)->delete();
            return redirect()->route('pemohon.index')->with('success', 'Data Berhasil Dihapus');
        }
        catch(\Exception $e){
            return redirect()->route('pemohon.index')->with('error', 'Data Gagal Dihapus');
        }
    }

    public function searchKodePermohonan(Request $request){
        $data = Pemohon::where('kode_permohonan', 'like', '%' . $request->keyword . '%')->get();
        return response()->json($data);
    }
}
