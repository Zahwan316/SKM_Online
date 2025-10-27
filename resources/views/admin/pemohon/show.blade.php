@section('title')
    Detail Pemohon
@endsection

@extends('layout.index')

@section('content')
    <div>
        <a href="{{ route('pemohon.index') }}">
            <button class='btn btn-primary mb-5'>Kembali</button>
        </a>
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div>
                    <div>
                        <h5 class="font-bold">Nama Pemohon</h5>
                        <p>{{ $data->nama_pemohon }}</p>
                    </div>
                    <div>
                        <h5 class="font-bold">Nama Pasien</h5>
                        <p>{{ $data->nama_pasien }}</p>
                    </div>
                    <div>
                        <h5 class="font-bold">No RM Pasien</h5>
                        <p>{{ $data->no_RMpasien }}</p>
                    </div>
                    <div>
                        <h5 class="font-bold">Tempat Lahir Pasien</h5>
                        <p>{{ $data->tempat_lahir_pasien }}</p>
                    </div>
                    <div>
                        <h5 class="font-bold">Tanggal Lahir Pasien</h5>
                        <p>{{ $data->tanggal_lahir_pasien }}</p>
                    </div>
                    <div>
                        <h5 class="font-bold">Tanggal Perawatan Pasien</h5>
                        <p>{{ $data->tanggal_perawatan_pasien }}</p>
                    </div>
                    <div>
                        <h5 class="font-bold">Jenis Permohonan</h5>
                        <p>{{ $data->jenis_permohonan }}</p>
                    </div>
                    <div>
                        <h5 class="font-bold">Nomor Telepon</h5>
                        <p>{{ $data->no_telepon }}</p>
                    </div>
                    <div>
                        <h5 class="font-bold">Status Pemohon</h5>
                        <p>{{ $data->satatus_pemohon }}</p>
                    </div>
                    <div>
                        <h5 class="font-bold">Alamat Pasien</h5>
                        <p>{{ $data->alamat_pasien }}</p>
                    </div>
                    <div>
                        <h5 class="font-bold">Jenis pengirim</h5>
                        <p>{{ $data->jenis_pengirim }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
