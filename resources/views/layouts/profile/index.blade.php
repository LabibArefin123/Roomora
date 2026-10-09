@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="roomora-profile">

        <div class="profile-header">

            <div class="profile-cover"></div>

            <div class="profile-avatar">
                <i class="fas fa-hotel"></i>
            </div>

            <div class="profile-identity">
                <span class="profile-label">WELCOME TO</span>
                <h1>Roomora</h1>
                <p>Book. Stay. Feel at home.</p>
            </div>

        </div>


        <div class="profile-intro">

            <div class="profile-intro-icon">
                <i class="fas fa-sparkles"></i>
            </div>

            <div>
                <span>YOUR STAY, SIMPLIFIED</span>
                <p>
                    Discover comfortable rooms, manage your bookings,
                    and enjoy a smoother stay with Roomora.
                </p>
            </div>

        </div>


        <div class="profile-section">

            <div class="profile-section-heading">
                <span>ROOMORA</span>
                <h2>Quick Access</h2>
            </div>


            <div class="profile-menu">

                <a href="{{ route('bookings.index') }}" class="profile-menu-item">

                    <div class="profile-menu-icon blue">
                        <i class="fas fa-calendar-days"></i>
                    </div>

                    <div>
                        <strong>My Bookings</strong>
                        <span>View your reservations</span>
                    </div>

                    <i class="fas fa-chevron-right profile-menu-arrow"></i>

                </a>


                <a href="{{ route('rooms.index') }}" class="profile-menu-item">

                    <div class="profile-menu-icon purple">
                        <i class="fas fa-bed"></i>
                    </div>

                    <div>
                        <strong>Explore Rooms</strong>
                        <span>Find your perfect room</span>
                    </div>

                    <i class="fas fa-chevron-right profile-menu-arrow"></i>

                </a>


                <a href="{{ route('bookings.create') }}" class="profile-menu-item">

                    <div class="profile-menu-icon green">
                        <i class="fas fa-calendar-plus"></i>
                    </div>

                    <div>
                        <strong>New Booking</strong>
                        <span>Plan your next stay</span>
                    </div>

                    <i class="fas fa-chevron-right profile-menu-arrow"></i>

                </a>

            </div>

        </div>


        <div class="profile-about">

            <div class="profile-about-icon">
                <i class="fas fa-heart"></i>
            </div>

            <div>
                <span>ABOUT ROOMORA</span>

                <h2>Stay somewhere<br>you'll love.</h2>

                <p>
                    Roomora brings room discovery and booking together
                    in one simple, comfortable experience.
                </p>
            </div>

        </div>
    </div>
@endsection
