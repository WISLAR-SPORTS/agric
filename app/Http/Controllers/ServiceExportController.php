<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceExportController extends Controller
{
    public function exportPdf()
    {
        $services = Service::all();

        return response()->view('exports.services-pdf', compact('services'));
    }
}