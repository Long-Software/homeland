<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'price',
        'img_url',
        'beds',
        'baths',
        'sqaure_foot',
        'length',
        'house_type',
        'year_built',
        'price_per_square',
        'info',
        'address',
        'agent_name',
        'type',
    ];
    public const TYPE =  ['Rent', 'Buy'];
    public const HOUSE_TYPE = ['Condo', 'Property Land', 'Commercial Building'];
}
