@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
@if(!empty($hero))
@php
    $image = $hero->background_image
        ? Storage::url($hero->background_image)
        : null;
@endphp

<section class="hero-section py-5"
    @if($image)
        style="background: linear-gradient(to right, rgba(0,0,0,0.6), rgba(0,0,0,0.2)), url('{{ $image }}') center/cover no-repeat;"
    @else
        style="background: #f6fff8;"
    @endif
>

    <div class="container">
        <div class="row align-items-center">

            {{-- LEFT CONTENT --}}
            <div class="col-lg-6 text-white">

                <span class="badge bg-success mb-3 px-3 py-2">
                    {{ $hero->subtitle ?? 'New Platform' }}
                </span>

                <h1 class="display-5 fw-bold">
                    {{ $hero->title ?? 'AgriWeb' }}
                </h1>

                <p class="lead mt-3">
                    {{ $hero->description ?? '' }}
                </p>

                <div class="mt-4 d-flex gap-3">

                    @if(!empty($hero->button_text))
                        <a href="{{ url($hero->button_link) }}" class="btn btn-success px-4 py-2">
                            {{ $hero->button_text }}
                        </a>
                    @endif

                    <a href="#" class="btn btn-outline-light px-4 py-2">
                        Watch demo
                    </a>

                </div>

            </div>

            {{-- RIGHT DASHBOARD PREVIEW --}}
            <div class="col-lg-6 mt-5 mt-lg-0">

                <div class="card border-0 shadow-lg rounded-4 p-4">

                    <div class="d-flex justify-content-between mb-3">
                        <h6 class="mb-0">Field Overview</h6>
                        <span class="badge bg-success">Live</span>
                    </div>

                    <div class="row g-3">

                        <div class="col-6">
                            <div class="p-3 bg-light rounded-3">
                                <small>Stat 1</small>
                                <h4 class="mb-0">68%</h4>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="p-3 bg-light rounded-3">
                                <small>Stat 2</small>
                                <h4 class="mb-0">4.2</h4>
                            </div>
                        </div>

                    </div>

                    <div class="mt-3">
                        <small class="text-muted">Growth trend</small>
                        <div class="progress mt-2" style="height:8px;">
                            <div class="progress-bar bg-success" style="width:70%"></div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

</section>
@endif


{{-- STATS SECTION (CARDS STYLE) --}}
<section class="stats container py-5">

    <h2 class="stats-title text-center mb-4">Our Impact</h2>

    <div class="row g-4">

        @forelse($stats ?? [] as $stat)
        <div class="col-6 col-md-3">
            <div class="card border-0 text-center p-3 rounded-4 h-100">
    
                @if($stat->icon)
                    <div class="mb-2">
                        <i class="{{ $stat->icon }} fa-2x text-success"></i>
                    </div>
                @endif
    
                <h2 class="fw-bold text-success">
                    {{ $stat->value ?? '0' }}
                </h2>
    
                <p class="text-muted mb-0">
                    {{ $stat->label ?? '' }}
                </p>
    
            </div>
        </div>
    @empty
        <p class="text-center">No stats available yet.</p>
    @endforelse

    </div>

</section>


{{-- FEATURES SECTION --}}
<section class="features container py-5">

    <h2 class="text-center mb-5">Why Choose AgriWeb?</h2>

    <div class="row g-4">

        @forelse($features ?? [] as $feature)

        <div class="col-md-6 col-lg-4">

            <div class="card feature-card border-0 shadow-sm p-4 rounded-4 h-100 text-center"style="background-image: url('{{ asset('storage/' . $feature->icon) }}');">


                <div class="icon-wrapper mb-3">
                    
                </div>
            
                <h5 class="feature-title">{{ $feature->title }}</h5>
            
                <p class="feature-description">
                    {{ $feature->description }}
                </p>
            
            </div>
        </div>

        @empty
            <p class="text-center">No features available.</p>
        @endforelse

    </div>

</section>


    {{-- FAQ LIST --}}
    <section class="faq-content">
       
        <div class="faq-container">
          
            <button type="button" id="openAskModal" class="btn-primary">
                Ask a Question <span>→</span>
            </button>
          <div class="faq-list">

              @forelse($faqs as $faq)

                  <div class="faq-item">

                      <button class="faq-question js-faq-toggle">
                          <span>{{ $faq->question }}</span>
                          <span class="icon">⌄</span>
                      </button>

                      <div class="faq-answer">
                          <p>{{ $faq->answer }}</p>
                      </div>

                  </div>

              @empty
                  <p class="text-center">No FAQs available.</p>
              @endforelse
             
            
          </div>

      </div>
  </section>
  <div id="askModal" class="modal">
    <div class="modal-content">

        <button class="close-modal">&times;</button>

        @include('guest.ask', ['categories' => $categories])

    </div>
</div>


@endsection