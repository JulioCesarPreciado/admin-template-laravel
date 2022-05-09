@extends('layouts.app')
{{-- Nombre en el title --}}
@section('title')
    {{ __('Settings') }}
@endsection
{{-- Nombre en el header --}}
@section('header')
    {{ __('Settings') }}
@endsection
{{-- Contenido --}}
@section('content')
    <div class="flex flex-wrap">
        <!-- CARD Config-->
        @include('Config.config')
    </div>
@endsection
