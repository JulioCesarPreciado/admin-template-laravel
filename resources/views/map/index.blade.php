@extends('layouts.app')
{{-- Nombre en el title --}}
@section('title')
    {{ __('Maps') }}
@endsection
{{-- Nombre en el header --}}
@section('header')
    {{ __('Maps') }}
@endsection
{{-- Contenido --}}
@section('content')
    <div class="flex flex-wrap">
        {{-- START Mapa --}}
        <div class="w-full px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-slate-100 border-0">

                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-slate-700 text-xl font-bold">
                            {{ __('Maps') }}
                        </h6>
                        <select id="tianguis" class="w-1/2 select2 selectpicker">
                            <option value="0">{{ __('ALL TIANGUIS') }}</option>
                        </select>
                        <button id="search"
                            class="bg-green-500 text-white active:bg-green-800 hover:bg-green-600 hover:shadow-xl font-bold uppercase text-xs px-4 py-2 rounded shadow outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">{{ __('Search') }}<i
                                class="fas fa-search pl-2"></i></button>
                    </div>
                </div>
                <div class="flex-auto">
                    <div id="map" style="width: 100%; height:450px;"></div>
                </div>
            </div>
        </div>
        {{-- END Mapa --}}
    </div>

    @push('js')
        @include('map.scripts')
    @endpush
@endsection
