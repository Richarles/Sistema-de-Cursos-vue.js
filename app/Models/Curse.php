<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curse extends Model
{
    use HasFactory;

    protected $fillable = ['name','field','price','description'];

    /**
     * The students that belong to the curse.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    /**
     * Get the teacher that owns the curse.
     */
    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }
}
