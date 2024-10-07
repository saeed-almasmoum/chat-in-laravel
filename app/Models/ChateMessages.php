<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChateMessages extends Model
{
    use HasFactory;

    protected $fillable=[
        'receiver_id',
        'send_id',
        'message',
    ];

    
}
