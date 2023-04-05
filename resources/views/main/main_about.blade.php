@extends('layout.layout')

@section('content')
<main class="main pages">
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="row align-items-center">
                        <div class="col-lg-6">
                            <img src="{{ asset('assets/imgs/animation/online-shopping.gif')}}" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4" />
                        </div>
                        <div class="col-lg-6">
                            <div class="pl-25">
                                <h2 class="mb-30">კეთილი იყოს თქვენი მობრძანება მოლაინში</h2>
                                {!! $text_data->{"text_" . app()->getLocale()} !!}
                            </div>
                        </div>
                    </section>
                    <section class="text-center mb-50">
                        <h2 class="title style-3 mb-40">რას გთავაზობთ?</h2>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="{{ asset('assets/imgs/theme/icons/icon-1.svg')}}" alt="">
                                    <h4>Best Prices &amp; Offers</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="{{ asset('assets/imgs/theme/icons/icon-2.svg')}}" alt="">
                                    <h4>Wide Assortment</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="{{ asset('assets/imgs/theme/icons/icon-3.svg')}}" alt="">
                                    <h4>Free Delivery</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main> 
@endsection