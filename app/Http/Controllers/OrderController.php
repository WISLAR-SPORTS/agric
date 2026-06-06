<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

use App\Mail\CustomerOrderMail;
use App\Mail\AdminOrderMail;


class OrderController extends Controller
{
    public function create(Product $product)
    {
        return view('guest.create', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string',
            'customer_email' => 'nullable|email',
            'customer_phone' => 'required|string',
            'delivery_address' => 'required|string',
            'district' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $total = $product->price * $request->quantity;

        // 1. CREATE ORDER
        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'delivery_address' => $request->delivery_address,
            'district' => $request->district,
            'total_amount' => $total,
            'payment_method' => 'cash',
            'status' => 'pending',
        ]);

        // 2. CREATE ORDER ITEM
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'unit_price' => $product->price,
            'subtotal' => $total,
        ]);
            
$orderItems = OrderItem::where('order_id', $order->id)->get();

// 1. Send email to customer
if ($order->customer_email) {
    Mail::to($order->customer_email)
        ->send(new CustomerOrderMail($order, $orderItems));
}

// 2. Send email to admin
$adminEmail = \App\Models\User::where('role', 'admin')->first()?->email;

if ($adminEmail) {
    Mail::to($adminEmail)
        ->send(new AdminOrderMail($order, $orderItems));
}

        return redirect()->route('orders.create', $product->id)
            ->with('success', 'Order placed successfully!');
    }

}
//i want a confirmation email to be sent to the customer and order email to be sent to the admin i will use brevo for email and create my own templates