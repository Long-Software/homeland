<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertySaved;
use App\Models\Request as ModelsRequest;
use App\Repositories\PropertyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $this->middleware('auth');
        $prop = $this->propertyRepository->find($id);
        $propImgs = $this->propertyRepository->findImage($id);
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
        $prop = $this->propertyRepository->find($id);
        if (file_exists(public_path('assets/images/' . $prop->img_url)))
            unlink(public_path('assets/images/' . $prop->img_url));

        $prop_imgs = $this->propertyRepository->findImage($id);
        foreach ($prop_imgs as $img) {
            if (file_exists(public_path('assets/images/' . $img->img_url)))
                unlink(public_path('assets/images/' . $img->img_url));
        }
        $prop->delete();
        return redirect()->route('properties.index')->with('success', 'Property has been deleted');
    }

    public function request(Request $request, $id)
    {
        $this->middleware('auth');
        $request->validate([
            'agent_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        ModelsRequest::create([
            'property_id' => $id,
            'agent_name' => $request->agent_name,
            'user_id' => Auth::id(),
            'name' => 'Long',
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        return redirect()->back()->with('make request', 'Request has successfully been made');
    }
    public function save($id)
    {
        $this->middleware('auth');
        $prop = $this->propertyRepository->find($id);
        $isSaved = Property::find($id)->isSaved(Auth::id());
        $isSaved ? $isSaved->delete() :
            PropertySaved::create([
                'property_id' => $prop->id,
                'user_id' => Auth::id(),
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
        $this->middleware('auth');
        $props = $this->propertyRepository->allRequest(Auth::id());
        return view('home', compact('props'));
    }

    public function all_save()
    {
        $this->middleware('auth');
        $props = $this->propertyRepository->allSave(Auth::id());
        return view('home', compact('props'));
    }

    public function search(Request $request)
    {
        $props = $this->propertyRepository->all()->filter(fn ($prop) => $prop->type == $request->offers_types || $prop->house_type == $request->list_types);
        return view('home', compact('props'));
    }
}
