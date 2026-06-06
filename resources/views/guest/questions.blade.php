<?php
{{-- filepath: /c:/AGRIC/Agric/resources/views/guest/questions.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Questions & Answers</h1>
    <div class="accordion" id="questionsAccordion">
        @foreach($questions as $question)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $question->id }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $question->id }}" aria-expanded="true" aria-controls="collapse{{ $question->id }}">
                        {{ $question->question }}
                    </button>
                </h2>
                <div id="collapse{{ $question->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $question->id }}" data-bs-parent="#questionsAccordion">
                    <div class="accordion-body">
                        {{ $question->answer }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection