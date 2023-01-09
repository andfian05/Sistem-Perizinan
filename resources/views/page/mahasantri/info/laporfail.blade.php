@extends('partials.main')

@section('content')
@include('partials.profile')
@if($out->where('status')->value('status') === 'off')
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
@elseif($out->where('status')->value('status') === 'on')
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

<div class="d-flex justify-content-end">
    <button class="mt-2 btn btn-danger text-white" onclick="window.location.href='/keterangan'" style="padding-left: 30px; padding-right: 30px;">Coba Lagi</button>
</div>
@endif
@endif
@endsection
