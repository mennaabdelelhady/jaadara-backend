<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{

    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'user_id',
        'title',
        'body',
        'image'
    ];
}
