<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Repositories\PropertyRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private PropertyRepository $propertyRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PropertyRepository $propertyRepository)
    {
        // $this->middleware('auth');
        $this->propertyRepository = $propertyRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $props = $this->propertyRepository->all()->take(9);
        return view('home', compact('props'));
    }
    public function contact() {
        return view('pages.contact');
    }
    public function about() {
        return view('pages.about');
    }
}
