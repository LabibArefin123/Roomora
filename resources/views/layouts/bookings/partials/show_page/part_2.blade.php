 <div class="booking-show-hero">
     <div class="booking-show-hero-icon">
         <i class="fas fa-bed"></i>
     </div>

     <div class="booking-show-hero-info">
         <span>ROOM {{ $booking->room->room_number }}</span>

         <h2>{{ $booking->room->room_type }}</h2>

         <p>
             <i class="fas fa-location-dot"></i>
             Floor {{ $booking->room->floor ?? 'N/A' }}
         </p>
     </div>
     <span class="booking-show-status {{ $booking->status }}">
         {{ str_replace('_', ' ', $booking->status) }}
     </span>
 </div>
