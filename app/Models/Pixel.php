<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pixel extends Model
{

	 protected $fillable = [
        'facebook_pixel_id',
        'facebook_access_token',
        'facebook_pixel_enabled',
        'conversions_api_enabled',
        'test_event_code',
    ];
    
    protected $casts = [
        'facebook_pixel_enabled' => 'boolean',
        'conversions_api_enabled' => 'boolean',
    ];
}



