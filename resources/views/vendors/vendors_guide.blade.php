@extends('layout.layout')

@section('content')
<main class="main pages">
	<div class="page-content pt-50">
		<div class="container">
			<div class="row">
				<div class="row align-items-center">
					<section class="ps-timeline-sec">
                        <div class="container">
                            <ol class="ps-timeline">
                                <li>
                                    <div class="img-handler-top">
                                        <img src="http://www.physology.co.uk/wp-content/uploads/2016/02/ps-elem_03.png" alt=""/>
                                    </div>
                                    <div class="ps-bot">
                                        <p>Do you have a recent injury or long term pain?
                                            <a href="#0" data-toggle="modal" data-target="#exampleModalCenterFaq">ვიდეოს ნახვა</a>
                                        </p>
                                    </div>
                                    <span class="ps-sp-top">01</span>
                                </li>
                                <li>
                                    <div class="img-handler-bot">
                                        <img src="http://www.physology.co.uk/wp-content/uploads/2016/02/ps-elem_13.png" alt=""/>
                                    </div>
                                    <div class="ps-top">
                                        <p>Have you tried Physiotherapy, Chiropractor or your GP without the pain free results?</p>
                                    </div>
                                    <span class="ps-sp-bot">02</span>
                                </li>
                                <li>
                                    <div class="img-handler-top">
                                        <img src="http://www.physology.co.uk/wp-content/uploads/2016/02/ps-elem_05.png" alt=""/>
                                    </div>
                                    <div class="ps-bot">
                                        <p>Let Physology assess and treat your pain with our trusted revolusionary approach.</p>
                                    </div>
                                    <span class="ps-sp-top">03</span>
                                </li>
                                <li>
                                    <div class="img-handler-bot">
                                        <img src="http://www.physology.co.uk/wp-content/uploads/2016/02/ps-elem_10.png" alt=""/>
                                    </div>
                                    <div class="ps-top">
                                        <p>Join our happy family of pain free clients.</p>
                                    </div>
                                    <span class="ps-sp-bot">04</span>
                                </li>
                            </ol>
                        </div>
                    </section>
				</div>
			</div>
		</div>
	</div>
</main>
<div class="modal fade" id="exampleModalCenterFaq" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterFaqTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLongTitle">ინსტრუქცია #1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="460" height="250" src="https://www.youtube.com/embed/mX0rOs6yoUE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
@endsection