  <div class="booking-form-section">
      <div class="booking-form-section-title">
          <div class="booking-form-section-icon">
              <i class="fas fa-bed"></i>
          </div>

          <div>
              <span>ROOM SELECTION</span>
              <h2>Choose your room</h2>
          </div>
      </div>

      <div class="booking-field">
          <label for="room_id">Room</label>

          <select name="room_id" id="room_id" class="booking-input @error('room_id') is-invalid @enderror">

              <option value="">Select available room</option>

              @foreach ($rooms as $room)
                  <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                      Room {{ $room->room_number }} ·
                      {{ $room->room_type }} ·
                      ৳{{ number_format($room->price_per_night, 0) }}/night
                  </option>
              @endforeach
          </select>

          @error('room_id')
              <small class="booking-field-error">{{ $message }}</small>
          @enderror
      </div>
  </div>
