<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <div class="container">
            <div class="align-items-center d-flex">
                <div class="col-lg-6">
                    <div class="header-info">
                        <ul>
                            <li>
                                <a href="{{ route('actionMainWishlist') }}">{{ trans('site.heading_text_1') }}</a>
                                <span class="wishlistcount wishlist_counter2">{{ $wishlist_count }}</span>
                            </li>
                            <li><a href="{{ route('actionMainHowToBuy') }}">{{ trans('site.heading_text_2') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block" style="padding: 7px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="header-info">
                        <ul>
                            <li class="createshop">
                                @if(Auth::check())
                                <a class="categories-button-active" href="{{ route('actionBuilderIndex') }}">
                                    <span class="fi-rs-shopping-cart"></span> 
                                    <span class="et">შექმენი მაღაზია</span>
                                </a>
                                @else
                                <a class="categories-button-active" href="javascript:;" onclick="LoginModal()">
                                    <span class="fi-rs-shopping-cart"></span> 
                                    <span class="et">შექმენი მაღაზია</span>
                                </a>
                                @endif
                            </li>
                            <li style="font-size: 12px;"><a href="{{ route('actionMainFaq') }}">{{ trans('site.heading_text_2') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>
                                <a href="{{ route('actionProductsIndex', ['discounted' => 1]) }}" class="text-brand3" style="font-size: 12px;">{{ trans('site.discounted') }}</a>  
                            </li>
                            <li>
                                <a href="{{ route('actionBlogIndex') }}" style="font-size: 12px;">{{ trans('site.blog') }}</a>  
                            </li>
                            <li>
                                <a href="{{ route('actionVendorsIndex') }}" style="font-size: 12px;">{{ trans('site.vendors') }}</a>  
                            </li>
                            <li>
                                @if(app()->getLocale() == 'ge')
                                <a class="language-dropdown-active" href="javascript:;"><img src="{{ asset('assets/imgs/theme/geo.png') }}" alt="">  <i class="fi-rs-angle-small-down"></i></a>
                                @else
                                <a class="language-dropdown-active" href="javascript:;"><img src="{{ asset('assets/imgs/theme/en.png') }}" alt="">  <i class="fi-rs-angle-small-down"></i></a>
                                @endif
                                <ul class="language-dropdown">
                                    <li>
                                        @if(app()->getLocale() == 'ge')
                                        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}"><img src="{{ asset('assets/imgs/theme/en.png') }}" alt=""></a>
                                        @else
                                        <a href="{{ LaravelLocalization::getLocalizedURL('ge') }}"><img src="{{ asset('assets/imgs/theme/geo.png') }}" alt=""></a>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-lg-block d-none sticky-bar">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('actionMainIndex') }}">
                        <img src="{{ url('assets/imgs/theme/mallline.png') }}" alt="logo" />
                    </a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="{{ route('actionProductsIndex') }}" method="GET">
                            <input type="text" name="search_query" class="search_query" placeholder="{{ trans('site.search_query') }}"  value="{{ request()->search_query }}" autocomplete="off">
                            <button type="submit" class="search-button"><i class="fi-rs-search"></i></button>
                            <div class="navbar-search__results shown" id="ajaxsearchcontent" style="display: none;">
                                
                            </div> 
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" data-toggle="tooltip" data-placement="top" title="{{ trans('site.compare') }}" href="{{ route('actionMainCompare') }}">
                                    <img class="svgInject" src="{{ asset('assets/imgs/theme/icons/compare.png') }}"/>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" data-toggle="tooltip" data-placement="top" title="{{ trans('site.wishlist') }}" href="{{ route('actionMainWishlist') }}">
                                    <img alt="Molline" src="{{ asset('/assets/imgs/theme/icons/icon-heart.svg') }}" width="24" height="24"/>
                                    <span class="pro-count blue wishlist_counter1">{{ $wishlist_count }}</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                @if(Auth::check() == false)
                                <a class="account" href="javascript:;" onclick="LoginModal()">
                                    <img class="svgInject" alt="Molline" src="{{ asset('assets/imgs/theme/icons/Component20.png') }}" />
                                    <p style="font-size: 14px;" style="font-neue">{{ trans('site.login') }}</p>
                                </a>
                                @else
                                <a href="{{ route('actionUsersIndex') }}" class="account">
                                    <img class="svgInject" alt="Molline" src="{{ asset('assets/imgs/theme/icons/Component20.png') }}" />
                                    <p style="font-size: 14px; padding-left: 5px;">{{ trans('site.my_account') }}</p>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ route('actionMainIndex') }}"><img src="{{ url('assets/imgs/theme/mallline.png') }}" alt="logo"/></a>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="{{ route('actionMainCompare') }}">
                                <img class="svgInject"  src="{{ asset('assets/imgs/theme/icons/compare.png') }}" />
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="/wishlist.html">
                                <img alt="Molline" src="{{ asset('assets/imgs/theme/icons/icon-heart-2.svg') }}"/>
                                <span class="pro-count cart-item-count white">0</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="modal fade mdll" id="exampleModal" style="padding: 0">
    <div class="catoverlay" id="catclose1"></div>
    <div class="modal-dialog cat">
        <div class="modal-content" style="border: none">
            <div class="modal-body catbox">
                <div class="col-md-4 catlist">
                <!--Menu Categories-->
                <div class="styles__ContainerBlock-sc-1fbw3zu-4 fgxCpI">
                    <div class="styled__CategoryMenuWrapper-sc-1gjbxx7-25 llUdzF">
                            <div class="header">
                                <span class="heading">{{ trans('site.categories') }}</span>
                                <button class="close" id="catclose"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 1L1 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M1 1L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>
                            </div>
                            <div class="ipoLtC">
                                @foreach($category_list->where('parent_id', 0) as $category_item)
                                <div class="categoriess" data-id="{{ $category_item->id }}">
                                    <button class="parent" >
                                        <span class="title">{{ json_decode($category_item->name)->{app()->getLocale()} }}</span>
                                        <div class="hero">
                                            <span class="hnjFCX">
                                                <img src="https://adjarastoremedia.s3.amazonaws.com/media/product_category/100x100%E1%83%9C%E1%83%AC%E1%83%94%E1%83%98%E1%83%9D%E1%83%A4%E1%83%9C%E1%83%98%E1%83%AC%E1%83%94%E1%83%91%E1%83%A4%E1%83%98%E1%83%94%E1%83%A0%E1%83%B0%E1%83%A49348%E1%83%B073849%E1%83%B0%E1%83%A3348%E1%83%A4734%E1%83%B0%E1%83%A4%E1%83%A33%E1%83%A4.png" loading="eager">
                                            </span>
                                        </div>
                                    </button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>