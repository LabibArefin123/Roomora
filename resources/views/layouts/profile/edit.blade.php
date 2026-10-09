@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="roomora-profile-edit">
        {{-- Header Part --}}
        @include('layouts.profile.partials.edit_page.part_1')
        {{-- Profile Image Modal  --}}
        @include('layouts.profile.partials.edit_page.modal.image_modal')
        <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data"
            class="profile-edit-form profile-edit-form-with-modal">
            @csrf
            @method('PUT')
            <div class="profile-edit-card">
                @include('layouts.profile.partials.edit_page.part_2_a')
                @include('layouts.profile.partials.edit_page.part_2_b')
                @include('layouts.profile.partials.edit_page.part_2_c')
        </form>
        @include('layouts.profile.partials.edit_page.part_3')
    </div>
@endsection
