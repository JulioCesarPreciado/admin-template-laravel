@php
$route = Route::current()->getName();
 $setting = App\Models\Config::first();
@endphp
<nav
    class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div
        class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button
            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
            type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a href="{{ route('dashboard.index') }}" aria-label="Dashboard">
            @if (isset($setting->logo))
                <img src="{{ asset('upload/site_setting/' . $setting->logo) }}" alt=""
                    style="height: 70px;">
            @else
                <img src="{{ asset('img/logo.png') }}"
                    style="height: 70px;">
            @endif
        </a>

        {{-- START header en moviles --}}
        <ul class="md:hidden items-center flex flex-wrap list-none">
            <li class="inline-block relative">
                <a class="text-slate-500 block" href="#" onclick="openDropdown(event,'user-responsive-dropdown')">
                    <div class="items-center flex">
                        <span
                            class="w-12 h-12 text-sm text-white bg-slate-200 inline-flex items-center justify-center rounded-full">
                            <img alt="profile picture" class="w-full rounded-full align-middle border-none shadow-lg"
                                src="{{ Auth::user()->profile_photo_url ?? asset('img/user.png') }}" />
                        </span>
                    </div>
                </a>
                <div class="hidden bg-white text-base text-center z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                    id="user-responsive-dropdown">
                    <a href="{{ route('profile.show') }}"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:text-slate-500"><i class="fas fa-user"></i> {{ __('Profile') }}</a>
                    <a href="#"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:text-slate-500"><i class="fas fa-tools"></i> {{ __('Settings') }}</a>
                    <div class="h-0 my-2 border border-solid border-slate-100"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" @click.prevent="$root.submit();"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:text-red-500">
                            <i class="fas fa-sign-out-alt"></i>{{ __('Sign Out') }}
                        </button>
                    </form>
                </div>
            </li>
        </ul>
        {{-- END header en moviles --}}
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-slate-200">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-slate-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                            href="{{ route('dashboard.index') }}">
                            @if (isset($setting->logo))
                                <img class="h-10" src="{{ asset('upload/site_setting/' . $setting->logo) }}" alt="logo">
                            @else
                                <img src="{{ asset('img/logo.png') }}" style="height: 70px;">
                            @endif
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button"
                            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                            onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                {{-- START Dashboard --}}
                <li class="items-center">
                    <a href="{{ route('dashboard.index') }}"
                        class="text-xs uppercase py-3 font-bold block @if ($route == 'dashboard.index') text-{{$setting->color}}-{{$setting->shade}} hover:text-{{$setting->color}}-300 @else hover:text-slate-500 @endif">
                        <i class="fas fa-tv mr-2 text-sm @if ($route == 'dashboard.index') opacity-75 @else text-slate-300 @endif"></i>
                        {{ __('Dashboard') }}
                    </a>
                </li>
                {{-- END Dashboard --}}
                {{-- START Mapa --}}
                <li class="items-center">
                    <a href="{{ route('map') }}"
                        class="text-xs uppercase py-3 font-bold block @if ($route == 'map') text-{{$setting->color}}-{{$setting->shade}} hover:text-{{$setting->color}}-300 @else hover:text-slate-500 @endif">
                        <i class="fas fa-map mr-2 text-sm @if ($route == 'map') opacity-75 @else text-slate-300 @endif"></i>
                        {{ __('Map') }}
                    </a>
                </li>
                {{-- END Mapa --}}
                {{-- START Settings --}}
                <li class="items-center">
                    <a id="text_color" href="{{ route('configs.index') }}"
                    class="text-xs uppercase py-3 font-bold block @if ($route == 'configs.index') text-{{$setting->color}}-{{$setting->shade}} hover:text-{{$setting->color}}-300 @else hover:text-slate-500 @endif">
                        <i class="fas fa-tools mr-2 text-sm @if ($route == 'configs.index') opacity-75 @else text-slate-300 @endif"></i>
                        {{ __('Settings') }}
                    </a>
                </li>
                {{-- END Settings --}}
            </ul>
        </div>
    </div>
</nav>
