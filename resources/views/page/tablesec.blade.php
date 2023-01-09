@foreach ($thereout as $out)
<div class="col-md-4 mt-4">
    <div class="card" style="box-shadow:0px 10px rgba(0, 0, 0, 0.411) ;">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('assets/images/profile.jpg') }}" class="w-50" alt="">
            </div>
            <div class="container mt-3">
                <h6 style="font-size: 15px;"> Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $out->nama }}</h4>
                    <h6 style="font-size: 15px;"> Kamar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:    {{ $out->kamar }}</h4>
                        <h6 style="font-size: 15px;"> Kelas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:    {{ $out->kelas }}</h4>
                            <h6 style="font-size: 15px;"> Angkatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:   {{ $out->angkatan }}</h4>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <button class="btn btn-primary" style="padding-left: 35px; padding-right: 35px;">Datang</button>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach
