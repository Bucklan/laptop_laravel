<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    use HasFactory;

    protected $table = 'cart';
    protected $fillable = ['laptop_id', 'user_id', 'status', 'quantity','ram','memory'];

    public function laptop()
    {
        return $this->belongsTo(Laptop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
