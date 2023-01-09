@extends('partials.main')

@section('content')
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
@elseif(session()->has('failed'))
<script>
    swal({
        title: 'Failed !',
        text: '{{ session('failed') }}',
        icon: 'error',
        buttons : {
            confirm: {
                className : 'btn btn-danger'
            }
    }
});
</script>
@endif
<form action="/send-change" method="POST" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="form-group form-floating-label mb-3">
        <label for="current_password">Current Password</label>
        <input id="current_password" type="password" style="border-radius:15px;" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autofocus value="{{ old('current_password') }}">
        @error('current_password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group form-floating-label mb-3">
        <label for="password">New Password</label>
        <input id="password" type="password" style="border-radius:15px;" class="form-control @error('password') is-invalid @enderror" name="password" required autofocus value="{{ old('password') }}">
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <input type="checkbox" onclick="show()">Show All Password
    </div>
        <button class="align-self-start mt-4 btn btn-primary m-1" type="submit" style="padding-left: 42px; padding-right: 42px">Simpan</button>
        <button class="align-self-end mt-4 btn btn-secondary m-1" type="button" onclick="window.location.href='/welcome'" style="padding-left: 42px; padding-right: 42px">Kembali</button>
    </form>


    <div class="container" style="margin-top:118px;">
        <div class="d-flex justify-content-center">
            <span class="m-3">Keluar Akun</span>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-danger m-2 show-alert-log-box">Logout</button>
            </form>
        </div>
    </div>
    <script>
    $('.show-alert-log-box').click(function(event){
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: "Apakah Anda Yakin Untuk LOGOUT",
          text: "Autentikasi Akan Di RESET",
          icon: "warning",
          type: "warning",
          buttons: ["Cancel","Yes!"],
      }).then((willDelete) => {
          if (willDelete) {
              form.submit();
          }
      });
  });
        function show() {
        var ix = document.getElementById("password");
        var xx = document.getElementById("current_password");
    if (ix.type === "password" || xx.type === "password") {
        ix.type = "text";
        xx.type = "text";
    } else {
        ix.type = "password";
        xx.type = "password";
        }
    }
  </script>
@endsection
