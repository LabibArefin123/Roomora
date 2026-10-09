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
