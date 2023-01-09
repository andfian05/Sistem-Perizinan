<!-- Modal -->
<div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Mahasantri</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="/page-mahasantri" enctype="multipart/form-data">
                @csrf
                <div class="row form-group form-floating-label mb-3">
                    <div class="col-lg-12">
                        <label for="nama" class="col-lg-2 col-form-label fw-semibold">Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control @error('createnama') is-invalid @enderror" id="createnama" name="nama" required autofocus value="{{ old('createnama') }}">
                    </div>
                    @error('createnama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="row form-group form-floating-label mb-3">
                    <div class="col-lg-12">
                    <label for="username" class="col-lg-2 col-form-label fw-semibold">Username</label>
                        <input id="username" type="text" class="form-control @error('createusername') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('createusername') }}">
                    </div>
                    @error('createusername')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="row form-group form-floating-label mb-3">
                    <div class="col-lg-12">
                    <label for="password" class="col-lg-2 col-form-label fw-semibold">Password</label>
                        <input id="password" type="password" class="form-control @error('createpassword') is-invalid @enderror" id="password" name="password" required autofocus value="{{ old('createpassword') }}">
                    </div>
                    @error('createpassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div style="display:none;" class="form-group">
                    <label for="level" class="col-lg-2 col-form-label fw-semibold">Level</label>
                    <select class="form-select @error('createlevel') is-invalid @enderror" id="level" name="level" placeholder="Masukkan level" required autofocus>
                        <option value="mahasantri" selected>?</option>
                      </select>
                    @error('createlevel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kamar" class="col-lg-2 col-form-label fw-semibold">Kamar</label>
                    <select class="form-select @error('createkamar') is-invalid @enderror" id="kamar" name="kamar" placeholder="Masukkan kamar" required autofocus>
                        <option selected>-- Kamar --</option>
                        <option value="administrator">Administrator</option>
                        <option value="security">Security</option>
                        <option value="mahasantri">Mahasantri</option>
                      </select>
                    @error('createkamar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kelas" class="col-lg-2 col-form-label fw-semibold">Kelas</label>
                    <select class="form-select @error('createkelas') is-invalid @enderror" id="kelas" name="kelas" placeholder="Masukkan kelas" required autofocus>
                        <option value="administrator" {{ old('createkelas') == 'administrator' ? 'selected' : '' }}>Administrator</option>
                        <option value="security" {{ old('createkelas') == 'security' ? 'selected' : '' }}>Security</option>
                        <option value="mahasantri" {{ old('createkelas') == 'mahasantri' ? 'selected' : '' }}>Mahasantri</option>
                      </select>
                    @error('createkelas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="angkatan" class="col-lg-2 col-form-label fw-semibold">Angkatan</label>
                    <select class="form-select @error('createangkatan') is-invalid @enderror" id="angkatan" name="angkatan" placeholder="Masukkan angkatan" required autofocus>
                        <option value="administrator" {{ old('createangkatan') == 'administrator' ? 'selected' : '' }}>Administrator</option>
                        <option value="security" {{ old('createangkatan') == 'administrator' ? 'selected' : '' }}>Security</option>
                        <option value="mahasantri" {{ old('createangkatan') == 'administrator' ? 'selected' : '' }}>Mahasantri</option>
                      </select>
                    @error('angkatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label @error('image') is-invalid @enderror">Upload Gambar</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
      </div>
    </div>
  </div>
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
    </script>
