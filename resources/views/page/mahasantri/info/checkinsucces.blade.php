@extends('partials.main')

@section('content')
@include('partials.profile')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card mt-3" style="border-radius:10px; box-shadow:0px 12px rgba(0, 0, 0, 0.288);">
            <div class="card-body">
                <h6 class="p-2" style="font-weight:bold;"><font class="text-primary">Anda Berhasil Check In.</font> Silahkan Lapor Ke Security Terlebih Dahulu, Selamat Belajar Kembali Dan Melaksanakan Tanggung Jawabnya.</h6>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <button class="mt-2 btn btn-primary text-white" style="padding-left: 30px; padding-right: 30px;">Lapor</button>
</div>
@endsection
