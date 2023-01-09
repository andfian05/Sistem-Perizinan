@extends('partials.main')
    @section('content')

@include('partials.profile')
{{-- ADMINISTRATOR --}}
@if(auth()->user()->level == 'administrator')
    @include('page.administrator.index')

{{-- SECURITY --}}
@elseif(auth()->user()->level == 'security')
    @include('page.security.index')

{{-- MAHASANTRI --}}
@elseif(auth()->user()->level == 'mahasantri')
    @include('page.mahasantri.index')


    @endif
@endsection


