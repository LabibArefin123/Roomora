@extends('layouts.app')

@section('title', 'New Booking')

@section('content')
    <div class="roomora-booking-form">
        {{-- Header Part --}}
        @include('layouts.bookings.partials.create_page.part_1')
        <form action="{{ route('bookings.store') }}" method="POST" class="booking-form">
            @csrf
            {{-- GUEST DETAILS SECTION --}}
            @include('layouts.bookings.partials.create_page.part_2_a')
            {{-- ROOM SELECTION SECTION --}}
            @include('layouts.bookings.partials.create_page.part_2_b')
            {{-- BOOKING FORM SECTION --}}
            @include('layouts.bookings.partials.create_page.part_2_c')
            {{-- ACTION SECTION --}}
            @include('layouts.bookings.partials.create_page.part_2_d')
        </form>
    </div>
@endsection
