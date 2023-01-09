<!-- Modal -->
<div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="modalcreate" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form  method="post" action="/page-user" enctype="multipart/form-data">
                @csrf
                <div class="row form-group form-floating-label mb-3">
                    <div class="col-lg-12">
                    <label for="nama" class="col-lg-2 col-form-label fw-semibold">Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control @error('createnama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('createnama') }}">
                    </div>
                    @error('createnama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="row form-group form-floating-label mb-3">
                    <label for="username" class="col-lg-2 col-form-label fw-semibold">Username</label>
                    <div class="col-lg-12">
                        <input id="username" type="text" class="form-control @error('createusername') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('createusername') }}">
                    </div>
                    @error('createusername')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="row form-group form-floating-label mb-3">
                    <label for="password" class="col-lg-2 col-form-label fw-semibold">Password</label>
                    <div class="col-lg-12">
                        <input id="passwordc" type="password" class="form-control @error('createpassword') is-invalid @enderror" name="password" required autofocus value="{{ old('createpassword') }}">
                        <input type="checkbox" onclick="showc()">Show Password
                    </div>
                    @error('createpassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level" class="col-lg-2 col-form-label fw-semibold">Level</label>
                    <select class="form-select @error('createlevel') is-invalid @enderror" id="level" name="level" placeholder="Masukkan level" required autofocus value="{{ old('createlevel') }}">
                        <option selected>-- Level --</option>
                        <option value="administrator">Administrator</option>
                        <option value="security">Security</option>
                        <option value="mahasantri">Mahasantri</option>
                      </select>
                    @error('createlevel')
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
        function showc() {
        var ix = document.getElementById("passwordc");
    if (ix.type === "password") {
        ix.type = "text";
    } else {
        ix.type = "password";
        }
    }
  </script>
