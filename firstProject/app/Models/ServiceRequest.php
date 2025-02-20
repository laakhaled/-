<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  // ✅ أضف هذا الحقل
        'description',
        'image',
        'status',
    ];
    public function offers()
{
    return $this->hasMany(Offer::class);
}

}

