<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'user_id',
        'vehicle_type',
        'service_date',
        'details',
        'status',
        'completed_at',
    ];

    // Tipe data kolom tanggal
    protected $dates = [
        'service_date',
        'completed_at',
    ];

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mutator: Format tanggal selesai (completed_at)
     */
    public function getFormattedCompletedAtAttribute()
    {
        return $this->completed_at ? Carbon::parse($this->completed_at)->isoFormat('D MMMM YYYY') : null;
    }

    /**
     * Mutator: Format tanggal servis
     */
    public function getFormattedServiceDateAttribute()
    {
        return $this->service_date ? Carbon::parse($this->service_date)->isoFormat('D MMMM YYYY') : null;
    }
}
