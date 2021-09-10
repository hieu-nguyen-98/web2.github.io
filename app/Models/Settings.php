<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = ['title','meta_description','meta_keywords','address','logo','favicon','email','phone','fax','footer','facebook_url','twitter_url','linked_url','pinterest']; 
}
