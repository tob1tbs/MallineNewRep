(function ($) {
    ("use strict");
    // Page loading
    $(window).on("load", function () {
        $("#preloader-active").delay(450).fadeOut("slow");
        $("body").delay(450).css({
            overflow: "visible"
        });
        $("#onloadModal").modal("show");
    });
    /*-----------------
        Menu Stick
    -----------------*/
    var header = $(".sticky-bar");
    var win = $(window);
    win.on("scroll", function () {
        var scroll = win.scrollTop();
        if (scroll < 200) {
            header.removeClass("stick");
            $(".header-style-2 .categories-dropdown-active-large").removeClass("open");
            $(".header-style-2 .categories-button-active").removeClass("open");
        } else {
            header.addClass("stick");
        }
    });

    //Ajaxsearch
    $("#ajaxsearch").click(function(){
        $("#ajaxsearchcontent").show();
      });
    $(document).mouseup(function(e) 
    {
        var container = $("#ajaxsearchcontent");
    
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            container.hide();
        }
    });

    /*------ ScrollUp -------- */
    $.scrollUp({
        scrollText: '<i class="fi-rs-arrow-small-up"></i>',
        easingType: "linear",
        scrollSpeed: 900,
        animation: "fade"
    });
    
    //sidebar sticky
    if ($(".sticky-sidebar").length) {
        $(".sticky-sidebar").theiaStickySidebar();
    }

    /*------ Timer Countdown ----*/

    $("[data-countdown]").each(function () {
        var $this = $(this),
            finalDate = $(this).data("countdown");
        $this.countdown(finalDate, function (event) {
            $(this).html(event.strftime("" + '<span class="countdown-section"><span class="countdown-amount hover-up">%D</span><span class="countdown-period"> áƒ“áƒ¦áƒ” </span></span>' + '<span class="countdown-section"><span class="countdown-amount hover-up">%H</span><span class="countdown-period"> áƒ¡áƒáƒáƒ—áƒ˜ </span></span>' + '<span class="countdown-section"><span class="countdown-amount hover-up">%M</span><span class="countdown-period"> áƒ¬áƒ£áƒ—áƒ˜ </span></span>'));
        });
    });


    /*-------------------------------
        Categories
    -----------------------------------*/

    $(".categoriess").click(function(){       
        var id = $(this).data("id");
        $('.sub-category').hide();
        $('.category-item-'+id).show();
        console.log(id)
    });


    //Burger icons
    $("#catclose").click(function(){       
        $('#exampleModal').hide();
        $('body').removeClass("modal-open");
    });
    $("#catclose1").click(function(){       
        $('#exampleModal').hide();
        $('body').removeClass("modal-open");
    });
    $("#loginclose").click(function(){       
        $('#exampleModalCenter').hide();
        $('body').removeClass("modal-open");
    });
    /*-------------------------------
        Sort by active
    -----------------------------------*/
    if ($(".sort-by-product-area").length) {
        var $body = $("body"),
            $cartWrap = $(".sort-by-product-area"),
            $cartContent = $cartWrap.find(".sort-by-dropdown");
        $cartWrap.on("click", ".sort-by-product-wrap", function (e) {
            e.preventDefault();
            var $this = $(this);
            if (!$this.parent().hasClass("show")) {
                $this.siblings(".sort-by-dropdown").addClass("show").parent().addClass("show");
            } else {
                $this.siblings(".sort-by-dropdown").removeClass("show").parent().removeClass("show");
            }
        });
    }
    $(document).click(function (e) {
        e.stopPropagation();
        var container = $(".sort-by-product-area");
    
        //check if the clicked area is dropDown or not
        if (container.has(e.target).length === 0) {
            $('.sort-by-dropdown ').hide();
        }
        else {
            $('.sort-by-dropdown ').show();
        }
    })
    /*-----------------------
        Shop filter active 
    ------------------------- */
    $(".-toogle").on("click", function (e) {
        e.preventDefault();
        $(".shop-product-fillter-header").slideToggle();
    });
    var shopFiltericon = $(".-toogle");
    shopFiltericon.on("click", function () {
        $(".-toogle").toggleClass("active");
    });

    /*---------------------
        Select active
    --------------------- */
    $(".select-active").select2();

    /*--- Checkout toggle function ----*/
    $(".checkout-click1").on("click", function (e) {
        e.preventDefault();
        $(".checkout-login-info").slideToggle(900);
    });

    /*--- Checkout toggle function ----*/
    $(".checkout-click3").on("click", function (e) {
        e.preventDefault();
        $(".checkout-login-info3").slideToggle(1000);
    });

    /*-------------------------
        Create an account toggle
    --------------------------*/
    $(".checkout-toggle2").on("click", function () {
        $(".open-toggle2").slideToggle(1000);
    });

    $(".checkout-toggle").on("click", function () {
        $(".open-toggle").slideToggle(1000);
    });

    /*-------------------------------------
        Checkout paymentMethod function
    ---------------------------------------*/
    paymentMethodChanged();
    function paymentMethodChanged() {
        var $order_review = $(".payment-method");

        $order_review.on("click", 'input[name="payment_method"]', function () {
            var selectedClass = "payment-selected";
            var parent = $(this).parents(".sin-payment").first();
            parent.addClass(selectedClass).siblings().removeClass(selectedClass);
        });
    }

    /*---- CounterUp ----*/
    $(".count").counterUp({
        delay: 10,
        time: 2000
    });

    // Isotope active
    $(".grid").imagesLoaded(function () {
        // init Isotope
        var $grid = $(".grid").isotope({
            itemSelector: ".grid-item",
            percentPosition: true,
            layoutMode: "masonry",
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: ".grid-item"
            }
        });
    });

    /*====== SidebarSearch ======*/
    function sidebarSearch() {
        var searchTrigger = $(".search-active"),
            endTriggersearch = $(".search-close"),
            container = $(".main-search-active");

        searchTrigger.on("click", function (e) {
            e.preventDefault();
            container.addClass("search-visible");
        });

        endTriggersearch.on("click", function () {
            container.removeClass("search-visible");
        });
    }
    sidebarSearch();

    /*====== Sidebar menu Active ======*/
    function mobileHeaderActive() {
        var navbarTrigger = $(".burger-icon"),
            endTrigger = $(".mobile-menu-close"),
            container = $(".mobile-header-active"),
            wrapper4 = $("body");

        wrapper4.prepend('<div class="body-overlay-1"></div>');

        navbarTrigger.on("click", function (e) {
            e.preventDefault();
            container.addClass("sidebar-visible");
            wrapper4.addClass("mobile-menu-active");
        });

        endTrigger.on("click", function () {
            container.removeClass("sidebar-visible");
            wrapper4.removeClass("mobile-menu-active");
        });

        $(".body-overlay-1").on("click", function () {
            container.removeClass("sidebar-visible");
            wrapper4.removeClass("mobile-menu-active");
        });
    }
    mobileHeaderActive();

    /*---------------------
        Mobile menu active
    ------------------------ */
    var $offCanvasNav = $(".mobile-menu"),
        $offCanvasNavSubMenu = $offCanvasNav.find(".dropdown");

    /*Add Toggle Button With Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="fi-rs-angle-small-down"></i></span>');

    /*Close Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.slideUp();

    /*Category Sub Menu Toggle*/
    $offCanvasNav.on("click", "li a, li .menu-expand", function (e) {
        var $this = $(this);
        if (
            $this
                .parent()
                .attr("class")
                .match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/) &&
            ($this.attr("href") === "#" || $this.hasClass("menu-expand"))
        ) {
            e.preventDefault();
            if ($this.siblings("ul:visible").length) {
                $this.parent("li").removeClass("active");
                $this.siblings("ul").slideUp();
            } else {
                $this.parent("li").addClass("active");
                $this.closest("li").siblings("li").removeClass("active").find("li").removeClass("active");
                $this.closest("li").siblings("li").find("ul:visible").slideUp();
                $this.siblings("ul").slideDown();
            }
        }
    });

    /*--- language currency active ----*/
    $(".mobile-language-active").on("click", function (e) {
        e.preventDefault();
        $(".lang-dropdown-active").slideToggle(900);
    });
    
    /*--- Top icon dropdown ----*/
    $("#account").on("click", function (e) {
        e.preventDefault();
        $("#account-dropdown").slideToggle(0).css("visibility", "visible");
    });

    $(document).mouseup(function(e){
        var container = $("#cart-dropdown");
    
        // If the target of the click isn't the container
        if(!container.is(e.target) && container.has(e.target).length === 0){
            container.hide();
        }
    });
    $(document).mouseup(function(e){
        var container = $("#account-dropdown");
    
        // If the target of the click isn't the container
        if(!container.is(e.target) && container.has(e.target).length === 0){
            container.hide();
        }
    });
   /*--- Checkout radio ----*/
