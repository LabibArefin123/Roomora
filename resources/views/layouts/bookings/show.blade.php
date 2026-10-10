@extends('layouts.app')

@section('title', 'Booking Details')

@section('content')
    <div class="roomora-booking-show">
        {{-- Header Part --}}
        @include('layouts.bookings.partials.show_page.part_1')
        @include('layouts.bookings.partials.show_page.part_2')
        @include('layouts.bookings.partials.show_page.part_3')
        @include('layouts.bookings.partials.show_page.part_4')
        @include('layouts.bookings.partials.show_page.part_5')
        @include('layouts.bookings.partials.show_page.part_6')
        @include('layouts.bookings.partials.show_page.part_7')
    </div>
@endsection
