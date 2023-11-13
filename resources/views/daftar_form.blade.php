@extends('layouts.app_nice')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">PENDAFTARAN PASIEN</div>
                    <div class="card-body">
                        {!! Form::model($model, [
                            'method' => $method,
                            'route' => $route,
                            'files' => true,
                        ]) !!}
                        <div class="form-group mt-3">
                            <label for="tanggal_daftar">Tanggal Daftar</label>
                            {!! Form::date('tanggal_daftar', $model->tanggal_daftar ?? date('Y-m-d'), ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('tanggal_daftar') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="pasien_id">Nama Pasien</label>
                            {!! Form::select('pasien_id', $pasien, null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('pasien_id') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="poli">Poli</label>
                            {!! Form::select('poli', $poli, null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('poli') }}</span>
                        </div>

                        <div class="form-group mt-3 mb-3">
                            <label for="keluhan">Keluhan</label>
                            {!! Form::textarea('keluhan', null, ['class' => 'form-control', 'rows' => 3]) !!}
                            <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                        </div>
                        {!! Form::submit($namaTombol, ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
