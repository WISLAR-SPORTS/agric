<?php
namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqQuestionController extends Controller
{
    public function create()
    {
        return view('guest.ask');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'question' => 'required|string',
        ]);

        Faq::create([
            'name' => $request->name,
            'email' => $request->email,
            'category_id' => $request->category_id,
            'question' => $request->question,
            'is_answered' => false,
            'is_active' => false,
        ]);

        return back()->with('success', 'Your question has been sent successfully.');
    }
}
