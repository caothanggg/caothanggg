@extends('layouts.frontend')
@section('content')
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Thông tin khách hàng </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="confirmation_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Menu</h4>
                        <ul class="list-group">
                            <li  style="padding-left: 5%;"><a href="{{ route('khachhang') }}" class="genric-btn info radius" style="width: 171px"> Trang chủ </a></li>
                            <li  style="padding-left: 5%;"><a href="{{ route('khachhang.donhang') }}" class="genric-btn info radius" style="width: 171px">Đơn hàng của tôi</a></li>
                            <li  style="padding-left: 5%;"><a href="{{ route('khachhang.hoso') }}" class="genric-btn info radius" > Thông tin cá nhân</a></li>
                            <li  style="padding-left: 5%;">
                                <a href="{{ route('logout') }}" class="genric-btn info radius" style="width: 171px" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Đăng xuất   
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                        @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-lx-4">
                    <div class="container ">
                        <div class="single_confirmation_details">

                            <h3 class="text-heading">chào mừng {{Auth::user()->name}}. </h3>
                            <div class="whole-wrap">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8">
                                        <h4 class="mb-30">Thông tin cá nhân</h4>
                                        <form action="{{ route('khachhang.hoso') }}" method="post">
                                        @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="name">Họ và tên</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ Auth::user()->name}}" required />
                                                @error('name')
                                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="email">Địa chỉ email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ Auth::user()->email }}" required />
                                                @error('email')
                                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                @enderror
                                            </div> 

                                            <div class="mb-3 form-check">
                                                <input class="form-check-input" type="checkbox" id="change_password_checkbox" name="change_password_checkbox" />
                                                <label class="form-check-label" for="change_password_checkbox">Đổi mật khẩu</label>
                                            </div>

                                            <div id="change_password_group">
                                                <div class="mb-3">
                                                    <label class="form-label" for="password">Mật khẩu mới</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" />
                                                    @error('password')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="password_confirmation">Xác nhận mật khẩu mới</label>
                                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" />
                                                    @error('password_confirmation')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <button type="submit" class="genric-btn info radius"> Cập nhật thông tin</button>			       
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
</main>

<style>
   

    .fa-info-circle:before {
        color: black;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(document).ready(function() {
        $("#change_password_group").hide();
        $("#change_password_checkbox").change(function() {
            if($(this).is(":checked"))
            {
                $("#change_password_group").show();
                $("#change_password_group :input").attr("required", "required");
            }
            else
            {
                $("#change_password_group").hide();
                $("#change_password_group :input").removeAttr("required");
            }
        });
    });
</script>
@endsection