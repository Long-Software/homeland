<?php

namespace App\Repositories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;

class PropertyRepository
{
    public function all(): Collection
    {
        return Property::all();
    }
}
