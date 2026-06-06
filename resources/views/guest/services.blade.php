@extends('layouts.app')

@section('content')

<div class="services-page">

    <div class="container py-5">

        <div class="page-header text-center mb-5">
            <h2>Our Services</h2>
            <p class="text-muted">Explore our professional solutions designed for you</p>
        </div>

        <div class="row g-4">

            @forelse($services as $service)

            <div class="col-12 col-sm-6 col-lg-4">

                <div class="service-card h-100">

                    <h4>{{ $service->name }}</h4>

                    <p class="description">
                        {{ Str::limit($service->description, 110) }}
                    </p>

                    <div class="price">
                        UGX {{ number_format($service->price) }}
                    </div>

                    <a href="{{ route('services.show', $service->slug) }}"
                       class="service-btn">
                        View Details
                    </a>

                </div>

            </div>

            @empty

            <p class="text-center">No services available.</p>

            @endforelse

        </div>

    </div>

</div>

@endsection