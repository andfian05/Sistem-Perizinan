<div class="row mb-4">
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
    @if($outing->where('status')->value('status') !== 'on')
    <h1 class="text-center mt-4" style="font-size:33px; font-weight:bold;">Data Masih Kosong!</h1>
    <div class="container" style="margin-top:18px;">
    <div class="d-flex justify-content-center">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-danger m-2 show-alert-log-box">Logout !</button>
            </form>
        </div>
    </div>
    @elseif($outing->where('status')->value('status') !== 'off')
    <div class="col-md-6">
        <div class="card mt-3" style="border-radius:10px; box-shadow:0px 7px rgba(0, 0, 0, 0.288);">
            <div class="card-header" style="background-color: rgb(102, 95, 95); border-top-left-radius:10px; border-top-right-radius:10px; ">
                <h5 class="text-white">Keluar Pesantren</h5>
            </div>
            <div class="card-body">
                @foreach ($outing->where('status','on') as $out)
                    <h3 class="p-2">{{ $out->tanggal_keluar }} Pukul {{ $out->jam_keluar }}</h3>
                    @php
                        $jam_keluar = $out->jam_keluar;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mt-4" style="border-radius:10px; box-shadow:0px 7px rgba(0, 0, 0, 0.288);">
            <div class="card-header" style="background-color: rgb(102, 95, 95); border-top-left-radius:10px; border-top-right-radius:10px;">
                <h5 class="text-white">Masuk Pesantren </h5>
            </div>
            <div class="card-body">
                @foreach ($outing->where('status','on') as $out)
                    <h3 class="p-2">{{ $out->tanggal_masuk }} Pukul {{ $out->jam_masuk }}</h3>
                    @php
                        $jam_masuk = $out->jam_masuk;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
<button onclick="window.location.href = '/keterangan'" class="btn btn-primary text-white p-2 m-2"  {{ (strtotime($jam_keluar) >= strtotime("now") || strtotime($jam_masuk) <= strtotime("now")) ? "disabled" : ""; }} > Keluar Asrama</button>
@foreach ($tab_outing->where('users_id',auth()->user()->id) as $tab)
@if($tab->persetujuan === 'iya')
<form action="/masuk/{{ $tab->id }}" method="post">
    @method('patch')
    @csrf
    <input type="text" name="notify" id="notify" value="true" style="display: none;">
    <button type="submit" class="btn btn-danger text-white p-2 m-2">Masuk Asrama</button>
</form>
@endif
@endforeach
@endif
</div>
