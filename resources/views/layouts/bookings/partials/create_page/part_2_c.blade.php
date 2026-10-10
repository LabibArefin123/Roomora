<div class="booking-form-section">
    <div class="booking-form-section-title">
        <div class="booking-form-section-icon">
            <i class="fas fa-calendar-days"></i>
        </div>

        <div>
            <span>STAY DATES</span>
            <h2>When are you staying?</h2>
        </div>
    </div>

    <div class="booking-date-fields">

        <div class="booking-field">
            <label for="check_in">Check-in</label>

            <input type="date" name="check_in" id="check_in"
                class="booking-input @error('check_in') is-invalid @enderror" value="{{ old('check_in') }}">

            @error('check_in')
                <small class="booking-field-error">{{ $message }}</small>
            @enderror
        </div>

        <div class="booking-field">
            <label for="check_out">Check-out</label>

            <input type="date" name="check_out" id="check_out"
                class="booking-input @error('check_out') is-invalid @enderror" value="{{ old('check_out') }}">

            @error('check_out')
                <small class="booking-field-error">{{ $message }}</small>
            @enderror
        </div>

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
                Some information needs your attention before continuing.
            </span>
        </div>
    </div>
@endif
