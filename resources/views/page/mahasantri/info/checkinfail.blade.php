@extends('partials.main')

@section('content')
@include('partials.profile')
<div class="row mb-12">
    <div class="col-md-12">
        <div class="card mt-3" style="border-radius:10px; box-shadow:0px 12px rgba(0, 0, 0, 0.288);">
            <div class="card-body">
                <h6 class="p-2" style="font-weight:bold;"><font class="text-danger">Anda Tidak Bisa Check In.</font> Anda Masih Diluar Jangkauan Pesantren, Mohon Kembali Pada Kawasan Pesantren Terlebih Dahulu.
        </div>
    </div>
</div>
</div>
<div class="d-flex justify-content-center">
    <button class="mt-5 btn btn-primary text-white">Coba Lagi</button>
</div>
@endsection

