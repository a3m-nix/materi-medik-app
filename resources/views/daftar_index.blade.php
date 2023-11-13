@extends('layouts.app_nice')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">DATA PENDAFTARAN PASIEN</div>
                    <div class="card-body">
                        <a href="{{ route('daftar.create') }}" class="btn btn-primary btn-sm mt-3">
                            Tambah Data
                        </a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Poli</th>
                                    <th>Keluhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pasien->nama }}</td>
                                        <td>{{ $item->pasien->jenis_kelamin }}</td>
                                        <td>{{ $item->tanggal_daftar }}</td>
                                        <td>{{ $item->poli }}</td>
                                        <td>{{ $item->keluhan }}</td>
                                        <td>
                                            {!! Form::open([
                                                'route' => ['daftar.destroy', $item->id],
                                                'method' => 'delete',
                                                'onsubmit' => 'return confirm("Yakin mau dihapus?")',
                                            ]) !!}
                                            <a href="{{ route('daftar.show', $item->id) }}" class="btn btn-info btn-sm ml-2">
                                                Detail
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm ml-2">
                                                Hapus
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
