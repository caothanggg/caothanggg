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
                            <h2>Đăng nhập</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Mới đến cửa hàng của chúng tôi?</h2>
                            <a href="{{route('khachhang.dangky')}}" class="btn_3">Tạo một tài khoản</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    @if (session('status'))
                        <div id="AlertBox" class="alert alert-success " role="alert">
                            {!! session('status') !!}
                        </div>
                    @endif
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Chào mừng trở lại ! <br/>Hãy đăng nhập ngay bây giờ</h3>
                            <form method="post" action="{{ route('login') }}" >
                                @csrf
                                <div class="login-form">
                                    <h4 class="login-title">Đăng Nhập</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Tài Khoản</label>
                                            <input type="text" class="form-control form-control-xl{{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Email hoặc Tên đăng nhập"  />

                                    @if ($errors->has('email') || $errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}
                                            </strong>
                                        </span>
                                    @endif
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Mật Khẩu</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input class="form-check-input" type="checkbox"
                                            id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="remember">Duy trì đăng nhập</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="{{ route('password.request') }}"> Quên Mật Khẩu?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="register-button mt-0">Đăng Nhập</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="col-md-12 form-group list_none d-flex justify-content-center">
                                <ul class="d-flex justify-content-evenly">
                                    <li class="mr-3"><a href="" class="genric-btn info-border radius"><i class="fab fa-facebook"></i> Facebook</a></li>
                                    <li><a href="#" class="genric-btn info-border radius"><i class="fab fa-google-plus-g"></i>  Google     </a></li>
                                </ul>   
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
</main>

@endsection