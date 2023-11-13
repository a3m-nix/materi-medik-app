@extends('layouts.app_nice')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">DATA PASIEN</div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'laporanpasien.index', 'method' => 'GET', 'target' => 'blank']) !!}
                        <div class="row mt-3">
                            <div class="form-group col-md-4">
                                <label for="tanggal_mulai">Tanggal Daftar Mulai</label>
                                {!! Form::date('tanggal_mulai', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tanggal_akhir">Tanggal Daftar Akhir</label>
                                {!! Form::date('tanggal_akhir', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                {!! Form::select(
                                    'jenis_kelamin',
                                    [
                                        'semua' => 'Tampil Semua Data',
                                        'laki-laki' => 'Laki-laki',
                                        'perempuan' => 'Perempuan',
                                    ],
                                    null,
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>
                        </div>
                        {!! Form::submit('CETAK', ['class' => 'btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
