@extends('layout.layout')

@section('content')
<main class="main pages">
<div class="page-content pt-80 pb-80">
	<div class="container">
	    <div class="row">
	        <div class="col-xl-12">
	            <div class="row">
	                <div class="col-xl-12 col-lg-12 m-auto">
	                    <div class="product-detail accordion-detail">
	                    	<form id="setup_form">
		                    	<div id="multi_step_form">
		                    		<div class="container">
	                                    <div id="multistep_nav">
	                                        <div class="progress_holder">
	                                            <span>01</span> თქვენი პირველი მომხმარებელი
	                                        </div>
	                                        <div class="progress_holder">
	                                            <span>02</span> ძირითადი პარამეტრები
	                                        </div>
	                                        <div class="progress_holder">
	                                            <span>03</span> საკონტაქტო ინფორმაცია
	                                        </div>
	                                        <div class="progress_holder">
	                                            <span>04</span> ლოგო
	                                        </div>
	                                    </div>
	                                    <fieldset class="step" id="step1">
									        <div class="col-xl-7 m-auto">
									        	<div class="row">
									        		<div class="col-6">
		                                                <div class="form-group">
		                                                    <input type="text" name="admin_name" id="admin_name" placeholder="სახელი">
		                                                </div>
	                                                </div>
									        		<div class="col-6">
		                                                <div class="form-group">
		                                                    <input type="text" name="admin_lastname" id="admin_lastname" placeholder="გვარი">
		                                                </div>
	                                                </div>
	                                                <div class="col-6">
		                                                <div class="form-group">
		                                                    <input type="text" name="admin_personal_id" id="admin_personal_id" placeholder="პირადი ნომერი">
		                                                </div>
	                                                </div>
									        		<div class="col-6">
		                                                <div class="form-group">
		                                                    <input type="text" name="admin_email" id="admin_email" placeholder="ელ-ფოსტა">
		                                                </div>
	                                                </div>
									        		<div class="col-6">
		                                                <div class="form-group">
		                                                    <input type="text" name="admin_phone" id="admin_phone" placeholder="ტელეფონის ნომერი">
		                                                </div>
	                                                </div>
	                                                <div class="col-6">
		                                                <div class="form-group">
		                                                    <input type="date" name="admin_bdate" id="admin_bdate">
		                                                </div>
	                                                </div>
									        		<div class="col-6">
		                                                <div class="form-group">
		                                                    <input type="text" name="admin_password" id="admin_password" placeholder="პაროლი">
		                                                </div>
	                                                </div>
	                                                <div class="col-6">
		                                                <div class="form-group">
		                                                    <input type="text" name="admin_cpassword" id="admin_cpassword" placeholder="პაროლის განმეორება">
		                                                </div>
	                                                </div>
	                                            </div>
	                                            <button type="button" class="btn-block nextStep" name="contactinfo">შემდეგი</button>
	                                        </div>
	                                    </fieldset>
	                                    <fieldset class="step" id="step2">
	                                    	<div class="col-xl-7 m-auto">
										        <div class="row">
									        		<div class="col-6">
		                                                <div class="form-group">
		                                                	<label for="">ვებ გვერდის დასახელება (ქართულად)</label>
		                                                    <input type="text" name="name_ge" id="name_ge">
		                                                </div>
	                                                </div>
									        		<div class="col-6">
		                                                <div class="form-group">
		                                                	<label for="">ვებ გვერდის დასახელება (ინგლისურად)</label>
		                                                    <input type="text" name="name_en" id="name_en">
		                                                </div>
	                                                </div>
	                                            </div>
	                                            <button type="button" class="btn-block nextStep" name="contactinfo">შემდეგი</button>
	                                        </div>
	                                    </fieldset>
	                                    <fieldset class="step" id="step3">
									        <div class="col-xl-7 m-auto">
									        	<div class="row">
										        	<div class="form-group col-12">
	                                                    <label for="">ელ-ფოსტა</label>
	                                                    <input class="form-control" id="{{ $info_parameter[0]->key }}" name="{{ $info_parameter[0]->key }}" type="text" value=""/>
	                                                </div>
	                                                <div class="form-group col-12">
	                                                    <label for="">ტელეფონის ნომერი</label>
	                                                    <input class="form-control" id="{{ $info_parameter[1]->key }}" name="{{ $info_parameter[1]->key }}" type="text" value=""/>
	                                                </div>
	                                                <div class="form-group col-12">
	                                                    <label for="">მისამართი</label>
	                                                    <input class="form-control" id="{{ $info_parameter[2]->key }}" name="{{ $info_parameter[2]->key }}" type="text"  value="" />
	                                                </div>
	                                            </div>
	                                            <button type="button" class="btn-block nextStep" name="contactinfo">შემდეგი</button>
									        </div>
	                                    </fieldset>
	                                    <fieldset class="step" id="step4">
									        <div class="col-xl-7 m-auto">
									        	<div class="row">
										        	<div class="form-group col-12">
		                                                <label for="">აირჩიეთ ლოგოს სურათო</label>
		                                                <input class="form-control" name="logotype" type="file"/>
	                                                   	<span class="text-brand" style="font-size: 13px; position: relative; top: 10px;">იმისათვის რომ სურათი კაგად გამოჩნდეს ვებ გვერდზე გთხოვთ ატვირთოთ (275px X 65px) ზომის სურათი</span>
		                                            </div>
	                                    		</div>
	                                    		<button type="button" class="btn-block" type="button" onclick="SaveSetup()">შენახვა</button>
	                                    	</div>
	                                    </fieldset>
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
</main>
<script type="text/javascript">
	function SaveSetup() {
		var form = $('#setup_form')[0];
	    var data = new FormData(form);

	    $.ajax({
	        dataType: 'json',
	        url: "/dashboard/ajax/setup",
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
	        		window.location.href = data['redirect_url'];
	        	} else {
		            toastr.options = {
		              "closeButton": true,
		              "positionClass": "toast-bottom-right",
		            }
		            $(".check-input").removeClass('input-error');
		         	$.each(data['message'], function(key, value) {
		                $('#'+key).addClass('input-error');
		                toastr.warning(value);
		            })
	        	}
	        }
	    });
	}
</script>
@endsection