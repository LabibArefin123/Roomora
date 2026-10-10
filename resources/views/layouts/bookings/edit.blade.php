@extends('layouts.app')

@section('title', 'Edit Booking')

@section('content')
    <div class="roomora-booking-form">
        {{-- Header Part --}}
        @include('layouts.bookings.partials.edit_page.part_1')
        <form action="{{ route('bookings.update', $booking) }}" method="POST" class="booking-form">
            @csrf
            @method('PUT')
            {{-- GUEST DETAILS SECTION --}}
            @include('layouts.bookings.partials.edit_page.part_2_a')
            {{-- ROOM SELECTION SECTION --}}
            @include('layouts.bookings.partials.edit_page.part_2_b')
            {{-- BOOKING FORM SECTION --}}
            @include('layouts.bookings.partials.edit_page.part_2_c')
            {{-- BOOKING STATUS SECTION --}}
            @include('layouts.bookings.partials.edit_page.part_2_d')
            {{-- ACTION SECTION --}}
            @include('layouts.bookings.partials.edit_page.part_2_e')
        </form>
    </div>
@endsection
