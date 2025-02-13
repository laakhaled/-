<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'profile_image', 'email','bio','job_description','book_id'];


public function books()
    {
        return $this->hasOne(Book::class);
    }
}    