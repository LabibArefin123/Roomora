@extends('layouts.app')

@section('title', 'Create Room')

@section('content')
<div class="stayflow-room-form">
    <div class="room-form-header">
        <div>
            <span>STAYFLOW COLLECTION</span>
            <h1>Create Room</h1>
            <p>Add a new room to your property.</p>
        </div>
        <a href="{{ route('rooms.index') }}" class="room-back-btn">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Rooms</span>
        </a>
    </div>

    @include('layouts.rooms.partials.form', ['room' => null])
</div>
@endsection