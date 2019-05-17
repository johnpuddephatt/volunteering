<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\Opportunity;
use App\Models\Category;
use App\Models\Location;
use App\Models\Suitability;

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
      $locations =  Cache::rememberForever('home_locations', function () {
        return Location::all()->shuffle()->take(3);
      });
      $categories = Cache::rememberForever('home_categories', function () {
        return Category::withCount('opportunities')->orderBy('opportunities_count', 'desc')->get();
      });
      $suitabilities = Cache::rememberForever('home_suitabilities', function () {
        return Suitability::withCount('opportunities')->orderBy('opportunities_count', 'desc')->get();
      });
      return view('home', compact('categories','locations','suitabilities'));
    }
}
