<?php

namespace App\Repositories;

use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Request;
use Illuminate\Database\Eloquent\Collection;

class PropertyRepository
{
    public function all($order='desc'): Collection
    {
        return Property::orderBy('created_at', $order)->get();
    }
    public function find($id)
    {
        $prop = Property::find($id);
        if (!$prop)
            abort(404, 'Property was not found!');
        return $prop;
    }
    public function findImage($id)
    {
        $prop_img =  PropertyImage::where('property_id', $id)->get();
        return $prop_img;
    }

    public function findRelated($id)
    {
        $props = $this->all()->where('house_type', $this->find($id)->house_type)->where('id', '!=', $id)->take(3);
        return $props;
    }

    public function findRequest($id)
    {
        $requests = Request::where('property_id', $id);
        return $requests;
    }
    public function getAllByPrice($order='desc') {
        $props = Property::orderBy('price', $order)->get();
        return $props;
    }
}
