<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ["image" , 
    "coverture_image" , 
    "description",
    "adresse" , 
    "telephone" , 
    "facebook" , 
    "lindein" , 
    "github" , 
    "user_id"];
}