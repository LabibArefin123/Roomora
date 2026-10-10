  <div class="booking-show-actions">
      <a href="{{ route('bookings.edit', $booking) }}" class="booking-show-edit">
          <i class="fas fa-pen-to-square"></i>
          Edit Booking
      </a>

      <form action="{{ route('bookings.destroy', $booking) }}" method="POST"
          onsubmit="return confirm('Are you sure you want to delete this booking?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="booking-show-delete">
              <i class="fas fa-trash"></i>
          </button>
      </form>
  </div>
