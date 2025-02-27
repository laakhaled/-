<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    protected $fillable = ['message','price','service_request_id','provider_id','status'];

public function Provider()
{
    return $this->belongsTo(User::class, 'provider_id');
}

}