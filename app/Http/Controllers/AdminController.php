<?php

namespace App\Http\Controllers;

use App\Models\Property;
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
        return view('admins.index');
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
    // public function home() {
    //     $types = Property::HOUSE_TYPE;
    //     return view('admins.home', compact('types'));
    // }
    public function request()
    {
        $requests = ModelsRequest::all();
        return view('admins.request', compact('requests'));
    }
    public function property()
    {
        $properties = $this->propertyRepository->all();
        return view('admins.request', compact('properties'));
    }
}

// if($request->url('admin/login') ) {
//     if(isset(Auth::guard('admin')->user()->name)) {
//         return redirect()->route('admins.dashboard');
//     } 
// }