<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // defined here the properties that can be modify in the model
    protected $fillable = [
        'name',
        'model',
        'description'
    ];
}
