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
@include('card.mahasantri')
@endsection
