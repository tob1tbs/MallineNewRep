@extends('layout.layout')

@section('content')
<main class="main pages mb-80">
    <div class="page-content pt-50 mb-80">
        <div class="container">
            <div class="archive-header-2 text-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="sidebar-widget-2 widget_search mb-50">
                            <div class="search-form">
                                <form action="{{ route('actionVendorsIndex') }}">
                                    <input type="text" name="vendor_search_query" value="{{ request()->vendor_search_query }}" placeholder="მოძებნეთ მომწოდებლები (სახელით)..." />
                                    <button type="submit"><i class="fi-rs-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-50">
                <div class="col-12">
                    <div class="shop-product-fillter" style="justify-content: center;">
                        <div class="totall-product" style="text-align: center; justify-content: center;">
                            <p>ამჟამად ჩვენთან რეგისტრირებულია <strong class="text-brand">{{ $vendors_count }}+</strong> მომწოდებელი</p>
                        </div>
                    </div>
                </div>
                <div class="row vendor-grid">
                    @foreach($vendors_list as $vendor)
					@if(!empty($vendor->data))
                    <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                        <div class="vendor-wrap mb-40">
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <a href="{{ route('actionProductsIndex', ['vendor[]' => $vendor->id]) }}">   
                                    <span class="font-small total-product" style="font-size: 14px;">{{ $vendor->vendorProductCount->where('deleted_at_int', '!=', 0)->count('id') }} პროდუქტი</span>
                                </a>
                            </div>
                            <div class="vendor-img-action-wrap">
                                <div class="vendor-img" style="background-image: url('https://{{ json_decode($vendor->data)->host }}/uploads/logotype/{{ json_decode($vendor->data)->logotype }}')">
                                </div>
                            </div>
                            <div class="vendor-content-wrap" >
                                <div class="mb-30">
                                    <div>
                                        <h4 class="mb-5">
                                            <a target="_blank" class="font-neue" style="font-size: 16px;" href="https://{{ json_decode($vendor->data)->host }}">{{ json_decode($vendor->data)->name_ge }}</a>
                                        </h4>
                                        <div class="product-rate-cover" id="parent">
                                            <div class="product-rate d-inline-block">
                                                <div class="vendors-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-brand3"> (4.8)</span>
                                            <i class="fi-rs-angle-down"></i>
                                            <div id="popup2">
                                                    <h6 class="mb-20 mt-10">ვენდორის შეფასება</h6>
                                                    <div class="progress">
                                                        <span>5 <img src="assets/imgs/icons/star.png" alt=""></span>
                                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>4 <img src="assets/imgs/icons/star.png" alt=""></span>
                                                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 <img src="assets/imgs/icons/star.png" alt=""></span>
                                                        <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 <img src="assets/imgs/icons/star.png" alt=""></span>
                                                        <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                    </div>
                                                    <div class="progress mb-10">
                                                        <span>1 <img src="assets/imgs/icons/star.png" alt=""></span>
                                                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vendor-info mb-30">
                                    <ul class="contact-infor text-muted">
                                        <li>
                                            <img src="{{ asset('assets/imgs/theme/icons/icon-location.svg') }}" alt="" /> 
                                            <span>{{ json_decode($vendor->data)->address }}</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/imgs/theme/icons/icon-email-2.svg') }}" alt="" /> <span>{{ json_decode($vendor->data)->email }}</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/imgs/theme/icons/icon-contact.svg') }}" alt="" /> 
                                            <span>{{ json_decode($vendor->data)->phone }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <a href="https://{{ json_decode($vendor->data)->host }}" class="btn font-neue" style="padding: 7px;">მაღაზიის ნახვა <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
					@endif
                    @endforeach
                </div>
            {{ $vendors_list->links('vendor.custom') }}
            </div>
        </div>
    </div>
</main>
@endsection