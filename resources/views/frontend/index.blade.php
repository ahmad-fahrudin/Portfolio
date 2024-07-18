@extends('frontend.main_master')
@section('title')
    HOME | AHMAD FAHRUDIN Website
@endsection

@section('content')
    <!-- banner-area -->
    @include('frontend.home_all.home_slide')
    <!-- banner-area-end -->

    <!-- about-area -->
    @include('frontend.home_all.home_about')
    <!-- about-area-end -->

    <!-- portfolio-area -->
    <section class="portfolio">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section__title text-center">
                        <span class="sub-title">02 - Portfolio</span>
                        <h2 class="title">All creative work</h2>
                    </div>
                </div>
            </div>
        </div>
        @php
            $portfolio = App\Models\Portfolio::latest()->get();
        @endphp
        <div class="tab-content" id="portfolioTabContent">
            <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="graphic-tab">
                <div class="container">
                    <div class="row gx-0 justify-content-center">
                        <div class="col">
                            <div class="portfolio__active">
                                @foreach ($portfolio as $item)
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{ asset($item->portfolio_image) }}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>{{ $item->portfolio_name }}</span>
                                            <h4 class="title"><a
                                                    href="{{ route('portfolio.details', $item->id) }}">{{ $item->portfolio_title }}</a>
                                            </h4>
                                            <a href="{{ route('portfolio.details', $item->id) }}" class="link">My
                                                Portfolio</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio-area-end -->

    <!-- blog-area -->
    @include('frontend.home_all.home_blog')
    <!-- blog-area-end -->
    <!-- contact-area -->
    <section class="homeContact">
        <div class="container">
            <div class="homeContact__wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section__title">
                            <span class="sub-title">04 - Say hello</span>
                            <h2 class="title">Any questions? Feel free <br> to contact</h2>
                        </div>
                        <div class="homeContact__content">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form</p>
                            <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="homeContact__form">
                            <form action="{{ route('store.message') }}" method="POST">
                                @csrf
                                <input type="text" placeholder="Enter name*" name="name">
                                <input type="email" placeholder="Enter mail*" name="email">
                                <input type="number" placeholder="Enter number*" name="number">
                                <textarea name="message" placeholder="Enter Massage*" name="message"></textarea>
                                <button type="submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->
@endsection
