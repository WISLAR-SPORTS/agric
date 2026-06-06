<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Category;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            $categories = Category::orderBy('name')->get();

            return view('guest.faq', [
                'faqs' => $faqs,
                'categories' => $categories
            ]);
    }
}