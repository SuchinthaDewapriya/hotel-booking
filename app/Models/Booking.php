<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookingDetail;

class Booking extends Model
{
    // public function bookingdetails()
    // {
    //     return $this->hasMany('App\BookingDetail', 'bd_booking_id', 'b_id');
    // }
    // public function bookingrate()
    // {
    //     return $this->hasOne('App\BookingRate', 'br_bookingid', 'b_id');
    // }
    // public function customerdetails()
    // {
    //     return $this->hasOne('App\CustomerDetail', 'cd_bookingid', 'b_id');
    // }
    // public function room()
    // {
    //     return $this->hasOne('App\Room', 'r_id', 'b_rid');
    // }
    // public function bill()
    // {
    //     return $this->hasMany('App\Bill', 'bill_booking_id', 'b_id');
    // }
    public function bookingdetails()
    {
        return $this->hasMany('App\Models\BookingDetail', 'bd_booking_id', 'b_id');
    }
    public function bookingrate()
    {
        return $this->hasOne('App\Models\BookingRate', 'br_bookingid', 'b_id');
    }
    public function customerdetails()
    {
        return $this->hasOne('App\Models\CustomerDetail', 'cd_bookingid', 'b_id');
    }
    public function room()
    {
        return $this->hasOne('App\Models\Room', 'r_id', 'b_rid');
    }
    public function bill()
    {
        return $this->hasMany('App\Models\Bill', 'bill_booking_id', 'b_id');
    }
}
