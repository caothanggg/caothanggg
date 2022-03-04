<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ViettelStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/pages/auth.css')}}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{asset('public/assets/img/logo/1.png')}}"   alt="Logo"></a>
                    </div>
                    <h3>Đăng Nhập</h3>
                    
                     @if(session('warning'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <span class="font-weight-bold text-danger">
                                    <i class="fas fa-exclamation-triangle"></i> {{ session('warning') }}
                                </span>
                            </div>
                            @endif
                            <form method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <label class="form-label" for="email">Tài khoản</label>
                                    <input type="text" class="form-control form-control-xl{{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Email hoặc Tên đăng nhập"  />

                                    @if ($errors->has('email') || $errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Mật khẩu</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                
                                <div class="mb-3 form-check">
                                    <input class="form-check-input" type="checkbox"
                                            id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="remember">Duy trì đăng nhập</label>
                                </div>
                                <div class="mb-0">
                                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5"></i> Đăng nhập</button>
                                    
                                </div>
                            </form>
                            <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Không Có Tài Khoản? <a href="{{ route('register') }}"
                                class="font-bold">Đăng
                                Ký</a>.</p>
                                @if (Route::has('password.request'))
                        <p><a class="font-bold" href="{{ route('password.request') }}">Quên Mật Khẩu?</a>.</p>
                        @endif
                    </div>

                    
                    
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>