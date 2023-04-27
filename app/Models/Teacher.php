<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name','last_name','state','city','road','district','number','date_birth','fone','email','password'];

    /**
     * Get the curses for the teacher.
     */
    public function curses()
    {
        return $this->hasMany(Curse::class);
    }
}
