@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
    {{-- Auth Part Part --}}
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/login_header.css') }}">
    {{-- Login Visual Part --}}
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/visual_part/login_visual_effects.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/visual_part/login_visual_brand.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/visual_part/login_visual_content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/visual_part/login_visual_footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/login_form.css') }}">
    {{-- Login Field Part --}}
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/field_part/login_field_label.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/field_part/login_field_input.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/field_part/login_field_password.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/field_part/login_field_options.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/field_part/login_field_button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/login_footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/auth_part/login_part/login_resp.css') }}">
    <div class="roomora-login">
        {{-- TOP PART --}}
        @include('auth_part.login_page.partials.part_1')
        <div class="roomora-login-panel">
            {{-- SMALL LOGO AND BANNER PART --}}
            @include('auth_part.login_page.partials.part_2')
            {{-- SMALL MESSAGE PART --}}
            @include('auth_part.login_page.partials.part_3')
            {{-- NOTIFICATION PART --}}
            @include('auth_part.login_page.partials.part_4')
            {{-- FORM PART --}}
            @include('auth_part.login_page.partials.part_5')

            <div class="login-divider">
                <span>ROOMORA</span>
            </div>

            {{-- BOTTOM MESSAGE PART --}}
            @include('auth_part.login_page.partials.part_6')
        </div>
    </div>
@endsection
