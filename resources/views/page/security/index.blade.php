@extends('partials.main')

@section('content')
@include('partials.profile')
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
<div class="mt-3 mb-3"></div>
@include('card.mahasantri')
@endsection
