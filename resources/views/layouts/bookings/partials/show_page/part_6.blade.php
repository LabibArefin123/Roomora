 <div class="booking-show-total">
     <div>
         <span>TOTAL STAY AMOUNT</span>
         <small>
             {{ $booking->check_in->diffInDays($booking->check_out) }}
             nights · Room {{ $booking->room->room_number }}
         </small>
     </div>

     <strong>
         ৳{{ number_format($booking->total_amount, 2) }}
     </strong>
 </div>
