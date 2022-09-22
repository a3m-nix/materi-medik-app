@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">DATA <b>{{ strtoupper($model->nama) }}</b></div>
                    <div class="card-body">
                        <table class="table table-responsive">
                            <tr>
                                <th width="20%">No Pasien</th>
                                <td>: {{ $model->no_pasien }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>: {{ $model->nama }}</td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <td>: {{ $model->umur }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: {{ $model->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Tgl Buat</th>
                                <td>:
                                    {{ $model->created_at->translatedFormat('d-m-Y H:i:s') }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
