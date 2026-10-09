@extends('layouts.app')

@section('title', 'Edit Room')

@section('content')
    <div class="stayflow-room-form">
        <div class="room-form-header">
            <div>
                <span>STAYFLOW COLLECTION</span>
                <h1>Edit Room</h1>
                <p>Update the details for room {{ $room->room_number }}.</p>
            </div>
            <a href="{{ route('rooms.index') }}" class="room-back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Rooms</span>
            </a>
        </div>

        @include('layouts.rooms.partials.form', ['room' => $room])
    </div>
@endsection
