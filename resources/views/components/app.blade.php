@extends('layout')

@section('title', $title ?? '')

@section('body')

    @if (Request::is('gestscol/auth/login') || Request::is('gestscol/auth/switch'))
        <div class="body-wrapper">
            <div class="main-wrapper">
                <div class="page-wrapper full-page-wrapper d-flex align-items-center justify-content-center">
                    {{$slot}}
                </div>
            </div>
        </div>
    @else
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            <x-header></x-header>
            <x-conf-icon></x-conf-icon>
            <div class="app-main">
                <x-side-bar></x-side-bar>
                {{$slot}}
            </div>
        </div>
    @endif
   
@endsection

@if (isset($javascripts))
    @push('javascripts')
        {{ $javascripts }}
    @endpush
@endif