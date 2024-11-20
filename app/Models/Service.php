<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_type', 'service_name', 'price'];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class);
    }
}

