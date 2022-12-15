<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['name_kz','name_en','name_ru','image'];
    public function laptops(){
        return $this->hasMany(Laptop::class);
    }
}
