@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">Order Product</h2>

    <div class="card p-4 shadow-sm">

        <h4>{{ $product->name }}</h4>

        <p class="text-muted">
            UGX {{ number_format($product->price) }}
        </p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <div class="mb-3">
                <label>Customer Name</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="customer_email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="customer_phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control" min="1" value="1" required>
            </div>

            <div class="mb-3">
                <label>Delivery Address</label>
                <textarea name="delivery_address" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label>District</label>
                <input type="text" name="district" class="form-control">
            </div>

            <button class="btn btn-success w-100">
                Place Order
            </button>

        </form>

    </div>

</div>

@endsection