<?php

namespace Modules\User\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Category\App\Models\Category;
use Modules\Otp\App\Models\Otp;
use Modules\User\Database\factories\UserFactory;
use Spatie\Permission\Traits\HasRoles;

class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'profile_photo_path',
        'token_confirm_password',
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
        'password' => 'hashed',
    ];


    public function otps()
    {
       return $this->hasMany(Otp::class );
    }

    public function categories()
    {
       return $this->hasMany(Category::class );
    }

    public function getStatusEmailIconAttribute()
    {
        if($this->email_verified_at !== null){
            return 'check';
        }else {
            return 'window-close';
        }
    }

    public function getStatusEmailColorAttribute()
    {
        if($this->email_verified_at !== null){
            return 'success';
        }else {
            return 'danger';
        }
    }

}
