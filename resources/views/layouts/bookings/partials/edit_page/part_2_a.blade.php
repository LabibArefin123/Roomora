<div class="booking-form-section">
    <div class="booking-form-section-title">
        <div class="booking-form-section-icon">
            <i class="fas fa-user"></i>
        </div>

        <div>
            <span>GUEST DETAILS</span>
            <h2>Guest information</h2>
        </div>
    </div>

    <div class="booking-field">
        <label for="customer_id">Guest</label>

        <select name="customer_id" id="customer_id" class="booking-input @error('customer_id') is-invalid @enderror">

            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}"
                    {{ old('customer_id', $booking->customer_id) == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name }} · {{ $customer->phone }}
                </option>
            @endforeach

        </select>

        @error('customer_id')
            <small class="booking-field-error">{{ $message }}</small>
        @enderror
    </div>

    <div class="booking-field">
        <label for="guests">Number of Guests</label>

        <div class="booking-input-wrap">
            <i class="fas fa-users"></i>

            <input type="number" name="guests" id="guests"
                class="booking-input has-icon @error('guests') is-invalid @enderror"
                value="{{ old('guests', $booking->guests) }}" min="1">
        </div>

        @error('guests')
            <small class="booking-field-error">{{ $message }}</small>
        @enderror
    </div>
</div>