// ---------------------- step 4 - paymenth methods  -----------------------------

$('input[type=radio][name=payment-method]').change(function() {
    console.log($(this).val());

    // card pay > bank
    if($('#card-pay').is(':checked')) {
        $('.card-payment').removeClass('hidden')
    }else {
        $('.card-payment').addClass('hidden')
    }
    // installment pay > bank
    if($('#installment-pay').is(':checked')) {
        $('.installment-payment').removeClass('hidden')
    }else {
        $('.installment-payment').addClass('hidden')
    }

 });

//show/hide filter
$('.accordion').each(function () {
    var $accordian = $(this);
    $accordian.find('.accordion-head').on('click', function () {
        $accordian.find('.accordion-body').slideUp();
        if (!$(this).next().is(':visible')) {
            $(this).removeClass('close').addClass('open');
            $(this).next().slideDown();
        }
    });
});


//Price Slider
const rangeInput = document.querySelectorAll(".range-input input"),
  priceInput = document.querySelectorAll(".price-input input"),
  range = document.querySelector(".slider .progress");
let priceGap = 1000;
priceInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minPrice = parseInt(priceInput[0].value),
      maxPrice = parseInt(priceInput[1].value);

    if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
      if (e.target.className === "input-min") {
        rangeInput[0].value = minPrice;
        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
      } else {
        rangeInput[1].value = maxPrice;
        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
      }
    }
  });
});

rangeInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minVal = parseInt(rangeInput[0].value),
      maxVal = parseInt(rangeInput[1].value);

    if (maxVal - minVal < priceGap) {
      if (e.target.className === "range-min") {
        rangeInput[0].value = maxVal - priceGap;
      } else {
        rangeInput[1].value = minVal + priceGap;
      }
    } else {
      priceInput[0].value = minVal;
      priceInput[1].value = maxVal;
      range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
      range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
    }
  });
});

 //Cookie Js
    if(localStorage.getItem('cookieSeen') != 'shown'){
        $(".cookie-banner").delay(2000).fadeIn();
        localStorage.setItem('cookieSeen','shown')
    }

    $('.close').click(function(e) {
    $('.cookie-banner').fadeOut(); 
    });
    $('.close2').click(function(e) {
        $('.alert').fadeOut(); 
    });

 // submit form  >  if volta instalment is full or not choosen
$('#submit-payment').on('click', function() {

    let isEmpty = false;

    // if isntalment is chosen . check  form
    if( $('#volta-installment').is(':checked') ){
      
        $('.volta-installment__input input').each(function() {
            let element = $(this);
            if (element.val() == "") {
                isEmpty = true;
            }
        });
        // display msg  if inputs are empty
        if( isEmpty ) {
            $('.pls-fill-all').removeClass('hidden');
        }
    }
    // subbmit if instalment is chosen and iputs are filed
    if ( $('#volta-installment').is(':checked') && !isEmpty ) {
        $('#payment-form').submit()
    }
    
    // subbmit if volta instalment is not chosen
    if( !$('#volta-installment').is(':checked')) {
       $('#payment-form').submit()
    }

});
 

    /*--- Mobile demo active ----*/
    var demo = $(".tm-demo-options-wrapper");
    $(".view-demo-btn-active").on("click", function (e) {
        e.preventDefault();
        demo.toggleClass("demo-open");
    });

    /*-----More Menu Open----*/
    $(".more_slide_open").slideUp();
    $(".more_categories").on("click", function () {
        $(this).toggleClass("show");
        $(".more_slide_open").slideToggle();
    });

    //Tabs
    $('#step11').click(function(){
        $('#step33').removeClass('activated_step2');
        $('#step22').removeClass('activated_step2');
        $('#step44').removeClass('activated_step2');
        $('#step11').addClass('activated_step2');
        $("#twentyfive").prop("checked", true);
        $("#fifty").prop("checked", false);
        $("#seventyfive").prop("checked", false);
        $("#onehundred").prop("checked", false);
        $("#step1").show();
        $("#step2").hide();
        $("#step3").hide();
        $("#step4").hide();
    });

    $('#step22').click(function(){
        $('#step11').removeClass('activated_step2');
        $('#step11').removeClass('activated_step');
        $('#step33').removeClass('activated_step2');
        $('#step44').removeClass('activated_step2');
        $('#step22').addClass('activated_step2'); 
        $("#step2").show();
        $("#fifty").prop("checked", true);
        $("#step1").hide();
        $("#step1").hide();
        $("#step3").hide();
        $("#step4").hide();
    });
    $('#step33').click(function(){
        $('#step11').removeClass('activated_step2');
        $('#step11').removeClass('activated_step');
        $('#step22').removeClass('activated_step2');
        $('#step44').removeClass('activated_step2');
        $('#step33').addClass('activated_step2');
        $("#seventyfive").prop("checked", true);
        $("#step3").show();
        $("#step2").hide();
        $("#step1").hide();
        $("#step4").hide();
    });
    $('#step44').click(function(){
        $('#step11').removeClass('activated_step2');
        $('#step11').removeClass('activated_step');
        $('#step22').removeClass('activated_step2');
        $('#step33').removeClass('activated_step2');
        $('#step44').addClass('activated_step2');
        $("#onehundred").prop("checked", true);
        $("#step3").hide();
        $("#step2").hide();
        $("#step1").hide();
        $("#step4").show();
    });
    

    // Install Page steps //
    $('.progress_holder:nth-child(1)').addClass('activated_step');

    // Manage next and previous buttons //
    $(".nextStep").click(function(){
        // button is inside fieldset so set current and next vars //
        current_fs = $(this).parents('fieldset');
        next_fs = $(this).parents('fieldset').next();
        // make sure all fields are filled in //
        var empty = current_fs.find("input.required-field").filter(function() {
            return this.value === "";
        });
        if (empty.length) {
            alert('Please fill in all fields.');
        } else {
        //show the next fieldset
        next_fs.fadeIn(150,'linear').addClass('current');
        //hide the current fieldset with style
        current_fs.fadeOut(0,'linear').removeClass('current');
        // change nav class //
        if ($('fieldset.current').attr('id') == 'step2') {
        $('.progress_holder:nth-child(2)').addClass('activated_step');
        }
        if ($('fieldset.current').attr('id') == 'step3') {
        $('.progress_holder:nth-child(3)').addClass('activated_step');
        }
        if ($('fieldset.current').attr('id') == 'step4') {
        $('.progress_holder:nth-child(4)').addClass('activated_step');
        }
        }
        if ($('fieldset.current').attr('id') == 'step2') {
            $('.progress_holder:nth-child(1)').removeClass('activated_step');
        }
        if ($('fieldset.current').attr('id') == 'step3') {
            $('.progress_holder:nth-child(2)').removeClass('activated_step');
        }
        if ($('fieldset.current').attr('id') == 'step3') {
            $('.progress_holder:nth-child(2)').removeClass('activated_step2');
        }
        if ($('fieldset.current').attr('id') == 'step4') {
            $('.progress_holder:nth-child(3)').removeClass('activated_step');
        }        
    });
    $(".prevStep").click(function(e){
        e.preventDefault();
        current_fs = $(this).parents('fieldset');
        previous_fs = $(this).parents('fieldset').prev();
        //show the previous fieldset
        previous_fs.fadeIn(150,'linear');
        //hide the current fieldset with style
        current_fs.fadeOut(0,'linear');
        if ($('fieldset.current').attr('id') == 'step2') {
            $('.progress_holder:nth-child(1)').addClass('activated_step');
            }
        if ($('fieldset.current').attr('id') == 'step3') {
        $('.progress_holder:nth-child(2)').addClass('activated_step');
        }
        if ($('fieldset.current').attr('id') == 'step4') {
        $('.progress_holder:nth-child(3)').addClass('activated_step');
        }

        if ($(previous_fs).attr('id') == 'step1') {
            $('.progress_holder:nth-child(2)').removeClass('activated_step');
        }
        if ($(previous_fs).attr('id') == 'step2') {
            $('.progress_holder:nth-child(3)').removeClass('activated_step');
        }
        if ($(previous_fs).attr('id') == 'step3') {
            $('.progress_holder:nth-child(2)').removeClass('activated_step2');
        }
        if ($(previous_fs).attr('id') == 'step2') {
            $('.progress_holder:nth-child(2)').addClass('activated_step');
        }
        if ($(previous_fs).attr('id') == 'step1') {
            $('.progress_holder:nth-child(1)').addClass('activated_step');
        }
        if ($(previous_fs).attr('id') == 'step1') {
            $('.progress_holder:nth-child(3)').removeClass('activated_step');
        }
        if ($(previous_fs).attr('id') == 'step3') {
            $('.progress_holder:nth-child(4)').removeClass('activated_step');
        }
    });

    /*-----Restore Page----*/

    let in1 = document.getElementById('otc-1'),
    ins = document.querySelectorAll('input[type="number"]'),
	 splitNumber = function(e) {
		let data = e.data || e.target.value; 
		if ( ! data ) return; 
		if ( data.length === 1 ) return; 
		
		popuNext(e.target, data);
	},
	popuNext = function(el, data) {
		el.value = data[0];
		data = data.substring(1); 
		if ( el.nextElementSibling && data.length ) {
			popuNext(el.nextElementSibling, data);
		}
	};

    ins.forEach(function(input) {
	input.addEventListener('keyup', function(e){
		if (e.keyCode === 16 || e.keyCode == 9 || e.keyCode == 224 || e.keyCode == 18 || e.keyCode == 17) {
			 return;
		}
		
		if ( (e.keyCode === 8 || e.keyCode === 37) && this.previousElementSibling && this.previousElementSibling.tagName === "INPUT" ) {
			this.previousElementSibling.select();
		} else if (e.keyCode !== 8 && this.nextElementSibling) {
			this.nextElementSibling.select();
		}
		
		if ( e.target.value.length > 1 ) {
			splitNumber(e);
		}
	});
	
	input.addEventListener('focus', function(e) {
		if ( this === in1 ) return;
		
		if ( in1.value == '' ) {
			in1.focus();
		}

		if ( this.previousElementSibling.value == '' ) {
			this.previousElementSibling.focus();
		}
	});
});

})(jQuery);