@section('title')
    Edit Pemohon
@endsection

@extends('layout.index')

@section('content')
    <div class="w-full">
        <a href="{{ route('pemohon.index') }}">
            <button class='btn btn-primary mb-5'>Kembali</button>
        </a>
        <div class="card shadow mb-4">
            <div class="card-header py-3 w-full">

            </div>
            <div class="card-body w-full p-5">
                @foreach ( $errors->all() as $error )
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
                <form action="{{ route('pemohon.update', ['pemohon' => $data['id']] )}}') }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form row" style="--bs-columns: 4; --bs-gap: 5rem;">
                        <div class='form mb-4 col'>
                            <label>Nama Pemohon</label>
                            <input type="text" class="form-control" name="nama_pemohon" value="{{ $data['nama_pemohon'] }}"/>
                        </div>
                        <div class='form mb-4 col'>
                            <label>Nama Pasien</label>
                            <input type="text" class="form-control" name="nama_pasien" value="{{ $data['nama_pasien'] }}""/>
                        </div>
                        <div class='form mb-4 col'>
                            <label>No RM Pasien</label>
                            <input type="number" class="form-control" name="no_RMpasien" value="{{ $data['no_RMpasien'] }}"/>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form mb-4 col'>
                            <label>Tempat Lahir Pasien</label>
                            <input type="text" class="form-control" name="tempat_lahir_pasien" value="{{ $data['tempat_lahir_pasien'] }}"/>
                        </div>
                        <div class='form mb-4 col'>
                            <label>Tanggal Lahir Pasien</label>
                            <input type="date" class="form-control" name="tanggal_lahir_pasien" value="{{ $data['tanggal_lahir_pasien'] }}"/>
                        </div>
                    </div>
                    <div class='form mb-4'>
                        <label>Tanggal Perawatan Pasien</label>
                        <input type="date" class="form-control" name="tanggal_perawatan_pasien" value="{{ $data['tanggal_perawatan_pasien'] }}"/>
                    </div>
                    <div class='form mb-4'>
                        <label>Jenis Permohonan</label>
                        <input type="text" class="form-control" name="jenis_permohonan" value="{{ $data['jenis_permohonan'] }}"/>
                    </div>
                    <div class="row">
                        <div class='form mb-4 col'>
                            <label>Nomor Telepon</label>
                            <input type="tel" class="form-control" name="no_telepon" value="{{ $data['no_telepon'] }}"/>
                        </div>
                        <div class='form mb-4 col'>
                            <label>Status Pemohon</label>
                            <input type="text" class="form-control" name="status_pemohon" value="{{ $data['status_pemohon'] }}"/>
                        </div>
                    </div>
                    <div class='form mb-4'>
                        <label>Berkas Persyaratan</label>
                        <input type="file" class="form-control" name="upload" accept=".pdf, .doc, .docx, .jpg, .png" />
                    </div>
                    <div class='form mb-4'>
                        <label>Alamat Pasien</label>
                        <input type="text" class="form-control" name="alamat_pasien" value="{{ $data['alamat_pasien'] }}"/>
                    </div>
                    <div class='form mb-4'>
                        <label>Jenis Pengiriman</label>
                        <input type="text" class="form-control" name="jenis_pengiriman" value="{{ $data['jenis_pengiriman'] }}"/>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
