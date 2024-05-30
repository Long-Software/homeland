<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Request as ModelsRequest;
use App\Repositories\PropertyRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $property_count = count(Property::all());
        $gallery_count = count(PropertyImage::all());
        $request_count = count(ModelsRequest::all());
        return view('admins.index', compact('property_count', 'gallery_count', 'request_count'));
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
    public function show(string $id)
    {
        //
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
    public function login()
    {
        return view('admins.login');
    }
    public function logged(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function request()
    {
        $requests = ModelsRequest::all();
        return view('admins.request', compact('requests'));
    }
    public function property()
    {
        $properties = $this->propertyRepository->all();
        return view('admins.property', compact('properties'));
    }
    public function create_property()
    {
        return view('admins.property_create');
    }
    public function store_property(Request $request)
    {
        $path = 'assets/images/';
        $image = $request->img_url->getClientOriginalName();
        $request->img_url->move(public_path($path), $image);
        $prop = Property::create([...$request->all(), 'img_url' => $image]);
        if ($prop) {
            return redirect()->route('admin.property')->with('success', 'Property has been added');
        }
    }

    public function create_gallery()
    {
        $props = $this->propertyRepository->all();
        return view('admins.gallery_create', compact('props'));
    }
    public function store_gallery(Request $request)
    {
        if ($request->hasFile('img_url')) {
            foreach ($request->file('img_url') as $file) {
                $name = time() . rand(1, 50) . '.' . $file->extension();
                $file->move(public_path('assets/images'), $name);

                PropertyImage::create([
                    'property_id' => $request->property_id,
                    'img_url' => $name
                ]);
            }
        }
        return redirect()->route('admin.property')->with('success', 'Gallery has been added');
    }
}

// if($request->url('admin/login') ) {
//     if(isset(Auth::guard('admin')->user()->name)) {
//         return redirect()->route('admins.dashboard');
//     } 
// }