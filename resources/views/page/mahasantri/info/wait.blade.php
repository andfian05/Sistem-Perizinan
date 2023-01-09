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
@foreach ($tab_out->where('users_id',auth()->user()->id) as $tab)
@if($tab->persetujuan == 'menunggu')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card mt-3" style="border-radius:10px; box-shadow:0px 12px rgba(0, 0, 0, 0.288);">
            <div class="card-body">
                <h6 class="p-4 text-success" style="font-weight:bold;">Alhamdulillah, Laporan Anda Sedang Diajukan.</h6>
            </div>
        </div>
    </div>
</div>
@elseif($tab->persetujuan == 'iya')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card mt-3" style="border-radius:10px; box-shadow:0px 12px rgba(0, 0, 0, 0.288);">
            <div class="card-body">
                <h6 class="p-4 text-primary" style="font-weight:bold;">Alhamdulillah, Pengajuan Laporan Anda Sudah Diterima.</h6>
            </div>
        </div>
    </div>
</div>
@elseif($tab->persetujuan == 'tidak')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card mt-3" style="border-radius:10px; box-shadow:0px 12px rgba(0, 0, 0, 0.288);">
            <div class="card-body">
                <h6 class="p-4 text-danger" style="font-weight:bold;">Mohon Maaf, Pengajuan Laporan Belum Diterima.</h6>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
<div class="container">
    <div class="row">
        <div class="col-6">

            <form action="/logout" method="post">
                @csrf
                <div class="d-flex justify-content-end">
                    <button type="submit" class="mt-2 btn btn-success text-white" style="padding-left: 30px; padding-right: 30px;">Logout</button>
                </div>
            </form>
        </div>
        @if($tab->persetujuan == 'tidak')
        <div class="col-6">

            <div class="d-flex justify-content-end">
                <button class="mt-2 btn btn-danger text-white" onclick="window.location.href='/keterangan'" style="padding-left: 30px; padding-right: 30px;">Coba Lagi</button>
            </div>
        </div>
        </div>
    </div>
    @endif
@endif
@endif
@endsection
