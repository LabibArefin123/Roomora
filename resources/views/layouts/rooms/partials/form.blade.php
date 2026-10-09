<form action="{{ $room ? route('rooms.update', $room) : route('rooms.store') }}" method="POST" class="room-form">
    @csrf

    @if ($room)
        @method('PUT')
    @endif

    <div class="room-form-card">
        <div class="room-form-card-header">
            <div class="room-form-card-icon">
                <i class="fas fa-bed"></i>
            </div>
            <div>
                <h2>Room Information</h2>
                <p>Enter the room details below.</p>
            </div>
        </div>

        <div class="room-form-fields">
            <div class="room-form-field">
                <label for="room_number">Room Number <span>*</span></label>
                <input type="text" id="room_number" name="room_number"
                    value="{{ old('room_number', $room?->room_number) }}" placeholder="e.g. 101">
                @error('room_number')
                    <small class="room-form-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="room-form-field">
                <label for="room_type">Room Type <span>*</span></label>
                <select id="room_type" name="room_type">
                    <option value="">Select Room Type</option>
                    @foreach (['Single', 'Double', 'Deluxe', 'Family', 'Suite', 'Presidential Suite'] as $type)
                        <option value="{{ $type }}" @selected(old('room_type', $room?->room_type) === $type)>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
                @error('room_type')
                    <small class="room-form-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="room-form-field">
                <label for="floor">Floor</label>
                <input type="number" id="floor" name="floor" value="{{ old('floor', $room?->floor) }}"
                    min="0" placeholder="e.g. 1">
                @error('floor')
                    <small class="room-form-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="room-form-field">
                <label for="capacity">Guest Capacity <span>*</span></label>
                <input type="number" id="capacity" name="capacity" value="{{ old('capacity', $room?->capacity) }}"
                    min="1" placeholder="Number of guests">
                @error('capacity')
                    <small class="room-form-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="room-form-field">
                <label for="price_per_night">Price Per Night (৳) <span>*</span></label>
                <input type="number" id="price_per_night" name="price_per_night"
                    value="{{ old('price_per_night', $room?->price_per_night) }}" min="0" step="0.01"
                    placeholder="e.g. 2500">
                @error('price_per_night')
                    <small class="room-form-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="room-form-field">
                <label for="status">Room Status <span>*</span></label>
                <select id="status" name="status">
                    @foreach (['available', 'occupied', 'maintenance', 'inactive'] as $status)
                        <option value="{{ $status }}" @selected(old('status', $room?->status ?? 'available') === $status)>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
                @error('status')
                    <small class="room-form-error">{{ $message }}</small>
                @enderror
            </div>

            <div class="room-form-field room-form-field-full">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" placeholder="Describe the room and its facilities...">{{ old('description', $room?->description) }}</textarea>
                @error('description')
                    <small class="room-form-error">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <div class="room-form-actions">
        <a href="{{ route('rooms.index') }}" class="room-cancel-btn">
            Cancel
        </a>

        <button type="submit" class="room-save-btn">
            <i class="fas fa-check"></i>
            {{ $room ? 'Update Room' : 'Create Room' }}
        </button>
    </div>
</form>
