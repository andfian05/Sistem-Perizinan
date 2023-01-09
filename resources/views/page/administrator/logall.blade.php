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
<div class="d-flex justify-content-start mb-3">
    <button class="btn btn-primary" onclick="window.location.href='/page-logging'"> Back</button>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 mt-2 mb-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-dark">
                        Mahasantri Sudah Hadir
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($sudah as $sudahs)
                            @foreach ($user as $users)
                                @if($sudahs->users_id === $users->id)
                                    {{ $users->nama }}
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-2 mb-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-dark">
                        Mahasantri Belum Hadir
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($belum as $belums)
                            @foreach ($user as $users)
                                @if($belums->users_id === $users->id)
                                    {{ $users->nama }}
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-2 mb-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-dark">
                        Mahasantri Terlambat
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($late as $lates)
                            @foreach ($user as $users)
                                @if($lates->users_id === $users->id)
                                    {{ $users->nama }}
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
