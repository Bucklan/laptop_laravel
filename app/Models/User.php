<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'my_balance',
        'img',
        ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function laptopsRated()
    {
        return $this->belongsToMany(Laptop::class, 'rating')
            ->withPivot('rating')
            ->withTimestamps();
    }
    public function laptopsBought(){
        return $this->belongsToMany(Laptop::class,'cart')
            ->withTimestamps()
            ->withPivot('quantity','ram','memory','status');
    }
    public function laptopsWithStatus($status){
        return $this->belongsToMany(Laptop::class,'cart')
            ->wherePivot('status',$status)
            ->withTimestamps()
            ->withPivot('quantity','ram','memory','status');
    }
}
