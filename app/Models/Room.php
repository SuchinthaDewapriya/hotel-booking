<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $primaryKey = 'r_id';

    protected $fillable = [
        'r_name',
        'r_price',
        'r_quantity',
        'r_bookquantity',
        'r_additional_bed',
        'r_description',
        'r_image',
        'max_occupancy',
        'r_status'
    ];
    // public function gallery()
    // {
    //     return $this->hasOne(RoomGallery::class, 'gallery_Room_id', 'r_id');
    // }
    public function gallery()
        {
            return $this->hasOne(RoomGallery::class, 'gallery_Room_id', 'r_id')
                        ->withDefault(); 
        }
    
}