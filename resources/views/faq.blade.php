@extends('layouts.app')

@section('title', 'Frequently Asked Questions | Secret Paradise Villa')

@section('meta_description', 'Find answers to common questions about our villa, rooms, check-in times, dining, and facilities.')

@section('content')

<section class="faq-page py-25">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-down">
            <h1 class="page-title text-center mt-5">Frequently Asked Questions</h1>
            <p class="text-center">
                Find answers about check-in times, villa facilities, dining, transportation, and more. If you have other questions, feel free to <a href="{{ url('/contact') }}">contact us</a>.
            </p>
        </div>


        
        <div class="accordion" id="faqAccordion">

            @foreach($faqs as $index => $faq)
            <div class="accordion-item mb-2" data-aos="fade-down">
                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapse{{ $index }}">
                        
                        
                        {{ $faq->question }}

                    </button>
                </h2>

                <div id="collapse{{ $index }}" 
                     class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body">
                        {{ $faq->answer }}
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

@endsection