<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'verification_code',
    ];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
