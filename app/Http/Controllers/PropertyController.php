<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertySaved;
use App\Models\Request as ModelsRequest;
use App\Repositories\PropertyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    private PropertyRepository $propertyRepository;
    public function __construct(PropertyRepository $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $props = $this->propertyRepository->all()->take(9);
        return view('home', compact('props'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prop = $this->propertyRepository->find($id);
        $propImgs = $this->propertyRepository->findImage(1);
        $relProps = $this->propertyRepository->findRelated($id);
        return view('pages.property.single-property', compact('prop', 'propImgs', 'relProps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function request(Request $request, $id)
    {
        $request->validate([
            'agent_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        ModelsRequest::create([
            'property_id' => $id,
            'agent_name' => $request->agent_name,
            'user_id' => 1,
            // 'user_id' => Auth::id(),
            'name' => 'Long',
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        return redirect()->back()->with('make request', 'Request has successfully been made');
    }
    public function save($id)
    {
        $prop = $this->propertyRepository->find($id);
        $isSaved = Property::find($id)->isSaved(1);
        $isSaved ? $isSaved->delete() :
            PropertySaved::create([
                'property_id' => $prop->id,
                'user_id' => 1,
                // 'user_id' => Auth::id(),
            ]);
        return redirect()->back()->with('save property', 'Property has successfully been saved');
    }
    public function type($type)
    {
        $props = $this->propertyRepository->all()->filter(fn ($prop) => $prop->type == $type || $prop->house_type == $type);
        return view('home', compact('props'));
    }
    public function price()
    {
        $order = request()->input('order', 'desc');
        $props = $this->propertyRepository->getAllByPrice($order);
        return view('home', compact('props'));
    }
    public function all_request()
    {
        $props = $this->propertyRepository->allRequest(1);
        return view('home', compact('props'));
    }

    public function all_save()
    {
        $props = $this->propertyRepository->allSave(1);
        return view('home', compact('props'));
    }

    public function search(Request $request)
    {
        $props = $this->propertyRepository->all()->filter(fn ($prop) => $prop->type == $request->offers_types || $prop->house_type == $request->list_types);
        return view('home', compact('props'));
    }
}
