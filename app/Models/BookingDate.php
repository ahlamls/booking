<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDate extends Model
{
    use HasFactory;
    protected $table = 'booking_date';
    protected $fillable = [
        'date'
    ];
    public function times()
    {
        return $this->hasMany(BookingTime::class, 'date_id', 'id');;
    }
}
