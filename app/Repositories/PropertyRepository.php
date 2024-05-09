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
    public function find($id)
    {
        $prop = Property::find($id);
        if (!$prop)
            abort(404, 'Property was not found!');
        return $prop;
    }
}
