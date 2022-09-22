@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">DATA PASIEN</div>
                    <div class="card-body">
                        <a href="{{ route('pasien.create') }}" class="btn btn-primary btn-sm">
                            Tambah Data
                        </a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>No Pasien</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tgl Buat</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->no_pasien }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->umur }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            {!! Form::open([
                                                'route' => ['pasien.destroy', $item->id],
                                                'method' => 'delete',
                                                'onsubmit' => 'return confirm("Yakin mau dihapus?")',
                                            ]) !!}
                                            <a href="{{ route('pasien.show', $item->id) }}" class="btn btn-info btn-sm ml-2">
                                                Detail
                                            </a>
                                            <a href="{{ route('pasien.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm ml-2">
                                                Edit
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
