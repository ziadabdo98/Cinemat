<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'room_id',
        'price',
        'date',
        'start_time',
        'end_time',
        'remaining_seats',
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reservationsSeats()
    {
        return $this->reservations->pluck('seat_number');
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
