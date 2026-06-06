<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Question;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function orderForm()
    {
        return view('guest.order');
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
        ]);

        Order::create($request->all());

        // Send confirmation email to customer
        // Notify admin about the order

        return redirect()->back()->with('success', 'Order placed successfully!');
    }

    
}