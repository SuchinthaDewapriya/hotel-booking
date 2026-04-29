<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model

{
    protected $fillable = [
    'bill_booking_id',
    'bill_pro_name',
    'bill_pro_qty',
    'bill_pro_price',
    'bill_status'
];
        
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bill_booking_id', 'b_id');
        //return $this->belongsTo('App\Models\Booking', 'b_id');
        
    }
}
