<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class BookingDetail extends Model
{
    public function booking()
    {
        return $this->belongsTo('App\Models\Booking', 'b_id');
    }
}
