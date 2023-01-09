@extends('partials.main')

@section('content')
@if (session()->has('loginError'))
<script>
swal({
    title: 'Gagal !',
    text: '{{ session('loginError') }}',
    icon: 'error',
    buttons : {
        confirm: {
            className : 'btn btn-danger'
        }
    }
});
</script>
@endif
<form action="/checkacc" method="POST">
    @csrf
        <div class="d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="exampleFormControlInput1" style="font-weight:bold; margin-bottom:4px;">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" required value="{{ old('username') }}">
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <div class="form-group">
                <label for="exampleFormControlInput1" style="font-weight:bold; margin-bottom:4px;">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required value="{{ old('password') }}">
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-primary" type="submit" style="padding-left: 42px; padding-right: 42px">Masuk</button>
        </div>
    </div>
</form>
@endsection
