<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'agent_name',
        'user_id',
        'name',
        'email',
        'phone'
    ];
}
