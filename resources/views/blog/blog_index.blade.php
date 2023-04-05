@extends('layout.layout')

@section('content')
<div class="page-content mb-0 mt-50">
    <div class="container" style="padding-bottom: 50px;">
        <div class="row">
            <div class="col-lg-9">
                <div class="shop-product-fillter mb-50 pr-30">
                    <div class="totall-product">
                        <h2 class="font-neue">
                            ბლოგი
                        </h2>
                    </div>
                </div>
                <div class="loop-grid loop-list pr-30 mb-50">
                    <article class="mb-30">
                        <a href="https://mallline.io/blog/satesto-blogi">
                            <div class="post-thumb" style="background-image: url(assets/imgs/blog/blog-1.png); border-radius: 0 !important; margin-left: 0 !important;"></div>
                        </a>
                        <div class="entry-content-2 pl-50">
                            <h3 class="post-title mb-20">
                                <a href="https://mallline.io/blog/satesto-blogi" class="font-neue" style="font-size: 17px;">სატესტო ბლოგი</a>
                            </h3>
                            <p class="post-exerpt mb-40">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer... 
                            </p>
                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                <div>
                                    <p class="post-on"><i class="fi-rs-calendar"></i> 2 კვირის წინ</p>
                                </div>
                                <p class="hit-count has-dot"> <i class="fi-rs-eye"></i> <span id="view">126</span>ნახვა</p>
                            </div>
                            <hr>
                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                <div>
                                    <p class="post-on">Posted in: <a class="text-brand3 font-heading font-weight-bold" href="#0">ზოგადი</a></p>
                                </div>
                                <a href="https://mallline.io/blog/satesto-blogi" class="text-brand3 font-heading font-weight-bold">დაწვრილებით <i class="fi-rs-arrow-right"></i></a>
                            </div>
                    </article>
                </div>
                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                    <!-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                            </li>
                        </ul>
                    </nav> -->
                </div>
            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar mt-100">
                <div class="widget-area">
                    <div class="search-form mb-20">
                        <form action="#">
                            <input type="text" placeholder="ძებნა" style="text-align: left; font-size: 12px;">
                            <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>
                    <div class="sidebar-widget widget-category-2 mb-50">
                        <h5 class="section-title style-1 mb-30 font-neue" style="font-size: 15px;">კატეგორიები</h5>
                        <ul>
                            <li>
                                <a href="#0"> ზოგადი</a><span class="count">30</span>
                            </li>
                            <li>
                                <a href="#0"> სამზარეულო</a><span class="count">35</span>
                            </li>
                            <li>
                                <a href="#0"> ტელეფონები </a><span class="count">42</span>
                            </li>
                            <li>
                                <a href="#0"> სახის მოვლა</a><span class="count">68</span>
                            </li>
                            <li>
                                <a href="#0"> საყოფაცხოვრებო</a><span class="count">87</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .primary-sidebar .sidebar-widget {
      position: relative;
      padding: 30px;
      border: 1px solid #ececec;
      border-radius: 15px;
      -webkit-box-shadow: 5px 5px 15px rgb(0 0 0 / 5%);
      box-shadow: 5px 5px 15px rgb(0 0 0 / 5%);
    }
    .widget-category-2 ul li a img {
      max-width: 30px;
      margin-right: 15px;
    }
    .widget-category-2 ul li {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      line-height: 48px;
      border-radius: 5px;
      border: 1px solid #F2F3F4;
      padding: 9px 18px;
      margin: 0 0 15px 0;
      -webkit-box-pack: justify;
      -ms-flex-pack: justify;
      justify-content: space-between;
      transition: .3s;
      -moz-transition: .3s;
      -webkit-transition: .3s;
      -o-transition: .3s;
    }
    .widget-category-2 ul li a {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      padding: 0;
      line-height: 1.5;
      color: #253D4E;
      font-size: 14px;
    }
</style>
@endsection