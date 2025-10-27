@section('title')
    List Pemohon
@endsection

@extends('layout.index')

@section('content')
    <div>
        <a class="mb-4" href="{{ route('pemohon.create') }}">
            <button class="btn btn-primary">+ Tambah</button>
        </a>
        <div class="card shadow mb-4">
            <div class="card-header py-3 w-full">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Pemohon</th>
                        <th>Nama Pasien</th>
                        <th>No RM Pasien</th>
                        <th>Tempat lahir pasien</th>
                        <th>Tanggal lahir pasien</th>
                        <th>Tanggal perawatan pasien</th>
                        <th>Jenis Permohonan</th>
                        <th>No Telepon</th>
                        <th>Status Pemohon</th>
                        <th>Berkas Persyaratan</th>
                        <th>Alamat Pasien</th>
                        <th>Jenis Pengiriman</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        @foreach ($data as $item => $value)
                            <td>{{ $item + 1 }}</td>
                            <td>{{ $value['nama_pemohon']}}</td>
                            <td>{{ $value['nama_pasien']}}</td>
                            <td>{{ $value['no_RMpasien']}}</td>
                            <td>{{ $value['tempat_lahir_pasien']}}</td>
                            <td>{{ $value['tanggal_lahir_pasien']}}</td>
                            <td>{{ $value['tanggal_perawatan_pasien']}}</td>
                            <td>{{ $value['jenis_permohonan'] }}</td>
                            <td>{{ $value['no_telepon'] }}</td>
                            <td>{{ $value['status_pemohon'] }}</td>
                            <td></td>
                            <td>{{ $value['alamat_pasien'] }}</td>
                            <td>{{ $value['jenis_pengiriman']}}</td>
                            <td>
                                <a href="{{ route('pemohon.edit', ['pemohon' => $value['id']]) }}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>

                                <a href="{{ route('pemohon.show', ['pemohon' => $value['id']] )}}">
                                    <button class="btn btn-primary">Detail</button>
                                </a>

                                <form method="post" action="{{ route('pemohon.destroy', $value['id']) }}" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

