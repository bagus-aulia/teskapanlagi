@extends('biodata.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-danger {{ (count($errors) > 0 ? '': 'hidden') }}">
              Ada kesalahan dalam peng-inputan data! Silahkan cek kembali inputan Anda. <br>
            </div>

            <div class="alert alert-warning {{ (isset($notFound) ? '': 'hidden') }}">
               {!! (isset($notFound) ? $notFound : '') !!}
            </div>

            <div class="alert alert-danger hidden" id="errorCharacter">
                <p>Penggunaan karakter tersebut tidak diperbolehkan!</p>
            </div>

            <div class="card">
                <div class="card-header">{!! (isset($judulForm) ? $judulForm : 'Isi Biodata Anda.') !!}</div>

                <div class="card-body">
                    {!! Form::open(['action' => 'BiodataController@store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                      {!! Form::label('nama', 'Nama', ['class' => 'col-sm-3 control-label']) !!}
                      <div class="col-sm-9">
                        {!! Form::text('nama', (isset($nama) ? $nama : ""), ['class' => 'form-control', 'placeholder' => 'Nama', 'autofocus' => 'true', 'required' => 'true', 'id' => 'nama', 'onkeypress' => 'return keyValidate(event)']) !!}
                      </div>
                      {!! ($errors->has('nama')) ? Form::label('nama', $errors->first('nama') , ['class' => 'col-sm-12 control-label error']) : '' !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('mail', 'Email', ['class' => 'col-sm-3 control-label']) !!}
                      <div class="col-sm-9">
                        {!! Form::email('mail', (isset($mail) ? $mail : ""), ['class' => 'form-control', 'placeholder' => 'Email', 'required' => 'true', 'onkeypress' => 'return keyValidate(event)']) !!}
                      </div>
                      {!! ($errors->has('mail')) ? Form::label('mail', $errors->first('mail') , ['class' => 'col-sm-12 control-label error']) : '' !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('tglLahir', 'Tanggal Lahir', ['class' => 'col-sm-3 control-label']) !!}
                      <div class="col-sm-9">
                        {!! Form::date('tglLahir', (isset($tglLahir) ? $tglLahir : ""), ['class' => 'form-control', 'placeholder' => 'Tanggal Lahir', 'required' => 'true']) !!}
                      </div>
                      {!! ($errors->has('tglLahir')) ? Form::label('tglLahir', $errors->first('tglLahir') , ['class' => 'col-sm-12 control-label error']) : '' !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('alamat', 'Alamat', ['class' => 'col-sm-3 control-label']) !!}
                      <div class="col-sm-9">
                        {!! Form::text('alamat', (isset($alamat) ? $alamat : ""), ['class' => 'form-control', 'placeholder' => 'Alamat', 'required' => 'true', 'onkeypress' => 'return keyValidate(event)']) !!}
                        {!! Form::hidden('namaFile', (isset($namaFile) ? $namaFile : ""), ['class' => 'form-control', 'placeholder' => 'Nama File', 'id' => 'namaFile', 'onkeypress' => 'return keyValidate(event)']) !!}
                      </div>
                      {!! ($errors->has('alamat')) ? Form::label('alamat', $errors->first('alamat') , ['class' => 'col-sm-12 control-label error']) : '' !!}
                    </div>

                    <div class="form-group">
                      <div class="col-sm-9 col-sm-offset-3">
                        {!! Form::submit('Simpan', ['class' => "btn btn-primary", 'id' => 'btnSimpan']) !!}
                        <button type="button" class="btn btn-danger" onclick="resetInput()">Reset</button>
                      </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
