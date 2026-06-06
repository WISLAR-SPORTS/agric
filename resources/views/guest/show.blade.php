@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm p-4">

                <h2 class="fw-bold">{{ $service->name }}</h2>

                <p class="text-muted mt-3">
                    {{ $service->description }}
                </p>

                <hr>

                <h4 class="text-success">
                    UGX {{ number_format($service->price) }}
                </h4>

                <p class="mt-3">
                    Category: <span class="badge bg-primary">{{ $service->category }}</span>
                </p>

                <a href="{{ route('services') }}" class="btn btn-outline-secondary mt-3">
                    ← Back to Services
                </a>

            </div>

        </div>

    </div>

</div>

@endsection