@extends('layouts.app')

@section('title', 'Luxury Rooms in Sri Lanka | Secret Paradise Villa')

@section('meta')
<meta name="description" content="Explore luxury rooms at Secret Paradise Villa. Comfortable, affordable, and perfect for your stay in Sri Lanka. Book your ideal room today.">
<meta name="keywords" content="hotel rooms Sri Lanka, luxury rooms, villa accommodation, booking rooms">
@endsection

@section('content')

<section class="rooms-page py-25">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
        <h1 class="page-title text-center mt-5">Luxury Accommodation with Modern Facilities and Scenic Views</h1>
        <p class="text-center">Explore high-quality hotel rooms in Sri Lanka designed for tourists seeking comfort, modern facilities, and scenic views. Our accommodation offers affordable luxury, combining convenience, relaxation, and well-equipped spaces to enhance your stay. Perfect for travelers looking for the best rooms with excellent facilities and beautiful surroundings.</p>
        </div>
        @foreach($rooms as $index => $room)

        @php
            $gallery = $room->gallery;

            $images = array_filter([
                $gallery->gallery_image_1 ?? null,
                $gallery->gallery_image_2 ?? null,
                $gallery->gallery_image_3 ?? null,
                $gallery->gallery_image_4 ?? null,
                $gallery->gallery_image_5 ?? null
            ]);
            @endphp

        <div class="row align-items-center my-5" data-aos="fade-up">

            <div class="col-md-6 mb-5 {{ $index % 2 != 0 ? 'order-md-2' : '' }}">

                @if(count($images))

                    <img class="main-img mb-2" id="mainImg{{ $room->r_id }}"
                        src="{{ asset('public/images/rooms/'.$images[0]) }}"
                        class="img-fluid mb-3" alt="Luxury {{ $room->r_name }} room in Sri Lanka with modern facilities" title="Luxury {{ $room->r_name }} room in Sri Lanka with modern facilities" loading="lazy">

                    <div class="d-flex flex-wrap gap-2">
                        @foreach($images as $img)
                            <img src="{{ asset('public/images/rooms/'.$img) }}"
                                class="thumb"
                                onclick="changeImage('{{ $room->r_id }}', this.src)" alt="Thumbnail of {{ $room->r_name }} room in Sri Lanka" title="Thumbnail of {{ $room->r_name }} room in Sri Lanka" loading="lazy">
                        @endforeach
                    </div>

                @else
                    <p>No images available</p>
                @endif

            </div>

            <div class="col-md-6 {{ $index % 2 != 0 ? 'order-md-1' : '' }}">
                <h2>Luxury {{ $room->r_name }} in Sri Lanka</h2>

                <p>{{ $room->r_description }}</p>

                <p><strong>Max Occupancy:</strong> {{ $room->max_occupancy }}</p>
                <p><strong>Price:</strong> ${{ $room->r_price }}</p>
                <p><em>Additional Bed:</em> ${{ $room->r_additional_bed }}</p>
                <!-- <a href="http://localhost/secretparadise/reservation?room=2" class="btn btn-book">
                                <i class="fas fa-calendar-check"></i> Book Now
                            </a> -->
                <a href="{{ url('reservation/' . $room->r_id) }}" class="btn btn-book">
                    <i class="fas fa-calendar-check mr-2"></i> Book Now
                </a>
            </div>

        </div>

        @endforeach

    </div>
</section>

<!-- JS -->
<script>
function changeImage(id, src) {
    document.getElementById("mainImg" + id).src = src;
}
</script>

@endsection