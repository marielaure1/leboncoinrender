<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonces extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'email',
        'name',
        'description',
        'location',
        'price',
        'token',
        'status',
    ];

    protected $attributes = [
        'status' => 0,
        'token' => "token",
    ];

}
