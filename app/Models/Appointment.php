<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['offer_id', 'date', 'time'];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}