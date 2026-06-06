@extends('layouts.app')

@section('content')

<div class="container py-5">

    {{-- PAGE TITLE --}}
    <div class="mb-4">
        <h2 class="fw-bold">Place Your Order</h2>
        <p class="text-muted">Fill in your details to complete your purchase</p>
    </div>

    <div class="row g-4">

        {{-- LEFT: PRODUCT SUMMARY --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 p-4">

                <h4 class="fw-bold">{{ $product->name }}</h4>

                <p class="text-muted mb-2">
                    Product Summary
                </p>

                <hr>

                <h5 class="text-success fw-bold">
                    UGX {{ number_format($product->price) }}
                </h5>

                <p class="text-muted small mt-2">
                    You are about to purchase this product. Ensure details are correct before submitting.
                </p>

                <div class="mt-3 p-3 bg-light rounded-3">
                    <small class="text-muted">Tip</small>
                    <p class="mb-0 small">
                        Orders are processed within 24–48 hours after confirmation.
                    </p>
                </div>

            </div>

        </div>

        {{-- RIGHT: FORM --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4 p-4">

                {{-- SUCCESS MESSAGE --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('orders.store') }}">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    {{-- ROW 1 --}}
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Customer Name</label>
                            <input type="text" name="customer_name"
                                   class="form-control form-control-lg"
                                   placeholder="Enter full name" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="customer_email"
                                   class="form-control form-control-lg"
                                   placeholder="example@mail.com">
                        </div>

                    </div>

                    {{-- ROW 2 --}}
                    <div class="row g-3 mt-1">

                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="customer_phone"
                                   class="form-control form-control-lg"
                                   placeholder="+256..." required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Quantity</label>
                            <input type="number" name="quantity"
                                   class="form-control form-control-lg"
                                   min="1" value="1" required>
                        </div>

                    </div>

                    {{-- ADDRESS --}}
                    <div class="mt-3">
                        <label class="form-label">Delivery Address</label>
                        <textarea name="delivery_address"
                                  class="form-control form-control-lg"
                                  rows="3"
                                  placeholder="Enter full delivery address"
                                  required></textarea>
                    </div>

                    {{-- DISTRICT --}}
                    <div class="mt-3">
                        <label class="form-label">District</label>
                        <input type="text" name="district"
                               class="form-control form-control-lg"
                               placeholder="e.g. Kampala">
                    </div>

                    {{-- SUBMIT --}}
                    <div class="mt-4">
                        <button class="btn btn-success btn-lg w-100 py-3">
                            Place Order
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection