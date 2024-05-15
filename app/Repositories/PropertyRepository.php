<?php

namespace App\Repositories;

use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertySaved;
use App\Models\Request;
use Illuminate\Database\Eloquent\Collection;

class PropertyRepository
{
    public function all($order = 'desc'): Collection
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
        return Request::where('property_id', $id);
    }
    public function allRequest($user_id)
    {
        $props = [];
        foreach(Request::where('user_id', $user_id)->get() as $req) {
            $props[] = $this->find($req->property_id);
        }
        // dd(Request::where('user_id', $user_id));
        return $props;
    }
    public function allSave($user_id)
    {
        $props = [];
        foreach(PropertySaved::where('user_id', $user_id)->get() as $prop) {
            $props[] = $this->find($prop->property_id);
        }
        return $props;
    }
    public function getAllByPrice($order = 'desc')
    {
        $props = Property::orderBy('price', $order)->get();
        return $props;
    }
}
