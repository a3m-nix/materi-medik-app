@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">TAMBAH PASIEN</div>
                    <div class="card-body">
                        {!! Form::model($model, [
                            'method' => $method,
                            'route' => $route,
                            'files' => true,
                        ]) !!}

                        @if ($model->foto != null)
                            <img src="{!! Storage::url($model->foto) !!}" alt="">
                        @endif
                        <div class="form-group">
                            <label for="foto">Gambar Pasien</label>
                            {!! Form::file('foto', ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="no_pasien">Nomor Pasien</label>
                            {!! Form::file('foto', ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                        </div>

                        <div class="form-group mt-3">
                            <label for="no_pasien">Nomor Pasien</label>
                            {!! Form::text('no_pasien', null, ['class' => 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('no_pasien') }}</span>
                        </div>

                        <div class="form-group mt-3">
                            <label for="nama">Nama</label>
                            {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="umur">Umur</label>
                            {!! Form::text('umur', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('umur') }}</span>
                        </div>
                        <div class="form-check mt-3">
                            {!! Form::radio('jenis_kelamin', 'laki-laki', null, [
                                'id' => 'jenis_kelamin_lk',
                                'class' => 'form-check-input',
                            ]) !!}
                            <label class="form-check-label" for="jenis_kelamin_lk">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            {!! Form::radio('jenis_kelamin', 'perempuan', null, [
                                'id' => 'jenis_kelamin_pr',
                                'class' => 'form-check-input',
                            ]) !!}
                            <label class="form-check-label" for="jenis_kelamin_pr">
                                Perempuan
                            </label>
                            <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                        </div>

                        {!! Form::submit($namaTombol, ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
