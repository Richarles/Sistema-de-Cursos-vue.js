<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curse extends Model
{
    use HasFactory;

    protected $fillable = ['name','field','price','description','user_id'];

    /**
     * Get the teacher that owns the users.
     */
     public function users()
     {
         return $this->belongsTo(User::class);
     }

}
