<?php


/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
  
    protected $fillable = [
        "name",
        "phone",
        "address"
    ];
}

/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */