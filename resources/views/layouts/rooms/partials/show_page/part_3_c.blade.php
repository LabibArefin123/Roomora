<div class="room-show-section room-show-description">
    <h3>
        <i class="fas fa-align-left"></i>
        Description
    </h3>

    @if ($room->description)
        <p>{{ $room->description }}</p>
    @else
        <p class="room-show-no-description">No description has been added for this room.</p>
    @endif
</div>
