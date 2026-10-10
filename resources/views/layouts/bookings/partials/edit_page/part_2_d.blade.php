<div class="booking-form-section">
    <div class="booking-form-section-title">
        <div class="booking-form-section-icon">
            <i class="fas fa-circle-check"></i>
        </div>

        <div>
            <span>BOOKING STATUS</span>
            <h2>Reservation status</h2>
        </div>
    </div>

    <div class="booking-field">
        <label for="status">Status</label>

        <select name="status" id="status" class="booking-input">

            @foreach ([
        'pending' => 'Pending',
        'confirmed' => 'Confirmed',
        'checked_in' => 'Checked In',
        'checked_out' => 'Checked Out',
        'cancelled' => 'Cancelled',
    ] as $value => $label)
                <option value="{{ $value }}" {{ old('status', $booking->status) === $value ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach

        </select>
    </div>
</div>

@if ($errors->any())
    <div class="booking-form-error">
        <div class="booking-form-error-icon">
            <i class="fas fa-circle-exclamation"></i>
        </div>

        <div>
            <strong>Please check your booking</strong>

            <span>
                Some information needs your attention before saving.
            </span>
        </div>
    </div>
@endif
