 <div class="room-show-banner">
     <div class="room-show-banner-icon">
         <i class="fas fa-bed"></i>
     </div>

     <span class="room-show-status {{ $room->status }}">
         {{ ucfirst(str_replace('_', ' ', $room->status)) }}
     </span>

     <div class="room-show-banner-text">
         <span>ROOM {{ $room->room_number }}</span>
         <h2>{{ $room->room_type }}</h2>
         <p>
             <i class="fas fa-building"></i>
             {{ $room->floor !== null ? 'Floor ' . $room->floor : 'Floor not specified' }}
         </p>
     </div>
 </div>
