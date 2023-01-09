@extends('partials.main')

@section('content')
    <form method="post" action="/page-outing" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="tanggal_keluar" class="mb-2 mt-3" style="text-transform:capitalize; font-weight:bolder;">Tanggal Keluar</label>
                <input id="tanggal_keluar" type="text" class="flatpickr js-date form-control @error('tanggal_keluar') is-invalid @enderror input-border-bottom" id="tanggal_keluar" name="tanggal_keluar" required autofocus value="{{ old('tanggal_keluar') }}">
                @error('tanggal_keluar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
        <div class="form-group">
            <label for="tanggal_masuk" class="mb-2 mt-3" style="text-transform:capitalize; font-weight:bolder;">Tanggal Masuk</label>
            <input id="tanggal_masuk" type="text" class="flatpickr js-date form-control @error('tanggal_masuk') is-invalid @enderror input-border-bottom" id="tanggal_masuk" name="tanggal_masuk" required autofocus value="{{ old('tanggal_masuk') }}">
            @error('tanggal_masuk')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="form-group">
            <label for="jam_keluar" class="mb-2 mt-3" style="text-transform:capitalize; font-weight:bolder;">Jam Keluar</label>
            <input id="jam_keluar" type="text" class="flatpickr js-time form-control @error('jam_keluar') is-invalid @enderror input-border-bottom" id="jam_keluar" name="jam_keluar" required autofocus value="{{ old('jam_keluar') }}">
            @error('jam_keluar')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="form-group">
            <label for="jam_masuk" class="mb-2 mt-3" style="text-transform:capitalize; font-weight:bolder;">Jam Masuk</label>
            <input id="jam_masuk" type="text" class="flatpickr js-time form-control @error('jam_masuk') is-invalid @enderror input-border-bottom" id="jam_masuk" name="jam_masuk" required autofocus value="{{ old('jam_masuk') }}">
            @error('jam_masuk')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="align-self-center">
            <button  type="submit" class="btn btn-primary mt-2">Submit</button>
        </div>
    </form>
        {{-- MACHINE --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr(".flatpickr.js-date", {
                enableTime:false,
                time_24hr:false,
            altInput: false,
            altFormat: 'd-m-Y',
            dateFormat: 'd-m-Y',
        });
        flatpickr(".flatpickr.js-time", {
            enableTime:true,
            time_24hr:true,
            altInput: true,
            altFormat: 'H:i',
            dateFormat: 'H:i',
            noCalendar: true
        });
    </script>
@endsection
