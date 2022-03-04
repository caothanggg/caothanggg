@extends('layouts.frontend')
@section('content')
<main>
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Giỏ hàng </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="confirmation_part section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="confirmation_tittle">
                        <h2>Chưa có sản phẩm trong giỏ hàng.</h2>                    
                        <a href="{{route('frontend')}}" class="genric-btn success medium circle">Tiếp tục mua hàng</a >

                    </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-center mt-4">
                            <img src="{{ asset('public/assets/img/cart.png')}}"  width="400" alt="">
                        </div>
                    </div>
                </div>
            </div>
    </section>  
</main>
@endsection