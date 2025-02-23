<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    //
    protected $fillable = ['user_id', 'image','status','description'];
    public function offers()
{
    return $this->hasMany(Offer::class);
}

public function user() 
{
    return $this->belongsTo(User::class);
}

}
