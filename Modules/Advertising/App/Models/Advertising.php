<?php

namespace Modules\Advertising\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Advertising\Database\factories\AdvertisingFactory;

class Advertising extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title' , 'link' , 'image' , 'user_id' , 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function showImage()
    {
        return asset($this->image);
    }

}
