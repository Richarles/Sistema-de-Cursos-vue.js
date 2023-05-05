<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Student as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Student extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = ['name','last_name','state','city','road','district','number','date_birth','fone','email','password'];

    /**
     * The curses that belong to the student.
     */
    public function curses()
    {
        return $this->belongsToMany(Curse::class);
    }

    protected $casts = [
        //...
        'is_students' => 'boolean',
    ];

    public function isStudents(): bool
{
    return $this->is_students;
}

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
