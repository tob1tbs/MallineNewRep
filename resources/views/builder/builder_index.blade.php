@extends('layout.layout')

@section('content')
<main class="main pages">
    <div class="page-content pt-50 pb-50">
        <div class="container">
            <h1 class="pb-30 Center font-neue">შექმენი ონლაინ მაღაზია</h1>
            <div class="img-banner text">
                <div class="dUieKo">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white ">
                            <form method="post" class="flex">
                                <p class="mt-10 mb-10 bold" style="font-size: 13px;">რა სფეროს მოემსახურება თქვენი მაღაზია?</p>
                                <div class="form-group">
                                    <select  name="store_category" id="store_category" style="width: 100%; height: 50px; background-color: #ffffff !important;border: 1px solid #ececec !important;  padding: 0 20px; border-radius: 10px; font-size: 13px; cursor: pointer;">
                                        <option>მრავალ პროფილური</option>
                                        @foreach($category_list->where('parent_id', 0) as $category_item)
                                        <option value="{{ $category_item->id }}">{{ json_decode($category_item->name)->{app()->getLocale()} }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subdomain" id="subdomain" placeholder="მაღაზიის სახელი" onkeyup="ShowSubdomain()" style=" width: 100%; font-size: 13px; margin-right: 0;">
                                </div>
                                <p class="mt-10 mb-10 bold" style="font-size: 13px;">დაშვებული სიმბოლოები არის 'a'-დან 'z'-მდე და ციფრები ინტერვალის გარეშე</p>
                                <div class="domaincard mb-20 mt-20" style="padding: 10px 15px;">
                                    <p class="text-brand-black bold mt-10 font-neue">შემოწმება</p>
                                    <div class="card-body bg-transparent" style="padding: 5px 0">
                                        <p class="mb-15 bold">თქვენი მაღაზიის დომენის სახელი ასე გამოიყურება:</p>
                                        <span class="text-brand bold">
                                            <span class="text-brand bold subdomain-text"></span>.mallline.io
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-30 block">
                                    <button type="button" onclick="SubmitBuilder()" class="font-neue btn-block hover-up left button">შექმენი</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <section class="featured section-padding" style="padding: 10px 0 20px 0; margin-top: 130px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                            <div class="banner-left-icon d-flex align-items-center wow fadeIn animated" style="padding: 10px 20px;">
                                <div class="banner-icon">
                                    <img src="{{ asset('assets/imgs/theme/icons/price-tag.png') }}" alt="" style="width: 50px; height: 50px;" />
                                </div>
                                <div class="banner-text">
                                    <h3 class="icon-box-title" style="font-size: 16px;">{{ trans('site.badge_1_heading') }}</h3>
                                    <p>{{ trans('site.badge_1_body') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="banner-left-icon d-flex align-items-center wow fadeIn animated" style="padding: 10px 20px;">
                                <div class="banner-icon">
                                    <img src="{{ asset('assets/imgs/theme/icons/fast-delivery.png') }}" alt="" style="width: 50px; height: 50px;" />
                                </div>
                                <div class="banner-text">
                                    <h3 class="icon-box-title" style="font-size: 16px;">{{ trans('site.badge_2_heading') }}</h3>
                                    <p>{{ trans('site.badge_2_body') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="banner-left-icon d-flex align-items-center wow fadeIn animated" style="padding: 10px 20px;">
                                <div class="banner-icon">
                                    <img src="{{ asset('assets/imgs/theme/icons/hand-shake.png') }}" alt="" style="width: 50px; height: 50px;" />
                                </div>
                                <div class="banner-text">
                                    <h3 class="icon-box-title" style="font-size: 16px;">{{ trans('site.badge_3_heading') }}</h3>
                                    <p>{{ trans('site.badge_3_body') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="banner-left-icon d-flex align-items-center wow fadeIn animated" style="padding: 10px 20px;">
                                <div class="banner-icon">
                                    <img src="{{ asset('assets/imgs/theme/icons/new-product.png') }}" alt="" style="width: 50px; height: 50px;" />
                                </div>
                                <div class="banner-text">
                                    <h3 class="icon-box-title" style="font-size: 16px;">{{ trans('site.badge_4_heading') }}</h3>
                                    <p>{{ trans('site.badge_4_body') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="banner-left-icon d-flex align-items-center wow fadeIn animated" style="padding: 10px 20px;">
                                <div class="banner-icon">
                                    <img src="{{ asset('assets/imgs/theme/icons/exchange.png') }}" alt="" style="width: 50px; height: 50px;" />
                                </div>
                                <div class="banner-text">
                                    <h3 class="icon-box-title" style="font-size: 16px;">{{ trans('site.badge_5_heading') }}</h3>
                                    <p>{{ trans('site.badge_5_body') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>
@endsection

@section('js')
<script type="text/javascript">
    function ShowSubdomain() {
        $(".subdomain-text").html($("#subdomain").val())
    }

    function CheckSubdomain() {
        $.ajax({
            dataType: 'json',
            url: "/builder/ajax/check",
            type: "GET",
            data: {
                subdomain: $("#subdomain").val(),
            },
            success: function(data) {
                if(data['status'] == true) {
                    if(data['errors'] == true) {
                        toastr.warning(data['message']);   
                    } else {
                        toastr.success(data['message']);   
                    }
                }
            }
        });
    }

    function SubmitBuilder() {
        $.ajax({
            dataType: 'json',
            url: "/builder/ajax/submit",
            type: "POST",
            data: {
                subdomain: $("#subdomain").val(),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $("#preloader-active").show();
                $(".preloader-text").show();
            },
            success: function(data) {
                $("#preloader-active").hide();
                if(data['status'] == true) {
                    if(data['errors'] == true) {
                        toastr.warning(data['message']);   
                    } else {
                        window.location.replace("{{ route('actionBuilderSuccess') }}");
                    }
                }
            }
        }); 
    }
</script>
@endsection