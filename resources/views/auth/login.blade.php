<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @php
        $setting = App\Models\Config::first();
    @endphp

    <title>{{ $setting->name }} - Login @yield('title')</title>

    @if ($setting->icon)
        <link rel="icon" href="{{ asset('upload/site_setting/' . $setting->icon) }}">
    @else
        <link rel="icon" href="{{ asset('img/logo.png') }}">
    @endif
</head>



<body class="font-mono bg-hero-pattern"
    @if ($setting->background) style="background-image: url({{ asset('upload/site_setting/' . $setting->background) }})"
    @else
        style="background-image: url({{ asset('img/bg.jpeg') }})" @endif>
    <!-- START main -->
    <main class="my-28 mx-10">
        <!-- START Formulario login -->
        <div class="md:grid md:grid-cols-3 md:gap-3">
            <div class="md:invisible xs:hidden">
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-lg">
                <div class="hero container max-w-screen-lg mx-auto flex justify-center">
                    @if ($setting->logo)
                        <img class="h-52 w-46" src="{{ asset('upload/site_setting/' . $setting->logo) }}"
                            alt="logo">
                    @else
                        <img class="h-52 w-46" src="{{ asset('img/logo.png') }}">
                    @endif
                </div>
                @include('layouts.alert')
                <form method="POST" action="{{ route('login') }}" autocomplete="off">
                    @csrf
                    <div class="mt-10">
                        <label for="email" class="block mb-1 text-gray-600 font-semibold">{{ __('Email') }}</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                            class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" required autofocus />
                    </div>
                    <div class="mt-4">
                        <label for="password"
                            class="block mb-1 text-gray-600 font-semibold">{{ __('Password') }}</label>
                        <input id="password" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full"
                            type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <button type="submit"
                        class="mt-4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded text-center"
                        style="width: 100%">{{ __('Log in') }}</button>
                </form>
            </div>
        </div>
        <!-- END Formulario login -->
    </main>
    <!-- END main -->
</body>

</html>
