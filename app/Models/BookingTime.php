<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTime extends Model
{
    use HasFactory;
    protected $table = 'booking_time';
    protected $fillable = [
        'date_id',
        'time'
    ];
}
