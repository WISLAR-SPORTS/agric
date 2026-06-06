<h2>New Order Received</h2>

<p><strong>Order:</strong> {{ $order->order_number }}</p>

<p><strong>Customer:</strong> {{ $order->customer_name }}</p>
<p><strong>Email:</strong> {{ $order->customer_email }}</p>
<p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
<p><strong>Total:</strong> UGX {{ number_format($order->total_amount) }}</p>

<h4>Items:</h4>

<ul>
@foreach($items as $item)
    <li>
        Product ID: {{ $item->product_id }} |
        Qty: {{ $item->quantity }} |
        Subtotal: {{ number_format($item->subtotal) }}
    </li>
@endforeach
</ul>