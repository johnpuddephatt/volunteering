<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\Models\Category;
use App\Models\Location;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $locations = Location::all()->shuffle()->take(3);
      $categories = Category::withCount('opportunities')->orderBy('opportunities_count', 'desc')->take(4)->get();
      return view('home', compact('categories','locations'));
    }
}
