@extends('layouts.app')

@section('title', 'Room Details')

@section('content')
    <div class="stayflow-room-show">
        {{-- Header Part --}}
       @include('layouts.rooms.partials.show_page.part_1')
       
       <div class="room-show-card">
            @include('layouts.rooms.partials.show_page.part_2')
            <div class="room-show-content">
                @include('layouts.rooms.partials.show_page.part_3_a')
                @include('layouts.rooms.partials.show_page.part_3_b')
                @include('layouts.rooms.partials.show_page.part_3_c')
                @include('layouts.rooms.partials.show_page.part_3_d')
            </div>
        </div>
    </div>
@endsection
