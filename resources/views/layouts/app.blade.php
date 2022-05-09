<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Perspective Global de México">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    @php
        $setting = App\Models\Config::first();
    @endphp

    <title>{{ $setting->name }} Admin - @yield('title')</title>

    @if ($setting->icon)
        <link rel="icon" href="{{ asset('upload/site_setting/' . $setting->icon) }}">
    @else
        <link rel="icon" href="{{ asset('img/logo.png') }}">
    @endif


    @include('layouts.styles')
</head>

<body class="text-slate-700 antialiased">
    <div id="root">
        {{-- START sidebar --}}
        @include('layouts.sidebar')
        {{-- END sidebar --}}
        <div class="relative md:ml-64 bg-blueGray-50">
            {{-- START header --}}
            @include('layouts.header')


                   <div id="banner_color" class="relative bg-{{$setting->color}}-{{$setting->shade}} md:pt-32 pb-32 pt-12">

                <div class="px-4 md:px-10 mx-auto w-full">
                </div>
            </div>
            {{-- END header --}}
            <div class="px-4 md:px-10 mx-auto w-full -m-24">
                {{-- START main --}}
                @yield('content')
                {{-- END main --}}
                {{-- START footer --}}
                @include('layouts.footer')
                {{-- END footer --}}
            </div>
        </div>
    </div>
    {{-- START scripts --}}
    @include('layouts.scripts')
    @include('layouts.utils')
    @stack('js')
    {{-- END scripts --}}
</body>

</html>
