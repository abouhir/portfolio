<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
    "image" , 
    "coverture_image" , 
    "description",
    "adresse" , 
    "telephone" , 
    "facebook" , 
    "linkedin" , 
    "github" , 
    "user_id"];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
