@extends('layout.layout')

@section('content')
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>	

<main class="main pages">
    <div class="page-content pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu" id="vendormenu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="true">პარამეტრები</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="navigation-tab" data-bs-toggle="tab" href="#navigation" role="tab" aria-controls="navigation" aria-selected="false">ნავიგაცია</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="slider-tab" data-bs-toggle="tab" href="#slider" role="tab" aria-controls="slider" aria-selected="false">სლაიდერი</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="dns-tab" data-bs-toggle="tab" href="#dns" role="tab" aria-controls="slider" aria-selected="false">DNS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#emails" role="tab" aria-controls="slider" aria-selected="false">ელ-ფოსტა</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">შეკვეთები</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="userlist-tab" data-bs-toggle="tab" href="#userlist" role="tab" aria-controls="userlist" aria-selected="true">მომხმარებლების სია</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="statistic-tab" data-bs-toggle="tab" href="#statistic" role="tab" aria-controls="statistic" aria-selected="true">სტატისტიკა</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="productscard-tab" data-bs-toggle="tab" href="#productscard" role="tab" aria-controls="productscard" aria-selected="true">პროდუქციის ქარდი</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.html">გასვლა</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content">
                                <div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <form id="info_form" class="">
                                                <div class="row">
													<h3 class="mb-20 mt-20 text-brand">სოციალური ქსელებით ავტორიზაცია</h3>
													<div class="form-group col-md-6 newfrm">
                                                        <label for="">ვებ გვერდის დასახელება (ქართულად)</label>
                                                        <input class="form-control" name="name_ge" type="text" value="{{ $web_data->name_ge }}"/>
                                                    </div>
													<div class="form-group col-md-6 newfrm">
                                                        <label for="">ვებ გვერდის დასახელება (ინგლისურად)</label>
                                                        <input class="form-control" name="name_en" type="text" value="{{ $web_data->name_en }}"/>
                                                    </div>
                                                    <h3 class="mb-20 mt-20 text-brand">საკონტაქტო ინფორმაცია და სოც ქსელები</h3>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">ელ-ფოსტა</label>
                                                        <input class="form-control" name="{{ $info_parameter[0]->key }}" type="text" value="{{ $info_parameter[0]->value }}"/>
                                                    </div>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">ტელეფონის ნომერი</label>
                                                        <input class="form-control" name="{{ $info_parameter[1]->key }}" type="text" value="{{ $info_parameter[1]->value }}"/>
                                                    </div>
                                                    <div class="form-group col-md-12 newfrm">
                                                        <label for="">მისამართი</label>
                                                        <input class="form-control" name="{{ $info_parameter[2]->key }}" type="text"  value="{{ $info_parameter[2]->value }}" />
                                                    </div>
                                                    <div class="form-group col-md-4 newfrm">
                                                        <label for="">Facebook</label>
                                                        <input class="form-control" name="{{ $social_parameter[0]->key }}" type="text"  value="{{ $social_parameter[0]->value }}" />
                                                    </div>
                                                    <div class="form-group col-md-4 newfrm">
                                                        <label for="">Instagram</label>
                                                        <input class="form-control" name="{{ $social_parameter[1]->key }}" type="text" value="{{ $social_parameter[1]->value }}" />
                                                    </div>
                                                    <div class="form-group col-md-4 newfrm">
                                                        <label for="">Youtube</label>
                                                        <input class="form-control" name="{{ $social_parameter[2]->key }}" type="text" value="{{ $social_parameter[2]->value }}" />
                                                    </div>
													<h3 class="mb-20 mt-20 text-brand">ვებ გვერდის ლოგო</h3>
                                                    <div class="form-group col-md-12 newfrm">
                                                        <label for="">აირჩიეთ სურათი</label>
                                                        <input class="form-control" name="logotype" type="file"/>
                                                       	<span class="text-brand" style="font-size: 13px; position: relative; top: 10px;">იმისათვის რომ სურათი კაგად გამოჩნდეს ვებ გვერდზე გთხოვთ ატვირთოთ (275px X 65px) ზომის სურათი</span>

                                                    </div>
													<h3 class="mb-20 mt-20 text-brand">სოციალური ქსელებით ავტორიზაცია</h3>
													<div class="form-group col-md-6 newfrm">
														<label for="">Facebook ავტორიზაციის სტატუსი</label>
														<select class="form-control" name="fb_auth">
															<option value="1" @if($web_data->fb_auth == 1) selected @endif>ჩართული</option>
															<option value="2" @if($web_data->fb_auth == 2) selected @endif>გამორთული</option>
														</select>
													</div>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">Facebook</label>
                                                        <input class="form-control" name="fb_auth_key" type="text" value="{{ $web_data->fb_auth_key }}" />
                                                    </div>
													<div class="form-group col-md-6 newfrm">
														<label for="">Google ავტორიზაციის სტატუსი</label>
														<select class="form-control" name="google_auth">
															<option value="1" @if($web_data->google_auth == 1) selected @endif>ჩართული</option>
															<option value="2" @if($web_data->google_auth == 2) selected @endif>გამორთული</option>
														</select>
													</div>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">Google</label>
                                                        <input class="form-control" name="google_auth_key" type="text" value="{{ $web_data->google_auth_key }}" />
                                                    </div>
													<h3 class="mb-20 mt-20 text-brand">აპლიკაციების გასაღები</h3>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">SMSOFFICE</label>
                                                        <input class="form-control" name="sms_office" type="text" value="{{ $web_data->smsoffice }}" />
                                                    </div>
													<h3 class="mb-20 mt-20 text-brand">ფერების არჩევა</h3>
													<div class="form-group col-md-6">
														<label for=""> ვებ გვერდის ძირითადი ფერი</label>
														აქ ფერის ასარჩევი
													</div>
													<div class="form-group col-md-6">
														<label for=""> ტექსტის ძირითადი ფერი</label>
														აქ ფერის ასარჩევი
													</div>
                                                    <div class="col-md-12">
                                                        <button type="button" class="add" onclick="SaveInfoParameters()">შენახვა</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
								<div class="tab-pane fade" id="emails" role="tabpanel" aria-labelledby="navigation-tab">
									<div class="add-product prcard">
										<ul class="nav flex-column" role="tablist">
											<li class="nav-item" id="add">
												<a class="button button-add-to-cart" id="addemail-tab" data-bs-toggle="tab" href="#add_email" role="tab" aria-controls="orders" aria-selected="false"><img src="{{ asset('assets\imgs\theme\icons\add-circle.png') }}">დამატება</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="tab-pane fade" id="navigation" role="tabpanel" aria-labelledby="navigation-tab">
                                    <div class="card">
                                        <div class="card-body">
											<div class="row">
												<div class="table-responsive">
													<table class="table" id="tblLocations" cellpadding="0" cellspacing="0" border="1">
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
																	<button><img src="assets\imgs\theme\icons\dots.png" alt=""></button>
																</td>
															</tr>
															@endforeach
														</tbody>
													</table>
												</div>
											</div>
                                        </div>
                                    </div>
								</div>
								<div class="tab-pane fade" id="dns" role="tabpanel" aria-labelledby="dns-tab">
									<span>იმისათვის რომ მიაბათ თქვენი საკუთარი დომეინი გთხოვთ დომეინს გაუწეროთ ჩვენი NS მისამართები: ns1.mallline.ge, ns2.mallline.ge</span>
									<form id="info_form" class="">
										<div class="row">
											<h3 class="mb-20 mt-20 text-brand">დომეინის მიბმა</h3>
											<div class="form-group col-md-12 newfrm">
												<label for="">გთხოვთ შეიყვანოთ დომეინის სახელი</label>
												<input class="form-control" name="domain_name" type="text" value="{{ $web_data->domain }}"/>
											</div>
											<div class="col-md-12">
												<button type="button" class="add" onclick="SaveDomainInfo()">შენახვა</button>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="add_email" role="tabpanel" aria-labelledby="addproduct-tab">
									@if(!empty($web_data->domain))
									<span>ახალი ელ-ფოსტის დამატება</span>
									<form id="info_form" class="">
										<div class="row">
											<h3 class="mb-20 mt-20 text-brand">დომეინის მიბმა</h3>
											<div class="form-group col-md-12 newfrm">
												<label for="">გთხოვთ ელფოსტის</label>
												<input class="form-control" name="domain_name" type="text" value="{{ $web_data->domain }}"/>
											</div>
											<div class="col-md-12">
												<button type="button" class="add" onclick="SaveDomainInfo()">შენახვა</button>
											</div>
										</div>
									</form>
									@else
									<div class="alert alert-danger" role="alert">
									იმისათვის რომ შექმნათ ელ-ფოსტა გთხოვთ დაამატოთ თქვენი დომეინი
									</div>
									@endif
								</div>
								<div class="tab-pane fade" id="slider" role="tabpanel" aria-labelledby="slider-tab">
                                    <div class="card">
                                        <div class="card-body">
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
																	<button onclick="DeleteSliderPhoto({{ $slider_item->id }})"><img src="{{ asset('assets\imgs\theme\icons\delete.png') }}" alt=""></button>
																</td>
															</tr>
															@endforeach
														</tbody>
													</table>
												</div>
												<h3 class="mb-20 mt-20 text-brand">ახალი სურათის დამატება</h3>
												<form id="slider_form" class="row">
													<div class="col-12 mb-3 mb-2">
														<label class="form-label">სურათი</label>
														<div class="form-group">
															<input id="slider_photo" name="slider_photo" class="form-control check-input" type="text" style="width: 65%; float: left;">
															<a id="lfm" data-input="slider_photo" data-preview="holder" class="btn btn-light font-helvetica-regular" style="max-width: 35%; float: right;">სურათის არჩევა</a>
														</div>
													</div>
													<div class="col-lg-6 mb-2">
														<label class="form-label">ტექსტი 1 (ქართულად)</label>
														<div class="form-group">
															<input id="slider_small_text_ge" name="slider_small_text_ge" class="form-control check-input" type="text">
														</div>
													</div>
													<div class="col-lg-6 mb-2">
														<label class="form-label">ტექსტი 1 (ინგლისურად)</label>
														<div class="form-group">
															<input id="slider_small_text_en" name="slider_small_text_en" class="form-control" type="text">
														</div>
													</div>
													<div class="col-lg-6 mb-2">
														<label class="form-label">ტექსტი 2 (ქართულად)</label>
														<div class="form-group">
															<input id="slider_big_text_ge" name="slider_big_text_ge" class="form-control check-input" type="text">
														</div>
													</div>
													<div class="col-lg-6 mb-2">
														<label class="form-label">ტექსტი 2 (ინგლისურად)</label>
														<div class="form-group">
															<input id="slider_big_text_en" name="slider_big_text_en" class="form-control" type="text">
														</div>
													</div>
													<div class="col-lg-12 mb-2">
														<label class="form-label">URL</label>
														<div class="form-group">
															<input id="slider_url" name="slider_url" class="form-control" type="text">
														</div>
													</div>
													<div class="col-lg-12 mb-2">
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
                                    </div>
								</div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0 text-brand2">ჩემი შეკვეთები</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table" id="vendortb">
                                                    <thead>
                                                        <tr>
                                                            <th>შეკვეთა</th>
                                                            <th>თარიღი</th>
                                                            <th>სტატუსი</th>
                                                            <th>ჯამი</th>
                                                            <th>მოქმედებები</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>#1</td>
                                                            <td>5 მარტი, 2022</td>
                                                            <td class="green">წარმატებით დასრულდა</td>
                                                            <td>₾499.00</td>
                                                            <td><a class="action-btn" data-bs-toggle="modal" data-bs-target="#orderViewModal">ნახვა</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2</td>
                                                            <td>29 ივლისი, 2022</td>
                                                            <td class="orange">პროცესშია</td>
                                                            <td>₾499.00</td>
                                                            <td><a href="#" class="btn-small d-block">ნახვა</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#3</td>
                                                            <td>29 ივლისი, 2022</td>
                                                            <td class="red">გაუქმებულია</td>
                                                            <td>₾499.00</td>
                                                            <td><a href="#" class="btn-small d-block">ნახვა</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#4</td>
                                                            <td>29 ივლისი, 2022</td>
                                                            <td class="red">გაუქმებულია</td>
                                                            <td>₾499.00</td>
                                                            <td><a href="#" class="btn-small d-block">ნახვა</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#5</td>
                                                            <td>29 ივლისი, 2022</td>
                                                            <td class="orange">პროცესშია</td>
                                                            <td>₾499.00</td>
                                                            <td><a href="#" class="btn-small d-block">ნახვა</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#6</td>
                                                            <td>29 ივლისი, 2022</td>
                                                            <td class="green">წარმატებით დასრულდა</td>
                                                            <td>₾499.00</td>
                                                            <td><a href="#" class="btn-small d-block">ნახვა</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="userlist" role="tabpanel" aria-labelledby="userlist-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0 text-brand2">მომხმარებლები</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table" id="vendortb">
                                                    <thead>
                                                        <tr>
                                                            <th>#N</th>
                                                            <th>სახელი</th>
                                                            <th>გვარი</th>
                                                            <th>მეილი</th>
                                                            <th>საკონტაქტო</th>
                                                            <th>რეგისტრაციის თარიღი</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>#1</td>
                                                            <td>მარიამ</td>
                                                            <td>მამულაშვილი</td>
                                                            <td>mariam.mamulashvili@gmail.com</td>
                                                            <td>598887766</td>
                                                            <td class="text-brand3">29.07.2022</td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2</td>
                                                            <td>მარიამ</td>
                                                            <td>მამულაშვილი</td>
                                                            <td>mariam.mamulashvili@gmail.com</td>
                                                            <td>598887766</td>
                                                            <td class="text-brand3">29.07.2022</td>
                                                        </tr>
                                                        <tr>
                                                            <td>#3</td>
                                                            <td>მარიამ</td>
                                                            <td>მამულაშვილი</td>
                                                            <td>mariam.mamulashvili@gmail.com</td>
                                                            <td>598887766</td>
                                                            <td class="text-brand3">29.07.2022</td>
                                                        </tr>
                                                        <tr>
                                                            <td>#4</td>
                                                            <td>მარიამ</td>
                                                            <td>მამულაშვილი</td>
                                                            <td>mariam.mamulashvili@gmail.com</td>
                                                            <td>598887766</td>
                                                            <td class="text-brand3">29.07.2022</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="statistic" role="tabpanel" aria-labelledby="statistic-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0 text-brand2">სტატისტიკა</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="productscard" role="tabpanel" aria-labelledby="productscard-tab">
                                    <div class="card">
                                        <div class="add-product prcard">
                                            <ul class="nav flex-column" role="tablist">
                                                <li class="nav-item" id="add">
                                                    <a class="button button-add-to-cart" id="addproduct-tab" data-bs-toggle="tab" href="#addproduct" role="tab" aria-controls="orders" aria-selected="false"><img src="{{ asset('assets\imgs\theme\icons\add-circle.png') }}">დამატება</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table" id="vendortb">
                                                    <thead>
                                                        <tr>
                                                            <th>სურათი</th>
                                                            <th>სათაური</th>
                                                            <th>კატეგორია</th>
                                                            <th>ფასდაკლება</th>
                                                            <th>ფასი</th>
                                                            <th>მარაგი</th>
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
																<button onclick="DeleteProduct({{ $product_item->id }})"><img src="{{ asset('assets\imgs\theme\icons\delete.png') }}" alt=""></button>
																<button onclick="EditProduct({{ $product_item->id }})"><img src="{{ asset('assets\imgs\theme\icons\edit.png') }}" alt=""></button>
															</td>
                                                        </tr>
														@endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="addproduct" role="tabpanel" aria-labelledby="addproduct-tab">
                                    <div class="card">
                                        <div class="card-header addprcard">
                                            <h3 class="mb-0 text-brand2">პროდუქციის დამატება</h3>
                                            <span class="font-small text-muted">პროდუქციის დეტალები</span>
                                        </div>
                                        <div class="card-body">
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
                                                    <div class="form-group col-md-12">
                                                        <label for="">აღწერა * (ქართულად)</label>
                                                        <textarea name="product_description_ge" id="product_description_ge" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="">აღწერა * (ინგლისურად)</label>
                                                        <textarea name="product_description_en" id="product_description_en" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">ფასი *</label>
                                                        <input  class="form-control" name="product_price" id="product_price" type="text" min="1" step="1"  placeholder="ფასი" onkeyup="CalculatePercent(), CalculateDiscountPrice()"/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for=""> ფასდაკლების ფასი</label>
                                                        <input class="form-control" name="product_discount_price" id="product_discount_price" type="text"   placeholder="ფასდაკლება" onkeyup="CalculatePercent()" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for=""> ფასდაკლების %</label>
                                                        <input class="form-control" name="product_discount_percent" id="product_discount_percent" type="text"   placeholder="ფასდაკლება" onkeyup="CalculateDiscountPrice()"/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for=""> რაოდენობა *</label>
                                                        <input  class="form-control" name="product_count" id="product_count" type="text">
                                                    </div>
													<span class="font-small text-muted">SEO პარამეტრები</span>
                                                    <div class="form-group col-md-6">
                                                        <label for="">პროდუქტის მეტა KEYWORDS (ქართულად)</label>
                                                        <input class="form-control" name="product_meta_keywords_ge" id="product_meta_keywords_ge" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for=""> პროდუქტის მეტა KEYWORDS (ინგლისურად)</label>
                                                        <input class="form-control" name="product_meta_keywords_en" id="product_meta_keywords_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for=""> პროდუქტის მეტა DESCRIPTION (ქართულად)</label>
                                                        <input class="form-control" name="product_meta_description_ge" id="product_meta_description_ge" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for=""> პროდუქტის მეტა DESCRIPTION (ინგლისურად)</label>
                                                        <input class="form-control" name="product_meta_description_en" id="product_meta_description_en" type="text">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-fill-out submit font-weight-bold" onclick="ProductSubmit()">გამოქვეყნება</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0 text-brand2">ჩემი პროფილი</h3>
                                            <span class="font-small text-muted">ინფორმაციის რედაქტირება</span>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" name="enq" class="pb-50">
                                                <div class="row">
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">სახელი</label>
                                                        <input  class="form-control" name="name" type="text" placeholder="სახელი" />
                                                    </div>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">გვარი</label>
                                                        <input  class="form-control" name="lastname" type="text"  placeholder="გვარი" />
                                                    </div>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">დაბადების თარიღი</label>
                                                        <input  class="form-control" name="dname" type="date" />
                                                    </div>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">ელ.ფოსტა</label>
                                                        <input  class="form-control" name="email" type="email"  placeholder="ელ.ფოსტა" />
                                                    </div>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">ტელეფონის ნომერი</label>
                                                        <input  class="form-control" name="mobile" type="tel"   placeholder="ტელეფონის ნომერი"/>
                                                    </div>
                                                    <h3 class="mb-20 mt-20 text-brand">სოც ქსელების ლინკები</h3>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">facebook</label>
                                                        <input  class="form-control" name="facebook" type="text"  placeholder="https://www.facebook.com/home" />
                                                    </div>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">instagram</label>
                                                        <input  class="form-control" name="instagram" type="text"  placeholder="https://www.instagram.com/home/" />
                                                    </div>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">youtube</label>
                                                        <input  class="form-control" name="youtube" type="text"  placeholder="https://www.youtube.com/home" />
                                                    </div>
                                                    <div class="form-group col-md-6 newfrm">
                                                        <label for="">web</label>
                                                        <input  class="form-control" name="web" type="text"   placeholder="https://www.mallline.ge/"/>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="add wthbg font-weight-bold" name="submit" value="Submit">გაუქმება</button>
                                                        <button type="submit" class="add" name="submit" value="Submit">შენახვა</button>
                                                    </div>
                                                </div>
                                            </form>
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
</main>
@endsection

@section('js')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    var route_prefix = "{{ url('filemanager') }}";
    $('#lfm').filemanager('image', {prefix: route_prefix});
	$('#lfm_1').filemanager('image', {prefix: route_prefix});
	$('#lfm_2').filemanager('image', {prefix: route_prefix});
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        },
        success: function(data) {
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
</script>

@endsection