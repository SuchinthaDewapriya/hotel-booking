@extends('layouts.app')
@section('title', 'Photo Gallery of Secret Paradise Villa | Sri Lanka')
@section('meta')
<meta name="description" content="Explore the photo gallery of Secret Paradise Villa in Sri Lanka. Discover stunning images of our luxury rooms, beautiful dining areas, and breathtaking views of Hiriketiya Beach.">
<meta name="keywords" content="Secret Paradise Villa gallery, Sri Lanka villa photos, Hirik Beach images, luxury villa photos, hotel photo gallery">                                                                                                                                                                                                                            
@endsection
@section('content')
<section class="gallery-page py-25">
    <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
        <h1 class="page-title text-center mt-5">Photo Gallery of Secret Paradise Villa</h1>
        <p class="text-center">Explore the photo gallery of Secret Paradise Villa in Sri Lanka. Discover stunning images of our luxury rooms, beautiful dining areas, and breathtaking views of Hiriketiya Beach. Our gallery showcases the unique charm and beauty of our villa, giving you a glimpse of the unforgettable experience that awaits you at Secret Paradise Villa.</p>
     </div>
    
        <div class="row">

            @foreach($images as $img)
            <div class="col-md-4 mb-4">

                <div class="gallery-item" data-aos="fade-up">

                    <a href="{{ asset($img['path']) }}" data-lightbox="gallery">
                        <img src="{{ asset($img['path']) }}"
                             class="gallery-img"
                             loading="lazy"
                             alt="Villa gallery image">
                    </a>

                </div>

            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection