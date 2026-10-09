@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="stayflow-home">
        {{-- Header Part --}}
       @include('layouts.home.partials.part_1')
        {{-- Stats Part --}}
        @include('layouts.home.partials.part_2')
        {{-- Room Collection Part --}}
        @include('layouts.home.partials.part_3')
        {{-- Activity Part --}}
        @include('layouts.home.partials.part_4')
    </div>
@endsection
