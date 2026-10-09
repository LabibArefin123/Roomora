@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="roomora-profile">
        {{-- Header Part --}}
        @include('layouts.profile.partials.index_page.part_1')

        {{-- Intro Part --}}
        @include('layouts.profile.partials.index_page.part_2')

        {{-- Profile Information Part --}}
        @include('layouts.profile.partials.index_page.part_5')

        {{-- Quick Access Part --}}
        @include('layouts.profile.partials.index_page.part_3')

        {{-- About Roomora Part --}}
        @include('layouts.profile.partials.index_page.part_4')
    </div>
@endsection

