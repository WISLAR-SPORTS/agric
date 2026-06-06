<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\Feature;

class LandingController extends Controller
{
    public function index()
{
    $hero = HeroSection::where('status', 1)->first();
    $about = AboutSection::first();
    $features = Feature::all() ?? collect();

    return view('landing', [
        'hero' => $hero,
        'about' => $about,
        'features' => $features,
    ]);
}
    


}