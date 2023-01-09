@extends('partials.main')

@section('content')
@include('partials.profile')
@if($out->where('status')->value('status') == 'off')
<h1 class="text-center mt-4" style="font-size:33px; font-weight:bold;">Data Masih Kosong!</h1>
<div class="container" style="margin-top:18px;">
    <div class="d-flex justify-content-center">
        <button type="submit" onclick="window.location.href='/welcome'" class="btn btn-primary m-2 show-alert-log-box">Your Page ?</button>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-danger m-2 show-alert-log-box">Logout !</button>
        </form>
    </div>
</div>
@elseif($out->where('status')->value('status') == 'on')
@if (session()->has('success'))
<script>
    swal({
    title: 'Berhasil !',
    text: '{{ session('success') }}',
    icon: 'success',
    buttons : {
        confirm: {
            className : 'btn btn-success'
        }
    }
});
</script>
@endif
@foreach ($out->where('status','on') as $outs)
@php
    $jam_keluar = $outs->jam_keluar;
    $jam_masuk = $outs->jam_masuk;
@endphp
@endforeach
@if(strtotime($jam_keluar) >= strtotime("now") || strtotime($jam_masuk) <= strtotime("now"))
<h1 class="text-center mt-4" style="font-size:33px; font-weight:bold;">Belum Waktunya!</h1>
<div class="container" style="margin-top:18px;">
    <div class="d-flex justify-content-center">
        <button type="submit" onclick="window.location.href='/welcome'" class="btn btn-primary m-2 show-alert-log-box">Your Page ?</button>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-danger m-2 show-alert-log-box">Logout !</button>
        </form>
    </div>
</div>
@else
<form action="/text-send" method="POST">
    @csrf   
<div class="container">
    <input id="users_id" type="text" class="form-control @error('users_id') is-invalid @enderror" id="users_id" style="display:none;" name="users_id" required autofocus value="{{ auth()->user()->id }}">
<div class="d-flex justify-content-start">
    <font class="text-dark m-2" style="font-weight: bold;">Keterangan Perizinan</font>
</div>
    <div class="d-flex justify-content-start">
        <textarea name="keterangan" type="text" class="@error('keterangan') is-invalid @enderror" id="keterangan" cols="40" rows="8" style="border-radius: 15px; border:none;" required autofocus value="{{ old('keterangan') }}"></textarea>
    </div>
    <button type="submit" class="btn btn-primary m-3">Kirim Data</button>
</div>
</form>
@endif
@endif
@endsection
