<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //
   protected $fillable= ['date','time','provider_id'];
   public function users()
   {
   return $this->belongsTo(User::class,'provider_id');
   }
}
