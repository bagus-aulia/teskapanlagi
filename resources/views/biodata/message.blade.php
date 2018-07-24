@extends('biodata.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-{{ (Session::has('class') ? session('class') : 'info' )}}">
                <p>{!! (Session::has('info') ? 'Terima kasih telah mengisi form. '.session('info') : 'Silahkan menuju halaman utama untuk mengisi form.') !!}</p>
            </div>
            <center> <a href="{{ secure_url('/') }}"> Kembali ke Halaman Utama</a> | <a href="{{ secure_url('/biodata/list.html') }}">Lihat Daftar Biodata</a> </center>
        </div>
    </div>
</div>
@endsection
