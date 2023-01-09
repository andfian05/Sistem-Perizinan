@foreach ($mahasantri as $santri)
<form method="POST" action="/page-mahasantri/{{ $santri->id }}" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="modal fade text-left" id="ModalEdit-{{ $santri->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header align-self-lg-center">
                    <h4 class="text-upppercase modal-title">Edit Data User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row form-group form-floating-label mb-3">
                        <div class="col-lg-12">
                        <label for="nama" class="fw-semibold">Nama Lengkap</label>
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama',$santri->nama) }}">
                        </div>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row form-group form-floating-label mb-3">
                        <label for="username" class="fw-semibold">Username</label>
                        <div class="col-lg-12">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username',$santri->username) }}">
                        </div>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row form-group form-floating-label mb-3">
                        <div class="col-lg-12">
                            <label for="current_password" class="fw-semibold">Password Lama</label>
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required autofocus value="{{ old('current_password') }}">
                        </div>
                        @error('current_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row form-group form-floating-label mb-3">
                        <div class="col-lg-12">
                            <label for="password" class="fw-semibold">Password Baru</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus value="{{ old('password') }}">
                            <input type="checkbox" onclick="show()">Show All Password
                        </div>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3" style="display: none;">
                        <label for="level" class="col-lg-2 col-form-label fw-semibold">Level</label>
                        <select class="form-select @error('level') is-invalid @enderror" id="level" name="level">
                            <option value="{{ $santri->level }}">{{ $santri->level }}</option>
                          </select>
                        @error('level')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="kelas" class="col-lg-2 col-form-label fw-semibold">Kelas</label>
                        <select class="form-select @error('kelas') is-invalid @enderror" id="kelas" name="kelas">
                            <option value="{{ old('kelas',$santri->kelas) }}">{{ old('kelas',$santri->kelas) }}</option>
                          </select>
                        @error('kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="angkatan" class="col-lg-2 col-form-label fw-semibold">Angkatan</label>
                        <select class="form-select @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan">
                            <option value="{{ old('angkatan',$santri->angkatan) }}">{{ old('angkatan',$santri->angkatan) }}</option>
                          </select>
                        @error('angkatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="kamar" class="col-lg-2 col-form-label fw-semibold">Kamar</label>
                        <select class="form-select @error('kamar') is-invalid @enderror" id="kamar" name="kamar">
                            <option value="{{ old('kamar',$santri->kamar) }}">{{ old('kamar',$santri->kamar) }}</option>
                          </select>
                        @error('kamar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label @error('image') is-invalid @enderror">Upload Gambar</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5" style="float: left;">
                        <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="m-2 btn btn-primary">Submit</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
<script>
    function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const ofReader = new FileReader();
    ofReader.readAsDataURL(image.files[0]);

    ofReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
        }
    }
    function show() {
        var xi = document.getElementById("current_password");
        var ix = document.getElementById("password");
    if (xi.type === "password" || ix.type === "password") {
        xi.type = "text";
        ix.type = "text";
    } else {
        xi.type = "password";
        ix.type = "password";
        }
    }
</script>
