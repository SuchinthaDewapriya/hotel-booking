<?php

namespace App\Http\Controllers;

use App\Booking;

use App\Room;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    function CheckAvailability(Request $request) {
            // $checkBooking = Booking::whereBetween('b_checkoutdate', [$request->checkIn, $request->checkOut])
            //     ->pluck('b_id');

            // $checkBookingRID = Booking::whereBetween('b_checkoutdate', [$request->checkIn, $request->checkOut])
            // ->pluck('b_rid');

            // if (count($checkBooking) > 0) {
            //     $test = Booking::where('b_id',$checkBooking)->pluck('b_quantity');
            //     $roomQuantity = Room::where('r_id', '=', $checkBookingRID)->where('r_quantity','>=', $test)->pluck('r_id');
            //     $checkRoom = Room::whereNotIn('r_id',$roomQuantity)->get();
            // } else {
            //     $checkRoom = Room::get();
            // }
            
           
            // dd($checkBooking);
            //  if (count($checkBooking) > 0) {

                
            //      foreach ($checkBooking as $value) {
            //         $roomQuantity = Room::where('r_id',$value->b_rid)->where('r_quantity','<=', $value->b_quantity)->pluck('r_id');
            //      }

            //         $checkRoom = Room::wherenotIn('r_id',$roomQuantity)->get();
                
                
            //  } else {
            //     $checkRoom = Room::get();

            //  }

            $checkBooking = Booking::where('b_checkoutdate', '>=' ,$request->checkIn)
            ->pluck('b_rid');
            
            

            if ( count($checkBooking) > 0 ) {
                $room = Room::where('r_id',$checkBooking)->get();
                foreach ($room as $rooms) {
                    if ($rooms->r_quantity != 0) {
                        $checkRoom = Room::get();
                    } 
                    else{
                        $checkRoom = Room::whereNotIn('r_id',$checkBooking)->get();
                    }   
                }
            } else {
                $checkRoom = Room::get();
            }
  
        return $checkRoom;
    }
}
