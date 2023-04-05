@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="border-0">
                <div class="card-body p-4 p-md-5 p-xl-6">
                    <div class="text-center mb-2-3 mb-lg-6">
                        <h2 class="h1 mb-0 text-secondary bold mb-15 font-neue">რით შეგვიძლია დაგეხმაროთ?</h2>
                        <p class="mb-3">მარტივად მოძებნეთ პასუხი თქვენთვის სასურველ ნებისემიერი სახის შეკითხვაზე!</p>
                    </div>
                    <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link faqslink active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            <span style="font-size: 14px;"><i class="fi-rs-shopping-cart"></i> მოლაინის შესახებ</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link faqslink" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                            <span style="font-size: 14px;"><i class="fi-rs-box"></i> პროდუქტი</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link faqslink" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <span style="font-size: 14px;"><i class="fi-rs-credit-card"></i> ყიდვა</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link faqslink" id="pills-deliver-tab" data-bs-toggle="pill" data-bs-target="#pills-deliver" type="button" role="tab" aria-controls="pills-deliver" aria-selected="false">
                                <span style="font-size: 14px;"><i class="fi-rs-shopping-cart"></i> მიწოდება</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link faqslink" id="pills-vendors-tab" data-bs-toggle="pill" data-bs-target="#pills-vendors" type="button" role="tab" aria-controls="pills-vendors" aria-selected="false">
                                <span style="font-size: 14px;"><i class="fi-rs-shopping-cart"></i> ვენდროებისთვის</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane faqsopen fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div id="accordion" class="accordion-style">
                                <h2 class="h1 mb-0 text-secondary Center bold mb-2 font-neue">მოლაინის შესახებ</h2>
                                <div class="card mb-3">
                                    <div class="faqsmm">
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <span class="faq-heading font-neue">სათაური</span>
                                            	<span class="faq-text">მოლაინი არის საქართველოში პირველი ონლაინ პლატფორმა, რომელიც აკავშირებს მომხმარებლებსა და მიმწოდებლებს მთელი საქართველოს მასშტაბით და პროდუქციის ყიდვა-გაყიდვას საუკეთესო პირობებით და მაქსიმალური კომფორტით უზრუნველყოფს.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane faqsopen fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div id="accordion" class="accordion-style">
                                <h2 class="h1 mb-0 text-secondary Center bold mb-2 font-neue">პროდუქტი</h2>
                                <div class="card mb-3">
                                    <div class="faqsmm">
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <span class="faq-heading font-neue">სათაური</span>
                                            	<span class="faq-text">მოლაინი არის საქართველოში პირველი ონლაინ პლატფორმა, რომელიც აკავშირებს მომხმარებლებსა და მიმწოდებლებს მთელი საქართველოს მასშტაბით და პროდუქციის ყიდვა-გაყიდვას საუკეთესო პირობებით და მაქსიმალური კომფორტით უზრუნველყოფს.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="faqsmm">
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <span class="faq-heading font-neue">სათაური</span>
                                            	<span class="faq-text">მოლაინი არის საქართველოში პირველი ონლაინ პლატფორმა, რომელიც აკავშირებს მომხმარებლებსა და მიმწოდებლებს მთელი საქართველოს მასშტაბით და პროდუქციის ყიდვა-გაყიდვას საუკეთესო პირობებით და მაქსიმალური კომფორტით უზრუნველყოფს.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane faqsopen fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div id="accordion" class="accordion-style">
                                <h2 class="h1 mb-0 text-secondary Center bold mb-2 font-neue">ყიდვა</h2>
                                <div class="card mb-3">
                                    <div class="faqsmm">
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <span class="faq-heading font-neue">სათაური</span>
                                            	<span class="faq-text">მოლაინი არის საქართველოში პირველი ონლაინ პლატფორმა, რომელიც აკავშირებს მომხმარებლებსა და მიმწოდებლებს მთელი საქართველოს მასშტაბით და პროდუქციის ყიდვა-გაყიდვას საუკეთესო პირობებით და მაქსიმალური კომფორტით უზრუნველყოფს.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="faqsmm">
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <span class="faq-heading font-neue">სათაური</span>
                                            	<span class="faq-text">მოლაინი არის საქართველოში პირველი ონლაინ პლატფორმა, რომელიც აკავშირებს მომხმარებლებსა და მიმწოდებლებს მთელი საქართველოს მასშტაბით და პროდუქციის ყიდვა-გაყიდვას საუკეთესო პირობებით და მაქსიმალური კომფორტით უზრუნველყოფს.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="faqsmm">
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                            <div class="card-body">
                                            	<span class="faq-heading font-neue">სათაური</span>
                                            	<span class="faq-text">მოლაინი არის საქართველოში პირველი ონლაინ პლატფორმა, რომელიც აკავშირებს მომხმარებლებსა და მიმწოდებლებს მთელი საქართველოს მასშტაბით და პროდუქციის ყიდვა-გაყიდვას საუკეთესო პირობებით და მაქსიმალური კომფორტით უზრუნველყოფს.</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane faqsopen fade" id="pills-deliver" role="tabpanel" aria-labelledby="pills-deliver-tab">
                            <div id="accordion" class="accordion-style">
                                <h2 class="h1 mb-0 text-secondary Center bold mb-2 font-neue">მიწოდება</h2>
                                <div class="card mb-3">
                                    <div class="faqsmm">
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <span class="faq-heading font-neue">სათაური</span>
                                            	<span class="faq-text">მოლაინი არის საქართველოში პირველი ონლაინ პლატფორმა, რომელიც აკავშირებს მომხმარებლებსა და მიმწოდებლებს მთელი საქართველოს მასშტაბით და პროდუქციის ყიდვა-გაყიდვას საუკეთესო პირობებით და მაქსიმალური კომფორტით უზრუნველყოფს.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane faqsopen fade" id="pills-vendors" role="tabpanel" aria-labelledby="pills-vendors-tab">
                            <div id="accordion" class="accordion-style">
                                <h2 class="h1 mb-0 text-secondary Center bold mb-2 font-neue">ვენდორებისთვის</h2>
                                <div class="card mb-3">
                                    <div class="faqsmm">
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <span class="faq-heading font-neue">სათაური</span>
                                            	<span class="faq-text">მოლაინი არის საქართველოში პირველი ონლაინ პლატფორმა, რომელიც აკავშირებს მომხმარებლებსა და მიმწოდებლებს მთელი საქართველოს მასშტაბით და პროდუქციის ყიდვა-გაყიდვას საუკეთესო პირობებით და მაქსიმალური კომფორტით უზრუნველყოფს.</span>
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
@endsection