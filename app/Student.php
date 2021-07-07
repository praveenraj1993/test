<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Student extends Model
{
    protected $fillable = ['firstname','uid', 'email', 'phone','address','photo','department'];

public function getPhotoAttribute($value)
    {
        return  is_null($value)?asset('images/index.png'):asset(Storage::url($value));
    }
}