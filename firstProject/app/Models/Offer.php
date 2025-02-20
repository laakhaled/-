<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['service_request_id', 'provider_id', 'message' ,'price'];

}
