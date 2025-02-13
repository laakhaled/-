<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'description', 'price','cover_image','author_id','student_id'];


public function authors()
    {
        return $this->belongsTo(Author::class);
    }
 public function students()
    {
        return $this->belongsTo(Student::class);
    }

}
