<?php

namespace App\Http\Controllers;

use App\Models\Booking;

use App\Models\Room;

use App\Models\AdditionalPackage;

use App\Models\Searching;

use App\Models\RoomGallery;

use Illuminate\Support\Facades\Validator;

use Cart;
 
use Carbon\Carbon;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function reservation()
    {
        $cart = Cart::getContent();
        // foreach ($cart as $value) {
        //     dd($cart);
        // }
        return view('reservation',[
            'data' => $cart,
        ]);
    }
    // function CheckAvailability(Request $request) {

    //         $validator = Validator::make($request->all(),[
    //             'checkOut' => 'required',
    //             'checkIn' => 'required',
    //             'adults' => 'required',
    //             'child' => 'required',
    //         ]);

    //         if ($validator->fails()) {
    //             return response()->json(['errors' => $validator->errors()->all()]);
    //         }
            

    //         try {

    //             $checkBookingId = Booking::where('b_checkoutdate', '>=' ,$request->checkIn)
    //         ->where('b_checkindate', '<=' ,$request->checkOut)
    //         ->pluck('b_rid');

            

            
    //         // dd($checkBookingId);
    //         // $DifferenceQty =  number_format($roomQty) - number_format($BookingQty);

    //         $checkOutDate = Carbon::parse($request->checkOut);
    //         $checkInDate = Carbon::parse($request->checkIn);

    //         $packages = AdditionalPackage::get();

    //         $adults = $request->adults;
    //         $child = $request->child;
    //         $days = $checkOutDate->diffInDays($checkInDate);
 
    //         $id = 0;
    //         if ( count($checkBookingId) > 0 ) {
    //         //     $newBookingQty = Booking::where('b_checkoutdate', '>=' ,$request->checkIn)
    //         // ->where('b_checkindate', '<=' ,$request->checkOut)
    //         // ->pluck('b_rquantity');
    //         $booked_rooms = array();
            
    //         foreach($checkBookingId as $booking_id){
    //             $booked_q = Booking::where('b_rid', $booking_id)->where('b_checkoutdate', '>=' ,$request->checkIn)
    //             ->where('b_checkindate', '<=' ,$request->checkOut)->sum('b_rquantity');
                
    //             $booked_rooms[$booking_id] = $booked_q;
    //         }
    //         $BookingQty = Booking::where('b_checkoutdate', '>=' ,$request->checkIn)
    //         ->where('b_checkindate', '<=' ,$request->checkOut)
    //         ->get();

            
    //             $newBookingQty = 0;
    //         foreach ($BookingQty as $value) {
    //             $newBookingQty = $newBookingQty + $value->b_rquantity;
    //         }
    //             $room = Room::whereIn('r_id',$checkBookingId)->get();
    //             $roomQty = Room::whereIn('r_id',$checkBookingId)->pluck('r_quantity');
    //             foreach ($room as $rooms) {
    //                 if ($rooms->r_quantity > $newBookingQty) {
    //                     $checkRoom = Room::join('room_galleries','rooms.r_id', '=', 'room_galleries.gallery_Room_id')->get();
    //                 } 
    //                 else{
    //                     $BookingFullRoom = Booking::where('b_rquantity', '<=', $newBookingQty)->pluck('b_rid');
    //                     $checkRoom = Room::join('room_galleries','rooms.r_id', '=', 'room_galleries.gallery_Room_id')
    //                     ->whereNotIn('rooms.r_id','!=',$BookingFullRoom)->get();
    //                 }   
    //                 $id = 1;
    //                 return response()->json(['adults' => $adults, 'child' => $child, 'booked_rooms' => $booked_rooms, 'BookingQty' => $newBookingQty, 'roomQty' => $roomQty, 'checkIn' => $request->checkIn, 'checkOut' => $request->checkOut, 'checkRoom' => $checkRoom, 'id' => $id, 'days' => $days, 'packages' => $packages]);
    //             }
    //         } else {
    //             $checkRoom = Room::join('room_galleries','rooms.r_id', '=', 'room_galleries.gallery_Room_id')->get();
    //             $id = 2;
    //             return response()->json(['adults' => $adults, 'child' => $child, 'checkIn' => $request->checkIn, 'checkOut' => $request->checkOut, 'checkRoom' => $checkRoom, 'id' => $id, 'days' => $days, 'packages' => $packages]);
    //         }

    //         //..............................................

    //         // $checkBooking = Booking::where('b_status',1)->where('b_checkoutdate', '>=' ,$request->checkIn)
    //         // ->pluck('b_rid');
            
    //         // $checkOutDate = Carbon::parse($request->checkOut);
    //         // $checkInDate = Carbon::parse($request->checkIn);

    //         // $packages = AdditionalPackage::get();

    //         // $days = $checkOutDate->diffInDays($checkInDate);

    //         // $id = 0;
    //         // if ( count($checkBooking) > 0 ) {
    //         //     $room = Room::where('r_id',$checkBooking)->get();
    //         //     foreach ($room as $rooms) {
    //         //         if ($rooms->r_bookquantity != 0) {
    //         //             $checkRoom = Room::get();
    //         //         } 
    //         //         else{
    //         //             $checkRoom = Room::whereNotIn('r_id',$checkBooking)->get();
    //         //         }   
    //         //         $id = 1;
    //         //         return response()->json(['checkIn' => $request->checkIn, 'checkOut' => $request->checkOut, 'checkRoom' => $checkRoom, 'id' => $id, 'days' => $days, 'packages' => $packages]);
    //         //     }
    //         // } else {
    //         //     $checkRoom = Room::get();
    //         //     $id = 2;
    //         //     return response()->json(['checkIn' => $request->checkIn, 'checkOut' => $request->checkOut, 'checkRoom' => $checkRoom, 'id' => $id, 'days' => $days, 'packages' => $packages]);
    //         // }

    //         } catch (Exeception $e) {
    //             dd($e->getMessage());
    //         }
            
  
        
    // }
    function CheckAvailability(Request $request)
{
    $validator = Validator::make($request->all(), [
        'checkOut' => 'required',
        'checkIn' => 'required',
        'adults' => 'required',
        'child' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()->all()]);
    }

    try {

        $checkIn = $request->checkIn;
        $checkOut = $request->checkOut;

        $checkOutDate = Carbon::parse($checkOut);
        $checkInDate = Carbon::parse($checkIn);

        $days = $checkOutDate->diffInDays($checkIn);

        $packages = AdditionalPackage::get();

        $adults = $request->adults;
        $child = $request->child;

        $bookings = Booking::where('b_checkoutdate', '>=', $checkIn)
            ->where('b_checkindate', '<=', $checkOut)
            ->get();

        $booked_rooms = [];

        foreach ($bookings as $booking) {
            if (!isset($booked_rooms[$booking->b_rid])) {
                $booked_rooms[$booking->b_rid] = 0;
            }
            $booked_rooms[$booking->b_rid] += $booking->b_rquantity;
        }

        $rooms = Room::get();

        $availableRoomIds = [];

        foreach ($rooms as $room) {

            $bookedQty = $booked_rooms[$room->r_id] ?? 0;

            if ($room->r_quantity > $bookedQty) {
                $availableRoomIds[] = $room->r_id;
            }
        }

        if (count($availableRoomIds) > 0) {

            $checkRoom = Room::join('room_galleries', 'rooms.r_id', '=', 'room_galleries.gallery_Room_id')
                ->whereIn('rooms.r_id', $availableRoomIds)
                ->get();

            $id = 1;

        } else {

            // No rooms available
            $checkRoom = [];

            $id = 0;
        }

        return response()->json([
            'adults' => $adults,
            'child' => $child,
            'booked_rooms' => $booked_rooms,
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'checkRoom' => $checkRoom,
            'id' => $id,
            'days' => $days,
            'packages' => $packages
        ]);

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
}

    public function Addtocart(Request $request,$id)
    {
        // dd($request->all());
        if (Cart::getContent($id)) {
            Cart::update($id, array(
                'name' => $request->r_name,
                'price' => $request->FinalTotal,
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity,
                ),
                'attributes' => array(
                    'days' => $request->days,
                    'image' => $request->image,
                    'package' => $request->package,
                    'bed' => $request->bed,
                    'ratebed' => $request->ratebed,
                    'fixedrate' => $request->fixedrate,
                    'additionalPackage' => $request->additionalPackage,
                    'TotalRoomRate' => $request->TotalRoomRate,
                    'TotalBedRate' => $request->TotalBedRate,
                    'TotalPackageRate' => $request->TotalPackageRate,
                    'additionalbed' => $request->additionalbed,
                    'packagerate' => $request->packagerate,
                    'checkIn' => $request->checkIn,
                    'checkOut' => $request->checkOut,
                    'adults' => $request->adults,
                    'child' => $request->child,
                )
            ));
        }else{
            Cart::add(array(
                'id' => $id,
                'name' => $request->r_name,
                'price' => $request->FinalTotal,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'days' => $request->days,
                    'image' => $request->image,
                    'package' => $request->package,
                    'bed' => $request->bed,
                    'ratebed' => $request->ratebed,
                    'fixedrate' => $request->fixedrate,
                    'additionalPackage' => $request->additionalPackage,
                    'TotalRoomRate' => $request->TotalRoomRate,
                    'TotalBedRate' => $request->TotalBedRate,
                    'TotalPackageRate' => $request->TotalPackageRate,
                    'additionalbed' => $request->additionalbed,
                    'packagerate' => $request->packagerate,
                    'checkIn' => $request->checkIn,
                    'checkOut' => $request->checkOut,
                    'adults' => $request->adults,
                    'child' => $request->child,
                )
            ));
        }
        return Cart::getContent();
    }
    public function RemoveCartItem($id)
    {
        Cart::remove($id);
        return Cart::getContent();
    } 

}
