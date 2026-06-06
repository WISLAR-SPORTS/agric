@extends('layouts.app')

@section('content')

<div class="faq-page">

    {{-- HEADER --}}
    <section class="faq-header">
        <div class="container text-center">

            <h1>Frequently Asked Questions</h1>

            <p>Find quick answers or ask us if you need more help.</p>

            {{-- KEEP YOUR MODAL TRIGGER --}}
            <button type="button" id="openAskModal" class="btn-primary">
                Ask a Question <span>→</span>
            </button>

        </div>
    </section>

    {{-- FAQ LIST --}}
    <section class="faq-content">
          <div class="faq-container">

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

</div>

{{-- MODAL (STAYS, BUT OUTSIDE PAGE STRUCTURE) --}}
<div id="askModal" class="modal">
    <div class="modal-content">

        <button class="close-modal">&times;</button>

        @include('guest.ask', ['categories' => $categories])

    </div>
</div>

@endsection