@extends('layouts.app')

@section('title', 'Rooms')

@section('content')
    <div class="stayflow-rooms">
        {{-- Header Part --}}
        @include('layouts.rooms.partials.index_page.part_1')
        {{-- Filter Part --}}
        @include('layouts.rooms.partials.index_page.part_2')
        @include('layouts.rooms.partials.index_page.part_3')
    </div>
@endsection
