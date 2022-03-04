<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị | ViettelStore</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('public/assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('public/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('public/assets/images/favicon.svg')}}" type="image/x-icon">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
@if(Auth::check())
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('public/assets/img/logo/logo.png')}}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">

                    <ul class="menu">

                                                <li class="sidebar-item active ">
                            <a href="{{route('admin.home')}}" class='sidebar-link'>
                               <i class="fas fa-home"></i>
                                <span>Trang Chủ </span>
                            </a>
                        </li>
                        @if(Auth::user()->role == 'admin')
                         <li class="sidebar-item ">
                            <a href="{{route('admin.nguoidung')}}" class='sidebar-link'>
                                <i class="fas fa-user-cog"></i>
                                <span>Thông Tin Người Dùng</span>
                            </a>
                        </li>   
                        
                        <li class="sidebar-title">Danh Mục</li>
                        <li class="sidebar-item ">
                            <a href="{{route('admin.thuonghieu')}}" class='sidebar-link'>
                                <i class="fab fa-apple"></i>
                                <span>Thương Hiệu</span>
                            </a>
                        </li>

                                                <li class="sidebar-item ">
                            <a href="{{ route('admin.loaisanpham') }}" class='sidebar-link'>
                                <i class="fas fa-tablet-alt"></i>
                                <span>Loại Điện Thoại</span>
                            </a>
                        </li>

                                                <li class="sidebar-item ">
                            <a href="{{route('admin.ram')}}" class='sidebar-link'>
                                <i class="fas fa-memory"></i>
                                <span>Ram</span>
                            </a>
                        </li>

                                                <li class="sidebar-item ">
                            <a href="{{route('admin.bonhotrong')}}" class='sidebar-link'>
                                <i class="fas fa-sd-card"></i>
                                <span>Bộ Nhớ Trong</span>
                            </a>
                        </li>

                                                <li class="sidebar-item ">
                            <a href="{{route('admin.thietke')}}" class='sidebar-link'>
                                <i class="fas fa-pencil-alt"></i>
                                <span>Thiết Kế</span>
                            </a>
                        </li>

                                                <li class="sidebar-item ">
                            <a href="{{route('admin.tinhtrang')}}" class='sidebar-link'>
                                <i class="fas fa-bolt"></i>
                                <span>Tình Trạng</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{route('admin.phuongthucthanhtoan')}}" class='sidebar-link'>
                                <i class="fab fa-apple-pay"></i>
                                <span>Phương Thức Thanh Toán</span>
                            </a>
                        </li>
                        @endif

                                                
                        <li class="sidebar-title">Quản Lý</li>

                                                <li class="sidebar-item ">
                            <a href="{{route('admin.binhluan')}}" class='sidebar-link'>
                                <i class="far fa-comment-dots"></i>
                                <span>Bình Luận</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{route('admin.baiviet')}}" class='sidebar-link'>
                                <i class="far fa-address-card"></i>
                                <span>Bài Viết</span>
                            </a>
                        </li>

                                                <li class="sidebar-item ">
                            <a href="{{route('admin.donhang')}}" class='sidebar-link'>
                                <i class="fas fa-shopping-cart"></i>
                                <span>Đơn Hàng</span>
                            </a>
                        </li>


                                                <li class="sidebar-item ">
                            <a href="{{route('admin.sanpham')}}" class='sidebar-link'>
                               <i class="fab fa-android"></i>
                                <span>Sản Phẩm</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('logout') }}" class="sidebar-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Đăng xuất</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                        @csrf
                                </form>
                        </li>

                        
                        


                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="fas fa-align-justify"></i>
                </a>
            </header>

            
            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; Bởi Cao Thắng</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ViettelStore.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @else
        @yield('content')
@endif

    <script src="{{asset('public/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('public/assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('public/assets/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('public/assets/js/main.js')}}"></script>
    @yield('javascript')
</body>

</html>