<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Paid extends Model
{


        
    protected $fillable = [
        'ac_number',
        'user_id',
        'ac_type',
        'tran_id',
        'amount',
        'expired_at',
        'status',

    ];

     protected $casts = [
        'status' => 'string',
        'expired_at' => 'datetime',
    ];



  


}




