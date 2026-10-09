@extends('layouts.app')

@section('title', 'Bookings')

@section('content')
    <div class="roomora-bookings">
        {{-- Header Part --}}
        @include('layouts.bookings.partials.index_page.part_1')
        {{-- Booking Summary Part --}}
        @include('layouts.bookings.partials.index_page.part_2')
        {{-- Recent Booking Part --}}
        @include('layouts.bookings.partials.index_page.part_3')
    </div>
@endsection
