@extends('layout.layout')

@section('content')
<main class="main pages">
    <div class="page-content">
        <div class="container" style="margin-top: 120px; margin-bottom: 120px;">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto mt-50 mb-50">
                    <section class="row align-items-center">
                        <div class="col-lg-4">
                            <img src="{{ asset('assets/imgs/emailsent.gif') }}" alt="" style="width: 100%;" />
                        </div>
                        <div class="col-lg-8">
                            <div class="pl-25">
                                <h3 class="mb-30">პაროლის აღდგენის ბმული <br> გამოგზავნილია ელ.ფოსტაზე</h3>
                                <p class="mb-25">შეამოწმე მეილი, მიჰყევი აღდგენის ბმულს და განახლე პაროლი. <br> თუ ასეთ მეილს ვერ იპოვი, შეამოწმე SPAM საქაღალდე.</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main> 
@endsection

@section('js')

@endsection