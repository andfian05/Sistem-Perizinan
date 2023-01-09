<div class="d-flex justify-content-start">
    <button class="btn btn-primary" onclick="window.location.href='/page-all-log'"> check kehadiran</button>
</div>
<div class="row">
    <form action="/page-logging" method="get">
        @csrf
        <div class="col-md-6">
            <div class="input-group mb-3 mt-3">
                <input type="text" class="form-control" placeholder="Cari Mahasantri..." style="border-top-left-radius: 50px; border-bottom-left-radius: 50px;" name="search" value="{{ request('search') }}">
                <button class="btn btn-primary text-white" type="submit" style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;">Search</button>
            </div>
        </div>
    </form>
  </div>
@if($user->count())
@foreach ($tab_outing->where('users_id') as $tab_outing)
@foreach ($user as $users)
@if($tab_outing->users_id === $users->id)
{{-- @dd($users->nama) --}}
<div class="col-md-4 mt-4">
    <div class="card" style="box-shadow:0px 10px rgba(0, 0, 0, 0.411) ;">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('assets/images/profile.jpg') }}" class="w-50" alt="">
            </div>
                @if($tab_outing->notify === 'true')
            <button class="badge bg-warning" style="border:0px;">
                PENGAJUAN MASUK PESANTREN
            </button>
                @endif
            <div class="container mt-3">
                <h6 style="font-size: 15px;"> Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $users->nama }}</h4>
                    <h6 style="font-size: 15px;"> Kamar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:    {{ $users->kamar }}</h4>
                    <h6 style="font-size: 15px;"> Keterangan&nbsp;&nbsp;:    {{ $tab_outing->keterangan }}</h4>
                    <h6 style="font-size: 15px;"> Absen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:    {{ $tab_outing->absen }} datang</h4>
                    <h6 style="font-size: 15px;"> Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:    {{ $tab_outing->persetujuan }}</h4>
                        <h6 style="font-size: 15px;"> Kelas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:    {{ $users->kelas }}</h4>
                            <h6 style="font-size: 15px;">Angkatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:{{ $users->angkatan }}</h4>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <form action="/sub-call/{{ $tab_outing->id }}" method="post">
                                    @method('patch')
                                    @csrf
                                    @if($tab_outing->persetujuan === 'menunggu')
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6 col-md-6">
                                                    <form action="/iya/{{ $tab_outing->id }}" method="post">
                                                        @method('patch')
                                                        @csrf
                                                        <input type="text" name="persetujuan" id="persetujuan" value="iya" style="display: none;">
                                                        <button class="btn btn-success" type="submit">
                                                            Iya
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <form action="/tidak/{{ $tab_outing->id }}" method="post">
                                                        @method('patch')
                                                        @csrf
                                                        <input type="text" name="persetujuan" id="persetujuan" value="tidak" style="display: none;">
                                                        <button class="btn btn-danger" type="submit">
                                                            Tidak
                                                        </button>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        @elseif($tab_outing->persetujuan === 'iya')
                                            @if($tab_outing->absen === 'sudah' && $tab_outing->persetujuan === 'iya')
                                                <input style="display:none;" name="absen" value="belum">
                                                <button class="btn btn-danger" type="submit" style="padding-left: 35px; padding-right: 35px;">Belum</button>
                                            @elseif($tab_outing->absen === 'belum' && $tab_outing->persetujuan === 'iya')
                                                <input style="display:none;" name="absen" value="sudah">
                                                <button class="btn btn-success" type="submit" style="padding-left: 35px; padding-right: 35px;">Datang</button>
                                            @endif
                                        @elseif($tab_outing->persetujuan === 'tidak')
                                                <div class="bg-warning" style="padding-left: 35px !important; padding-right: 35px !important; padding:6px; border-radius:12px;">izin ditolak</div>
                                        @endif          
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endforeach
                @else
                <script>
                    swal({
                        title: 'Null !',
        text: 'Kata Kunci "{{ request('search') }}" Tidak Ditemukan',
        icon: 'warning',
        buttons : {
            confirm: {
                className : 'btn btn-warning'
            }
        }
    });
    </script>
@endif