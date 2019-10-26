@extends('layouts.default')
@section('title', 'Nyeuseuh - Laundry online Tel-Aviv')

@section('content')
<section class="banner">
    <div id="carouselBanner" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselBanner" data-slide-to="0" class="active"></li>
            <li data-target="#carouselBanner" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banners/1.jpeg') }}" class="d-block w-100" alt="Solutions for your Dirty outfits">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Solutions for your Dirty outfits</h1>
                    <p>Lazy to wash your outfit? Give Nyeuseuh to help you clean your dirty outfits with ease.</p>
                    <a href="#" class="btn btn-outline-light rounded-pill mb-2 btn-lg">Order Now</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banners/2.jpeg') }}" class="d-block w-100" alt="Online Appoinment">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Online Appoinment</h1>
                    <p>Too busy to visit Nyeuseuh workshop? Let your phone and laptop works for you. Order your laundry on our website and our employee will pickup your dirty outfits.</p>
                    <a href="#" class="btn btn-outline-light rounded-pill mb-2 btn-lg">Order Now</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselBanner" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselBanner" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<section class="what-offer py-5 bg-white">
    <div class="container">
        <div class="text-center">
            <h2>What We Offer?</h2>
            <p class="w-50 mx-auto mb-3">We dedicate ourselves to help you take care of your laundry. But we're not stopping there. These are the things that make us Nyeuseuh!</p>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-11 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-body text-center">
                            <i class="fas fa-truck-pickup fa-3x text-primary mb-3"></i>
                            <h5>PICK UP & DELIVERY</h5>
                            <p>Free pick up and delivery laundry right at your door.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-body text-center">
                            <i class="fas fa-wallet fa-3x text-primary mb-3"></i>
                            <h5>AFFORDABLE PRICE</h5>
                            <p>Start price from IDR 10.000 and so many promo programs.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-body text-center">
                            <i class="fas fa-medal fa-3x text-primary mb-3"></i>
                            <h5>PREMIUM QUALITY</h5>
                            <p>We deliver best laundry experience in town.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="customer-service pt-4 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="row">
                    <div class="col-md-4 mt-5">
                        <h1>Need Help?</h1>
                        <p>Don't hesitate to ask our customer service if you need any help or question about Nyeuseuh.<br>We will assist you with love 24/7 .</p>
                        <a href="#" class="btn btn-primary">Contact Us</a>
                    </div>
                    <div class="col-md-8">
                        <img src="{{ asset('images/customer-service.png') }}" width="100%" alt="CS">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonials py-5">
    <div class="container">
        <div class="text-center mb-3">
            <h2>What People Are Saying</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-body shadow p-4">
                    <div class="d-flex justify-content-start">
                        <img src="{{ asset('images/testimonials/yael.jpg') }}" width="95" height="50" class="img-thumbnail rounded-circle" alt="Yael">
                        <div class="content ml-4">
                            <p>Nyeuseuh service very affordable. They always picked up my dirty outfits ontime.</p>
                            <p class="font-weight bold text-black-50 mb-0">- Yaeli, Tel-Aviv</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-body shadow p-4">
                    <div class="d-flex justify-content-start">
                        <img src="{{ asset('images/testimonials/walid.jpg') }}" width="95" height="50" class="img-thumbnail rounded-circle" alt="Yael">
                        <div class="content ml-4">
                            <p>First time for me using Nyeuseuh and I just can say "WOW" about their service, very fast and clean.</p>
                            <p class="font-weight bold text-black-50 mb-0">- Walid Diab, Kuwait</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
