<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelBooking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'checkin_at',
        'checkout_at',
        'user_id',
        'hotel_id',
        'room_id',
        'total_amount',
        'total_day',
        'is_paid',
        'proof'
    ];

    public function customer(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function room(){
        return $this->belongsTo(HotelRoom::class, 'room_id');
    }
}