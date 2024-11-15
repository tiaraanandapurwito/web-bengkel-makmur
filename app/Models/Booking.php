<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_type',
        'service_date',
        'details',
        'status',
        'user_id', // Pastikan ini ada untuk menyimpan relasi dengan user
    ];

    // Relasi dengan User
    public function user()
{
    return $this->belongsTo(User::class);
}
}

