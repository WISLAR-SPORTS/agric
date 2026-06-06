<h2>Thank you for your order!</h2>

<p>Hi {{ $order->customer_name }},</p>

<p>Your order <strong>{{ $order->order_number }}</strong> has been received.</p>

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

<p>We will contact you soon.</p>