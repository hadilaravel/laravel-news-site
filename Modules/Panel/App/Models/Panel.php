<?php

namespace Modules\Panel\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Panel\Database\factories\PanelFactory;

class Panel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): PanelFactory
    {
        //return PanelFactory::new();
    }
}
