<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <title></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="apple-touch-icon" href="{{ asset('assets-dashboard/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets-dashboard/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/pages/authentication.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/style.css') }}">

</head>
<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template/index.html"><span class="brand-logo">
                        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                        <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg></span>
                        <h2 class="brand-text mb-0">Mallline store</h2>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up">5</span></a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 me-auto">შეტყობინებები</h4>
                                <div class="badge rounded-pill badge-light-primary">6</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Congratulation Sam 🎉</span>winner!</p><small class="notification-text"> Won the monthly best seller badge.</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">სრული სია</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span><span class="user-status">Admin</span></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="page-profile.html"><i class="me-50" data-feather="user"></i> ჩემი პროფილი</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('actionUsersLogout') }}"><i class="me-50" data-feather="power"></i> გასვლა</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item me-auto"><a class="navbar-brand" href="">
                        <span class="brand-logo">
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <h2 class="brand-text mb-0">SWIT</h2>
                        </a>
                    </li>
                    <li class="nav-item nav-toggle">
                        <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                            <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="dropdown nav-item" data-menu="dropdown">
                        <a class="nav-link d-flex align-items-center" href="index.html" data-bs-toggle="dropdown">
                            <i data-feather="home"></i>
                            <span>მთავარი გვერდი</span>
                        </a>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown">
                        <a class="dropdown-toggle nav-link d-flex align-items-center" href="index.html" data-bs-toggle="dropdown">
                            <i data-feather="users"></i>
                            <span>სისტემური მომხმარებლები</span>
                        </a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li data-menu="">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('actionUsersIndex') }}" data-bs-toggle="">
                                    <i data-feather="circle"></i>
                                    <span>სრული სია</span>
                                </a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item d-flex align-items-center" href="dashboard-analytics.html" data-bs-toggle="">
                                    <i data-feather="circle"></i>
                                    <span>წვდომის ჯგუფები</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            @yield('breadcrumb')
            <div class="content-body">
                <div class="row">
                    <div class="page-content pt-50 pb-50">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="nav-vertical">
                                                <ul class="nav nav-tabs nav-left flex-column" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="baseVerticalLeft-tab1" data-bs-toggle="tab" aria-controls="tabVerticalLeft1" href="#tabVerticalLeft1" role="tab" aria-selected="true">პარამეტრები</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="baseVerticalLeft-tab2" data-bs-toggle="tab" aria-controls="tabVerticalLeft2" href="#tabVerticalLeft2" role="tab" aria-selected="false">ნავიგაცია</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="baseVerticalLeft-tab3" data-bs-toggle="tab" aria-controls="tabVerticalLeft3" href="#tabVerticalLeft3" role="tab" aria-selected="false">პროდუქცია</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="baseVerticalLeft-tab4" data-bs-toggle="tab" aria-controls="tabVerticalLeft4" href="#tabVerticalLeft4" role="tab" aria-selected="false">სლაიდერი</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="baseVerticalLeft-tab5" data-bs-toggle="tab" aria-controls="tabVerticalLeft3" href="#tabVerticalLeft5" role="tab" aria-selected="false">DNS</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="baseVerticalLeft-tab6" data-bs-toggle="tab" aria-controls="tabVerticalLeft3" href="#tabVerticalLeft6" role="tab" aria-selected="false">ელ-ფოსტა</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="baseVerticalLeft-tab7" data-bs-toggle="tab" aria-controls="tabVerticalLeft3" href="#tabVerticalLeft3" role="tab" aria-selected="false">შეკვეთები</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="baseVerticalLeft-tab8" data-bs-toggle="tab" aria-controls="tabVerticalLeft3" href="#tabVerticalLeft3" role="tab" aria-selected="false">მომხმარებლების სია</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="baseVerticalLeft-tab8" data-bs-toggle="tab" aria-controls="tabVerticalLeft3" href="#tabVerticalLeft3" role="tab" aria-selected="false">სტატისტიკა</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('actionMainIndex') }}">საიტზე დაბრუნება</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('actionUsersLogout') }}">გასვლა</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tabVerticalLeft1" role="tabpanel" aria-labelledby="baseVerticalLeft-tab1">
                                                        <form id="info_form" class="" style="overflow-x: hidden;">
                                                            <div class="row">
                                                                <h3 class="mb-2 mt-2 text-brand">სოციალური ქსელებით ავტორიზაცია</h3>
                                                                <div class="form-group col-md-6 newfrm">
                                                                    <label for="" class="mb-1">ვებ გვერდის დასახელება (ქართულად)</label>
                                                                    <input class="form-control" name="name_ge" type="text" value="{{ $web_data->name_ge }}"/>
                                                                </div>
                                                                <div class="form-group col-md-6 newfrm">
                                                                    <label for="" class="mb-1">ვებ გვერდის დასახელება (ინგლისურად)</label>
                                                                    <input class="form-control" name="name_en" type="text" value="{{ $web_data->name_en }}"/>
                                                                </div>
                                                                <h3 class="mb-2 mt-2 text-brand">საკონტაქტო ინფორმაცია და სოც ქსელები</h3>
                                                                <div class="form-group col-md-6 newfrm">
                                                                    <label for="" class="mb-1">ელ-ფოსტა</label>
                                                                    <input class="form-control" name="{{ $info_parameter[0]->key }}" type="text" value="{{ $info_parameter[0]->value }}"/>
                                                                </div>
                                                                <div class="form-group col-md-6 newfrm">
                                                                    <label for="" class="mb-1">ტელეფონის ნომერი</label>
                                                                    <input class="form-control" name="{{ $info_parameter[1]->key }}" type="text" value="{{ $info_parameter[1]->value }}"/>
                                                                </div>
                                                                <div class="form-group col-md-12 newfrm">
                                                                    <label for="" class="mb-1">მისამართი</label>
                                                                    <input class="form-control" name="{{ $info_parameter[2]->key }}" type="text"  value="{{ $info_parameter[2]->value }}" />
                                                                </div>
                                                                <div class="form-group col-md-4 newfrm">
                                                                    <label for="" class="mb-1">Facebook</label>
                                                                    <input class="form-control" name="{{ $social_parameter[0]->key }}" type="text"  value="{{ $social_parameter[0]->value }}" />
                                                                </div>
                                                                <div class="form-group col-md-4 newfrm">
                                                                    <label for="" class="mb-1">Instagram</label>
                                                                    <input class="form-control" name="{{ $social_parameter[1]->key }}" type="text" value="{{ $social_parameter[1]->value }}" />
                                                                </div>
                                                                <div class="form-group col-md-4 newfrm">
                                                                    <label for="" class="mb-1">Youtube</label>
                                                                    <input class="form-control" name="{{ $social_parameter[2]->key }}" type="text" value="{{ $social_parameter[2]->value }}" />
                                                                </div>
                                                                <h3 class="mb-2 mt-2 text-brand">ვებ გვერდის ლოგო</h3>
                                                                <div class="form-group col-md-12 newfrm">
                                                                    <label for="" class="mb-1">აირჩიეთ სურათი</label>
                                                                    <input class="form-control" name="logotype" type="file"/>
                                                                    <span class="text-brand" style="font-size: 13px; position: relative; top: 10px;">იმისათვის რომ სურათი კაგად გამოჩნდეს ვებ გვერდზე გთხოვთ ატვირთოთ (275px X 65px) ზომის სურათი</span>

                                                                </div>
                                                                <h3 class="mb-2 mt-2 text-brand">სოციალური ქსელებით ავტორიზაცია</h3>
                                                                <div class="form-group col-md-6 newfrm">
                                                                    <label for="" class="mb-1">Facebook ავტორიზაციის სტატუსი</label>
                                                                    <select class="form-control" name="fb_auth">
                                                                        <option value="1" @if($web_data->fb_auth == 1) selected @endif>ჩართული</option>
                                                                        <option value="2" @if($web_data->fb_auth == 2) selected @endif>გამორთული</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6 newfrm">
                                                                    <label for="" class="mb-1">Facebook</label>
                                                                    <input class="form-control" name="fb_auth_key" type="text" value="{{ $web_data->fb_auth_key }}" />
                                                                </div>
                                                                <div class="form-group col-md-6 newfrm">
                                                                    <label for="" class="mb-1">Google ავტორიზაციის სტატუსი</label>
                                                                    <select class="form-control" name="google_auth">
                                                                        <option value="1" @if($web_data->google_auth == 1) selected @endif>ჩართული</option>
                                                                        <option value="2" @if($web_data->google_auth == 2) selected @endif>გამორთული</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6 newfrm">
                                                                    <label for="" class="mb-1">Google</label>
                                                                    <input class="form-control" name="google_auth_key" type="text" value="{{ $web_data->google_auth_key }}" />
                                                                </div>
                                                                <h3 class="mb-2 mt-2 text-brand">აპლიკაციების გასაღები</h3>
                                                                <div class="form-group col-md-6 newfrm">
                                                                    <label for="" class="mb-1">SMSOFFICE</label>
                                                                    <input class="form-control" name="sms_office" type="text" value="{{ $web_data->smsoffice }}" />
                                                                </div>
                                                                <div class="col-md-12 mt-1">
                                                                    <button type="button" class="btn btn-success" onclick="SaveInfoParameters()">შენახვა</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane" id="tabVerticalLeft2" role="tabpanel" aria-labelledby="baseVerticalLeft-tab2" style="overflow-x: hidden;">
                                                        <table class="table" id="tblLocations" cellpadding="0" cellspacing="0" border="1" >
                                                            <thead>
                                                                <tr>
                                                                    <th>დასახელება</th>
                                                                    <th>სტატუსი</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($dash_navigation_list as $nav_item)
                                                                <tr>
                                                                    <td>{{ json_decode($nav_item->title)->{app()->getLocale()} }}</td>
                                                                    <td class="config">
                                                                        <label class="switch">
                                                                            <input type="checkbox" id="navigation_active_{{ $nav_item->id }}" onclick="ChangeNavigationStatus({{ $nav_item->id }}, this)" @if($nav_item->active == 1) checked @endif>
                                                                            <span class="slider round"></span>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane" id="tabVerticalLeft3" role="tabpanel" aria-labelledby="baseVerticalLeft-tab5">
                                                        <div class="table-responsive">
                                                            <button class="btn btn-success" style="color: #fff; margin-bottom: 10px;" onclick="AddProductModal()">ახალი პროდუქტის დამატება</button>
                                                            <table class="table" id="vendortb">
                                                                <thead>
                                                                    <tr>
                                                                        <th>სურათი</th>
                                                                        <th>სათაური</th>
                                                                        <th>კატეგორია</th>
                                                                        <th>ფასდაკლება</th>
                                                                        <th>ფასი</th>
                                                                        <th>მარაგი</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($dash_product_list as $product_item)
                                                                    <tr>
                                                                        <td><img src="{{ $product_item->photo }}" style="width: 150px"></td>
                                                                        <td>{{ $product_item->{"name_" . app()->getLocale()} }}</td>
                                                                        <td>{{ json_decode($product_item->getCategoryData->name)->{app()->getLocale()} }}</td>
                                                                        @if(!empty($product_item->discount_percent && $product_item->discount_percent))
                                                                        <td>{{ $product_item->discount_percent }}%</td>
                                                                        @else
                                                                        <td>0</td>
                                                                        @endif
                                                                        <td>
                                                                        @if(!empty($product_item->discount_price))
                                                                        <div class="product-price">
                                                                            <span>₾{{ $product_item->discount_price / 100 }}</span>
                                                                            <span style="text-decoration: line-through" class="old-price">₾{{ $product_item->getProductPrice->price / 100}}</span>
                                                                        </div>
                                                                        @else
                                                                        <div class="product-price">
                                                                            <span>₾{{ $product_item->getProductPrice->price / 100}}</span>
                                                                        </div>
                                                                        @endif
                                                                        </td>
                                                                        <td class="text-center detail-info" data-title="Stock">
                                                                            @if($product_item->count > 1)
                                                                            <span class="stock-status in-stock mb-0"> მარაგშია </span>
                                                                            @else
                                                                            <span class="stock-status out-stock mb-0" style="color: #f74b81;">{{ trans('site.no_stock') }}</span>
                                                                            @endif
                                                                        </td>
                                                                        <td class="config">
                                                                            <button type="button" class="btn btn-flat-danger" onclick="DeleteProduct({{ $product_item->id }})">
                                                                                <i data-feather="trash" class="me-25"></i>
                                                                                <span></span>
                                                                            </button>
                                                                            <button type="button" class="btn btn-flat-danger" onclick="EditProduct({{ $product_item->id }})">
                                                                                <i data-feather="edit" class="me-25"></i>
                                                                                <span></span>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tabVerticalLeft4" role="tabpanel" aria-labelledby="baseVerticalLeft-tab3">
                                                        <div class="row">
                                                            <div class="table-responsive">
                                                                <table class="table" id="vendortb">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>სურათი</th>
                                                                            <th>მოკლე ტექსტი</th>
                                                                            <th>მბული</th>
                                                                            <th>ბანერი</th>
                                                                            <th>მოქმედება</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($dash_slider_list as $slider_item)
                                                                        <tr>
                                                                            <td><img src="{{ $slider_item->path }}" style="width: 150px"></td>
                                                                            <td>{{ json_decode($slider_item->text)->{'small_text_'.app()->getLocale()} }}</td>
                                                                            <td>{{ $slider_item->url }}</td>
                                                                            <td>
                                                                                @if($slider_item->is_banner == 1) კი @else არა @endif
                                                                            </td>
                                                                            <td class="config">
                                                                                <button type="button" class="btn btn-flat-success" onclick="DeleteSliderPhoto({{ $slider_item->id }})">
                                                                                    <i data-feather="trash" class="me-25"></i>
                                                                                    <span>წაშლა</span>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <h3 class="mb-1 mt-1 text-brand">ახალი სურათის დამატება</h3>
                                                            <form id="slider_form" class="row">
                                                                <div class="col-12 mb-3 mb-1">
                                                                    <label class="form-label">სურათი</label>
                                                                    
                                                                </div>
                                                                <div class="col-lg-6 mb-1">
                                                                    <label class="form-label">ტექსტი 1 (ქართულად)</label>
                                                                    <div class="form-group">
                                                                        <input id="slider_small_text_ge" name="slider_small_text_ge" class="form-control check-input" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 mb-1">
                                                                    <label class="form-label">ტექსტი 1 (ინგლისურად)</label>
                                                                    <div class="form-group">
                                                                        <input id="slider_small_text_en" name="slider_small_text_en" class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 mb-1">
                                                                    <label class="form-label">ტექსტი 2 (ქართულად)</label>
                                                                    <div class="form-group">
                                                                        <input id="slider_big_text_ge" name="slider_big_text_ge" class="form-control check-input" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 mb-1">
                                                                    <label class="form-label">ტექსტი 2 (ინგლისურად)</label>
                                                                    <div class="form-group">
                                                                        <input id="slider_big_text_en" name="slider_big_text_en" class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mb-1">
                                                                    <label class="form-label">URL</label>
                                                                    <div class="form-group">
                                                                        <input id="slider_url" name="slider_url" class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mb-1">
                                                                    <label class="form-label">ბენერი</label>
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="is_banner" name="is_banner" value="1">
                                                                            <label class="custom-control-label" for="is_banner"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-2">
                                                                    <button class="btn btn-success font-neue" type="button" onclick="SliderSubmit()">შენახვა</button>
                                                                </div>
                                                                <input type="hidden" name="slider_id" id="slider_id">
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tabVerticalLeft5" role="tabpanel" aria-labelledby="baseVerticalLeft-tab5">
                                                        
                                                    </div>
                                                    <div class="tab-pane" id="tabVerticalLeft6" role="tabpanel" aria-labelledby="baseVerticalLeft-tab6">
                                                        <div class="alert alert-danger p-2" role="alert">
                                                            იმისათვის რომ შექმნათ ელ-ფოსტა გთხოვთ დაამატოთ თქვენი დომეინი
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-start" id="product-add-modal" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Basic Modal</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="product_form" class="pb-50 dropzone">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="category">აირჩიეთ კატეგორია *</label>
                                <select name="product_category" id="cat">
                                    <option value="0"></option>
                                    @foreach($dash_product_category_list as $category_item)
                                    <option value="{{ $category_item->id }}">{{ json_decode($category_item->name)->{app()->getLocale()} }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">სათაური * (ქართულად)</label>
                                <input type="text" class="form-control" name="product_name_ge" id="product_name_ge" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">სათაური * (ინგლისურად)</label>
                                <input type="text" class="form-control" name="product_name_en" id="product_name_en" />
                            </div>
                            <div class="col-12 mb-3 mb-2">
                                <label class="form-label">მთავარი სურათი *</label>
                                <div class="form-group">
                                    <input id="product_photo" name="product_photo" class="form-control check-input" type="file">
                                </div>
                            </div>
                            <div class="col-12 mb-3 mb-2">
                                <label class="form-label">დამატებითი სურათები (მაქსიმუმ 5 სურათი)</label>
                                <div id="file-upload-form" class="uploader">
                                    <input id="file-upload" type="file" name="gallery_photo[]" multiple accept="image/*" />
                                    <label for="file-upload" id="file-drag">
                                      <img id="file-image" src="#" alt="Preview" class="hidden">
                                      <div id="start">
                                        <img src="assets\imgs\theme\icons\upload.png" alt="">
                                        <div>სურათის ატვირთვა</div>
                                        <div id="notimage" class="hidden">მაქსიმუმ 10 ფოტო</div>
                                      </div>
                                      <div id="response" class="hidden">
                                        <div id="messages"></div>
                                        <progress class="progress" id="file-progress" value="0">
                                          <span>0</span>%
                                        </progress>
                                      </div>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <label for="">აღწერა * (ქართულად)</label>
                                <textarea name="product_description_ge" id="product_description_ge" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <label for="">აღწერა * (ინგლისურად)</label>
                                <textarea name="product_description_en" id="product_description_en" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for="">ფასი *</label>
                                <input  class="form-control" name="product_price" id="product_price" type="text" min="1" step="1"  placeholder="ფასი" onkeyup="CalculatePercent(), CalculateDiscountPrice()"/>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for=""> ფასდაკლების ფასი</label>
                                <input class="form-control" name="product_discount_price" id="product_discount_price" type="text"   placeholder="ფასდაკლება" onkeyup="CalculatePercent()" />
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for=""> ფასდაკლების %</label>
                                <input class="form-control" name="product_discount_percent" id="product_discount_percent" type="text"   placeholder="ფასდაკლება" onkeyup="CalculateDiscountPrice()"/>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <label for=""> რაოდენობა *</label>
                                <input  class="form-control" name="product_count" id="product_count" type="text">
                            </div>
                            <span class="font-small text-muted">SEO პარამეტრები</span>
                            <div class="form-group col-md-6 mb-2">
                                <label for="">პროდუქტის მეტა KEYWORDS (ქართულად)</label>
                                <input class="form-control" name="product_meta_keywords_ge" id="product_meta_keywords_ge" type="text">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label for=""> პროდუქტის მეტა KEYWORDS (ინგლისურად)</label>
                                <input class="form-control" name="product_meta_keywords_en" id="product_meta_keywords_en" type="text">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label for=""> პროდუქტის მეტა DESCRIPTION (ქართულად)</label>
                                <input class="form-control" name="product_meta_description_ge" id="product_meta_description_ge" type="text">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label for=""> პროდუქტის მეტა DESCRIPTION (ინგლისურად)</label>
                                <input class="form-control" name="product_meta_description_en" id="product_meta_description_en" type="text">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success submit font-weight-bold" onclick="ProductSubmit()">გამოქვეყნება</button>
                </div>
            </div>
        </div>
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0 font-helvetica-regular">
            <span class="font-helvetica-regular float-md-start d-block d-md-inline-block mt-25">ყველა უფლება დაცულია &copy; 2023
                <a class="ms-25" href="javascript:;" target="_blank">Swit store</a>
            </span>
            <span class="float-md-end d-none d-md-block">Build with<i data-feather="heart"></i> By Mito Chikhladze</span>
        </p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <script src="{{ asset('assets-dashboard/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets-dashboard/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/core/app.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/custom.js') }}"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        select = $('.select2');
        select.each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this
              .select2({
                placeholder: '',
                dropdownParent: $this.parent()
              })
              .change(function () {
                $(this).valid();
              });
        });
    </script>
    <script>
        function SaveInfoParameters() {
            var form = $('#info_form')[0];
            var data = new FormData(form);

            $.ajax({
                dataType: 'json',
                url: "/dashboard/ajax/contact",
                type: "POST",
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },beforeSend: function() {
                    $('#info_form').block({
                        message: '<div class="spinner-border text-primary" role="status"></div>',
                        css: {
                          backgroundColor: 'transparent',
                          border: '0'
                        },
                        overlayCSS: {
                          backgroundColor: '#fff',
                          opacity: 0.8
                        }
                    });
                },
                success: function(data) {
                $('#info_form').unblock();
                    if(data['status'] == true) {
                        toastr.success(data['message']);
                    } else {
                        $.each(data['message'], function(key, value) {
                            toastr.warning(value);
                        });
                    }
                }
            });
        }

        function ChangeNavigationStatus(navigation_id, elem) {
            if($(elem).is(":checked")) {
                navigation_active = 1;
            } else {
                navigation_active = 2
            }

            $.ajax({
                dataType: 'json',
                url: "/dashboard/ajax/navigation",
                type: "POST",
                data: {
                    navigation_id: navigation_id,
                    navigation_active: navigation_active,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    return;
                }
            });
        }

        function SliderSubmit() {
            var form = $('#slider_form')[0];
            var data = new FormData(form);

            $.ajax({
                dataType: 'json',
                url: "/dashboard/ajax/slider/add",
                type: "POST",
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if(data['status'] == true) {
                        if(data['errors'] == true) {
                            $(".check-input").removeClass('border-danger'); 
                            $.each(data['message'], function(key, value) {

                            });
                        } else {
                            Swal.fire({
                              icon: 'success',
                              text: data['message'],
                            })
                            location.reload();
                        }   
                    }
                }
            });
        }

        function ProductSubmit() {

            var form = $('#product_form')[0];
            var data = new FormData(form);

            $.ajax({
                dataType: 'json',
                url: "/dashboard/ajax/product/add",
                type: "POST",
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if(data['status'] == true) {
                        Swal.fire({
                          icon: 'success',
                          text: data['message'],
                        })
                        location.reload();
                    } else {
                        $.each(data['message'], function(key, value) {
                            $('#'+key).addClass('input-error');
                            toastr.warning(value);
                        })
                    }
                }
            });
        }

        function DeleteSliderPhoto(slider_id) {
            Swal.fire({
                title: "ნამდვილად გსურთ სურათის წაშლა?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'წაშლა',
                cancelButtonText: "გათიშვა",
                preConfirm: () => {
                    $.ajax({
                        dataType: 'json',
                        url: "/dashboard/ajax/slider/delete",
                        type: "POST",
                        data: {
                            slider_id: slider_id,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            Swal.fire({
                              icon: 'success',
                              text: data['message'],
                            })
                            location.reload();
                        }
                    });
                }
            });
        }

        function DeleteProduct(product_id) {
            Swal.fire({
                title: "ნამდვილად გსურთ სურათის წაშლა?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'წაშლა',
                cancelButtonText: "გათიშვა",
                preConfirm: () => {
                    $.ajax({
                        dataType: 'json',
                        url: "/dashboard/ajax/product/delete",
                        type: "POST",
                        data: {
                            product_id: product_id,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            Swal.fire({
                              icon: 'success',
                              text: data['message'],
                            })
                            location.reload();
                        }
                    });
                }
            });
        }

        function SaveDomainInfo() {
            Swal.fire({
                title: "ნამდვილად გსურთ დომეინის მიბმა?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'დადასტურება',
                cancelButtonText: "გათიშვა",
                preConfirm: () => {
                    $.ajax({
                        dataType: 'json',
                        url: "/dashboard/ajax/domain/add",
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            Swal.fire({
                              icon: 'success',
                              text: data['message'],
                            })
                            location.reload();
                        }
                    });
                }
            });
        }

        function CalculatePercent() {
            var price_1 = $("#product_price").val();
            var price_2 = $("#product_discount_price").val();
            var percent = ((price_1 - price_2) / price_1) * 100;


            if(document.getElementById("product_discount_price").value.length != 0 && document.getElementById("product_price").value.length != 0) {
                $("#product_discount_percent").val(percent);
            }

        }


        function CalculateDiscountPrice() {
            var price_1 = $("#product_price").val();
            var price_2 = $("#product_discount_percent").val();

            var price = price_1 - ((price_1 / 100) * price_2);


            if(document.getElementById("product_price").value.length != 0 && document.getElementById("product_discount_percent").value.length != 0) {
                $("#product_discount_price").val(price);
            }
        }

        function AddProductModal() {
            $("#product-add-modal").modal('show');
        }
        </script>
</body>
</html>