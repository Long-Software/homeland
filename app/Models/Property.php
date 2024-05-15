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
    public const TYPE =  ['Rent', 'Buy', 'Lease'];
    public const HOUSE_TYPE = ['Condo', 'Property Land', 'Commercial Building'];

    public function isSaved($user_id)
    {
        return PropertySaved::where('property_id', $this->id)->where('user_id', $user_id)->first();
    }
}
