@extends('layouts.app')

@section('content')

@php
use Illuminate\Support\Str;
@endphp

<div class="saas-products-page">

    <div class="saas-header">
        <h1>Available Products</h1>
        <p>Browse fresh agricultural products from trusted farmers</p>
    </div>

    <!-- ================= TOOLBAR ================= -->
    <div class="saas-toolbar">

        <div class="saas-search-box">
            <input type="text" id="searchInput" placeholder="Search products...">
        </div>

        <select id="categoryFilter">
            <option value="">All Categories</option>

            @foreach($categories ?? [] as $category)
                <option value="{{ $category->id ?? '' }}">
                    {{ $category->name ?? 'Unnamed Category' }}
                </option>
            @endforeach

        </select>

        <select id="sortFilter">
            <option value="">Sort By</option>
            <option value="low_high">Price: Low → High</option>
            <option value="high_low">Price: High → Low</option>
        </select>

    </div>

    <!-- ================= PRODUCT GRID ================= -->
    <div id="productGrid" class="saas-grid">

        @forelse($products ?? [] as $product)

        <div class="saas-card glass product-item"
             data-name="{{ strtolower($product->name ?? '') }}"
             data-category="{{ $product->category_id ?? '' }}"
             data-price="{{ $product->price ?? 0 }}">

            {{-- BADGES --}}
            <div class="saas-badges">

                @if(!empty($product->created_at) && $product->created_at->diffInDays(now()) <= 7)
                    <span class="badge new">New</span>
                @endif

                @if(($product->price ?? 0) > 100000)
                    <span class="badge hot">Hot</span>
                @endif

                @if(($product->stock_quantity ?? 0) < 5)
                    <span class="badge sale">Sale</span>
                @endif

            </div>

            {{-- PRODUCT IMAGE --}}
            <div class="saas-image skeleton">

                <img
                    src="{{ !empty($product->image)
                        ? asset('storage/' . $product->image)
                        : asset('images/default.png') }}"
                    alt="{{ $product->name ?? 'Product' }}"
                >

            </div>

            {{-- PRODUCT INFO --}}
            <div class="saas-body">

                <h3>{{ $product->name ?? 'Unnamed Product' }}</h3>

                <p class="saas-desc">
                    {{ !empty($product->description)
                        ? Str::limit($product->description, 90)
                        : 'No description available.' }}
                </p>

                <div class="saas-meta">

                    <span class="price">
                        UGX {{ number_format($product->price ?? 0) }}
                    </span>

                    <span class="stock">
                        Stock: {{ $product->stock_quantity ?? 0 }}
                    </span>

                </div>

                @if(!empty($product->id))
                    <a href="{{ route('orders.create', $product->id) }}"
                       class="saas-btn-primary">
                       Order Now
                    </a>
                @else
                    <button class="saas-btn-primary" disabled>
                        Not Available
                    </button>
                @endif

            </div>

        </div>

        @empty

            <div class="saas-empty text-center">
                <h3>No products available at the moment.</h3>
                <p>Please check back later or adjust your filters.</p>
            </div>

        @endforelse

    </div>
</div>

@endsection