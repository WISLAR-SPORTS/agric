<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // LIST ALL SERVICES
    public function index()
    {
        $services = Service::where('is_active', true)->latest()->get();
        return view('guest.services', compact('services'));
    }

    // SHOW SINGLE SERVICE (DYNAMIC VIEW USING SLUG)
    public function show($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('guest.show', compact('service'));
    }
}