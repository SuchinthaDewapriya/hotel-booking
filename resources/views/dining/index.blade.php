@extends('layouts.app')
@section('title', 'Dining & Restaurant Menu in Sri Lanka | Secret Paradise Villa')

@section('meta')
<meta name="description" content="Explore delicious dining options at Secret Paradise Villa. Enjoy local Sri Lankan cuisine, fresh seafood, and international dishes in a relaxing setting.">
<meta name="keywords" content="Sri Lanka food menu, hotel dining, restaurant Sri Lanka, villa dining experience, seafood Sri Lanka">
@endsection
@section('content')
<section class="dining-page py-25">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
        <h1 class="page-title text-center mt-5">Delicious Dining Experience with Local and International Cuisine</h1>
        <p class="text-center">Discover a delightful dining experience at Secret Paradise Villa, where we offer a diverse menu featuring local Sri Lankan cuisine, fresh seafood, and international dishes. Our restaurant provides a relaxing setting for guests to enjoy delicious meals made from high-quality ingredients. Whether you're craving traditional flavors or global favorites, our dining options cater to all tastes and preferences.</p>
        </div>
        <div class="menu-nav">
            <div class="container d-flex justify-content-center gap-4 flex-wrap">

                @foreach($menus as $category => $items)
                    <a href="#{{ Str::slug($category) }}" class="menu-link">
                        {{ $category }}
                    </a>
                @endforeach

            </div>
        </div>
        @foreach($menus as $category => $items)
        <section class="category-section" id="{{ Str::slug($category) }}">
            <div class="container">
                <h2 class="category-title mt-5" data-aos="fade-up">{{ ucfirst($category) }}</h2>
                <div class="row dining-menu">
                    @foreach($items as $menu)
                        <div class="col-md-4 mb-4" data-aos="fade-up">
                            <div class="menu-card h-100">
                                <img src="{{ asset('public/images/food/' . $menu->image) }}" class="card-img-top" alt="{{ $menu->name }}" title="{{ $menu->name }}" loading="lazy">
                                <div class="menu-content p-3">
                                <h3 class="mt-3">{{ $menu->name }}</h3>
                                <p>{{ $menu->description }}</p>
                                <span class="price-amount">${{ number_format($menu->price, 2) }}</span>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        @endforeach

    </div>
</section>
@endsection

<script>
document.addEventListener("DOMContentLoaded", function () {

    const links = document.querySelectorAll(".menu-link");
    const sections = document.querySelectorAll(".category-section");
    const nav = document.querySelector(".menu-nav");

    const offset = nav ? nav.offsetHeight : 100;

    links.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            const targetId = this.getAttribute("href");
            const target = document.querySelector(targetId);

            if (target) {
                window.scrollTo({
                    top: target.offsetTop - offset,
                    behavior: "smooth"
                });
            }
        });
    });

    function setActive() {
        let scrollPos = window.scrollY + offset + 20;

        sections.forEach(section => {
            const top = section.offsetTop;
            const id = section.getAttribute("id");

            if (scrollPos >= top) {
                links.forEach(link => link.classList.remove("active"));

                const activeLink = document.querySelector('.menu-link[href="#' + id + '"]');
                if (activeLink) {
                    activeLink.classList.add("active");
                }
            }
        });
    }

    window.addEventListener("scroll", setActive);

    setActive();

});
</script>