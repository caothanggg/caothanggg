<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index28:48-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ViettelStore</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/material-design-iconic-font.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="{{asset('public/frontend/css/fontawesome-stars.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/meanmenu.css')}}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/slick.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/jquery-ui.min.css')}}">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/venobox.css')}}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/nice-select.css')}}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.css')}}">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/helper.css')}}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}">

        <!-- Modernizr js -->
        <script src="{{asset('public/frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span>S??? ??i???n Tho???i:</span><a href="#"> 0855767797</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li>@if (!isset( Auth::user()->name)) 
                                        <div class="ht-setting-trigger"><span>T??i Kho???n</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    <li><a href="{{route('khachhang.dangnhap')}}">????ng Nh???p</a></li>
                                                    <li><a href="{{route('khachhang.dangky')}}">????ng K??</a></li>
                                                                                                       
                                                </ul>
                                            </div>


                                    @else
                                        <div class="ht-setting-trigger"><span>{{auth::user()->name}}</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    <li><a href="#">Th??ng Tin C?? Nh??n</a></li>
                                                    <a href="{{ route('logout') }}" class="sidebar-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>????ng xu???t</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                        @csrf
                                </form>
                                                                                                       
                                                </ul>
                                            </div>
                                    @endif

                                        </li>
                                        <!-- Setting Area End Here -->
                                        <!-- Begin Currency Area -->
                                        <li>
                                            <span class="currency-selector-wrapper">Ti???n T??? :</span>
                                            <div class="ht-currency-trigger"><span>USD $</span></div>
                                            <div class="currency ht-currency">
                                                <ul class="ht-setting-list">
                                                    <li><a href="#">VN?? ???</a></li>
                                                    <li class="active"><a href="#">USD $</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Currency Area End Here -->
                                        <!-- Begin Language Area -->
                                        <li>
                                            <span class="language-selector-wrapper">Ng??n Ng??? :</span>
                                            <div class="ht-language-trigger"><span>Ti???ng Vi???t</span></div>
                                            <div class="language ht-language">
                                                <ul class="ht-setting-list">
                                                    <li class="active"><a href="#"><img src="images/menu/flag-icon/1.jpg" alt="">English</a></li>
                                                    <li><a href="#"><img src="images/menu/flag-icon/2.jpg" alt="">Ti???ng Vi???t</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Language Area End Here -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="index.html">
                                        <img src="images/menu/logo/1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form action="{{route('frontend.search')}}" class="hm-searchbox">
                                    
                                    <input type="text" name="key" id="search-input" placeholder="Nh???p Kh??a T??m Ki???m C???a B???n ...">
                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                        <li class="hm-wishlist">
                                            <a href="{{route('khachhang.danhsachsanpham')}}">
                                                <span class="cart-item-count wishlist-item-count">0</span>
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </li>
                                        <!-- Header Middle Wishlist Area End Here -->
                                        <!-- Begin Header Mini Cart Area -->
                                        <!-- Gi??? H??ng -->
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">{{ Cart::priceTotal() }}
                                                    <span class="cart-item-count">{{ Cart::count() ?? 0 }}</span>
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                <ul class="minicart-product-list">
                                                   @if(Cart::count()) 
                                                   @foreach(Cart::content() as $value)
                                                   <li>

                                                        <a href="single-product.html" class="minicart-product-image">
                                                            <img src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="single-product.html">{{ $value->name }}</a></h6>
                                                            <span>{{ number_format($value->price) }} x {{ $value->qty }}</span>
                                                        </div>
                                                        <button class="close" title="Remove">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                    
                                                </ul>
                                                <p class="minicart-total">T???ng Ti???n: <span>{{ Cart::priceTotal() }}</span></p>
                                                <div class="minicart-button">
                                                    
                                                    <a href="{{route('frontend.giohang')}}" class="li-button li-button-fullwidth">
                                                        <span>Gi??? H??ng</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Header Mini Cart Area End Here -->
                                    </ul>
                                </div>
                                <!-- Header Middle Right Area End Here -->
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                <div class="hb-menu">
                                    <nav>
                                        <ul>
                                            <li></li><li></li><li></li><li></li>
                                            <li class="dropdown-holder"><a href="{{route('frontend')}}">Trang Ch???</a>
                                                
                                            </li>
                                            <li class="dropdown-holder"><a href="{{route('frontend.baiviet')}}">B??i Vi???t</a>
                                                
                                            </li>
                                            <li class="dropdown-holder"><a href="{{route('frontend.lienhe')}}">Li??n H???</a>
                                                
                                            </li>
                                            <li class="megamenu-static-holder"><a href="{{route('frontend.thuonghieu',['all'])}}">Th????ng Hi???u</a>
                                                <ul class="megamenu hb-megamenu">
                                                    <div class="row row-cols-1 row-cols-md-3 g-1">
                                                @foreach($thuonghieu as $value)
                                                    <div class="col mb-4 ms-2 ps-2">
                                                        <div class="card" style="width: 6rem;">
                                                            <a href="{{route('frontend.thuonghieu',['all' => $value->tenthuonghieu_slug])}}" style="padding: 0;">
                                                                <img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" class="img-fluid" >
                                                            </a>
                                                        </div>
                                                    </div>
                                                    
                                                @endforeach



                                            </div>
                                                </ul>
                                            </li>
                                            <li class="dropdown-holder"><a href="{{route('frontend.loaisanpham',['all'])}}">Lo???i</a>
                                                <ul class="hb-dropdown">
                                                    @foreach($loaisanpham as $value)
                                                    <li class="active"><a href="{{route('frontend.loaisanpham',['all' => $value->tenloai_slug])}}">{{$value->tenloai}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                            <li class="dropdown-holder"><a href="{{route('frontend.ram',['all'])}}">Ram</a>
                                                <ul class="hb-dropdown">
                                                    @foreach($ram as $value)
                                                    <li class="active"><a href="{{route('frontend.ram',['all' => $value->tenram_slug])}}">{{$value->tenram}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                            <li class="dropdown-holder"><a href="{{route('frontend.bonhotrong',['all'])}}">B??? Nh??? Trong</a>
                                                <ul class="hb-dropdown">
                                                    @foreach($bonhotrong as $value)
                                                    <li class="active"><a href="{{route('frontend.bonhotrong',['all' => $value->tenbonhotrong_slug])}}">{{$value->tenbonhotrong}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                            <li class="dropdown-holder"><a href="{{route('frontend.thietke',['all'])}}">Thi???t K???</a>
                                                <ul class="hb-dropdown">
                                                    @foreach($thietke as $value)
                                                    <li class="active"><a href="{{route('frontend.thietke',['all' => $value->tenthietke_slug])}}">{{$value->tenthietke}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            <!-- Header Area End Here -->
            <!-- Begin Slider With Banner Area -->
            @yield('content')
            
            <div class="footer">
                <!-- Begin Footer Static Top Area -->
                <div class="footer-static-top">
                    <div class="container">
                        <!-- Begin Footer Shipping Area -->
                        <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                            <div class="row">
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('public/frontend/images/shipping-icon/1.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Giao H??ng Mi???n Ph??</h2>
                                            <p>V?? tr??? l???i mi???n ph??. Xem thanh to??n ????? bi???t ng??y giao h??ng.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('public/frontend/images/shipping-icon/2.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Thanh To??n An To??n</h2>
                                            <p>Thanh to??n b???ng c??c ph????ng th???c thanh to??n an to??n v?? ph??? bi???n nh???t th??? gi???i.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('public/frontend/images/shipping-icon/3.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Mua S???m V???i S??? B?? M???t</h2>
                                            <p>B???o v??? ng?????i mua c???a ch??ng t??i bao g???m vi???c mua h??ng c???a b???n t??? khi nh???p chu???t ?????n khi giao h??ng.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="{{asset('public/frontend/images/shipping-icon/4.png')}}" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>24/7 Trung T??m Tr??? Gi??p</h2>
                                            <p>C?? m???t c??u h???i? G???i cho Chuy??n gia ho???c tr?? chuy???n tr???c tuy???n.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                            </div>
                        </div>
                        <!-- Footer Shipping Area End Here -->
                    </div>
                </div>
                <!-- Footer Static Top Area End Here -->
                <!-- Begin Footer Static Middle Area -->
                <div class="footer-static-middle">
                    <div class="container">
                        <div class="footer-logo-wrap pt-50 pb-35">
                            <div class="row">
                                <!-- Begin Footer Logo Area -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-logo">
                                        <img src="{{asset('public/frontend/images/menu/logo/1.jpg" alt="Footer Logo')}}">
                                        <p class="info">
                                           ?? 2018 C??ng ty TNHH Nh?? n?????c M???t th??nh vi??n Th????ng m???i v?? Xu???t nh???p kh???u Viettel. ????ng k?? doanh nghi???p s??? 0104831030, do S??? K??? ho???ch v?? ?????u t?? H?? N???i c???p l???n ?????u ng??y 25/01/2006, thay ?????i l???n th??? 38 ng??y 01/07/2019.
?????a ch???: S??? 01, Ph??? Giang V??n Minh, ph?????ng Kim M??, qu???n Ba ????nh, Th??nh ph??? H?? N???i. Ch???u tr??ch nhi???m n???i dung: Cao V??n ?????c Th???ng.
                
                                        </p>
                                    </div>
                                    <ul class="des">
                                        <li>
                                            <span>?????a Ch???: </span>
                                            60 ??. Nguy???n Th??i H???c, M??? B??nh 1, Th??nh ph??? Long Xuy??n, An Giang 880000
                                        </li>
                                        <li>
                                            <span>S??? ??i???n Tho???i: </span>
                                            <a href="#">(+84) 855 767 797</a>
                                        </li>
                                        <li>
                                            <span>Email: </span>
                                            <a href="mailto://cvdthang_19pm@student.agu.edu.vn">caothangttttag@gmail.com</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Footer Logo Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Gi???i Thi???u</h3>
                                        <ul>
                                            <li><a href="#">Quy ch??? ho???t ?????ng website</a></li>
                                            <li><a href="#">Si??u th??? g???n nh???t (341 shop)</a></li>
                                            <li><a href="#">Chuy??n trang tuy???n d???ng</a></li>
                                            <li><a href="#">T??m trung t??m b???o h??nh</a></li>
                                            <li><a href="#">Tra c???u h??a ????n</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Trung T??m B???o H??nh</h3>
                                        <ul>
                                            <li><a href="mailto://cvdthang_19pm@student.agu.edu.vn">T?? v???n b??n h??ng (8h - 22h)-caothang1332@gmail.com</a></li>
                                            <li><a href="mailto://cvdthang_19pm@student.agu.edu.vn">Ch??nh s??ch b???o h??nh-cvdthang_19pm@student.agu.edu.vn</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-4">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Theo D??i</h3>
                                        <ul class="social-link">
                                            <li class="twitter">
                                                <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                    <i class="fab fa-twitter-square"></i>
                                                </a>
                                            </li>
                                            <li class="rss">
                                                <a href="https://chat.zalo.me/" data-toggle="tooltip" target="_blank" title="ZALO">
                                                    <i class="fa fa-rss"></i>
                                                </a>
                                            </li>
                                            <li class="google-plus">
                                                <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                    <i class="fab fa-google-plus-g"></i>
                                                </a>
                                            </li>
                                            <li class="facebook">
                                                <a href="https://www.facebook.com/caothangneee/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li class="youtube">
                                                <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a href="https://www.instagram.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Begin Footer Newsletter Area -->
                                    <div class="footer-newsletter">
                                        <h4>????ng k?? nh???n b???n tin</h4>
                                        <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer-subscribe-form validate" target="_blank" novalidate>
                                           <div id="mc_embed_signup_scroll">
                                              <div id="mc-form" class="mc-form subscribe-form form-group" >
                                                <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email" />
                                                <button  class="btn" id="mc-submit">?????t mua</button>
                                              </div>
                                           </div>
                                        </form>
                                    </div>
                                    <!-- Footer Newsletter Area End Here -->
                                </div>
                                <!-- Footer Block Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Middle Area End Here -->
                <!-- Begin Footer Static Bottom Area -->
                <div class="footer-static-bottom pt-55 pb-55">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Footer Links Area -->
                                <div class="footer-links">
                                    <ul>
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart" aria-hidden="true"></i><a href="" target="_blank"> Cao Th???ng</a>
                                    </ul>
                                </div>
                                <!-- Footer Links Area End Here -->
                                <!-- Begin Footer Payment Area -->
                                <div class="copyright text-center">
                                    <a href="#">
                                        <img src="images/payment/1.png" alt="">
                                    </a>
                                </div>
                                <!-- Footer Payment Area End Here -->
                                <!-- Begin Copyright Area -->
                                
                                <!-- Copyright Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Bottom Area End Here -->
            </div>
            <!-- Footer Area End Here -->
            <!-- Begin Quick View | Modal Area -->
            
            <!-- Quick View | Modal Area End Here -->
        </div>
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="{{asset('public/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('public/frontend/js/vendor/popper.min.js')}}"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
        <!-- Ajax Mail js -->
        <script src="{{asset('public/frontend/js/ajax-mail.js')}}"></script>
        <!-- Meanmenu js -->
        <script src="{{asset('public/frontend/js/jquery.meanmenu.min.js')}}"></script>
        <!-- Wow.min js -->
        <script src="{{asset('public/frontend/js/wow.min.js')}}"></script>
        <!-- Slick Carousel js -->
        <script src="{{asset('public/frontend/js/slick.min.js')}}"></script>
        <!-- Owl Carousel-2 js -->
        <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
        <!-- Magnific popup js -->
        <script src="{{asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Isotope js -->
        <script src="{{asset('public/frontend/js/isotope.pkgd.min.js')}}"></script>
        <!-- Imagesloaded js -->
        <script src="{{asset('public/frontend/js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- Mixitup js -->
        <script src="{{asset('public/frontend/js/jquery.mixitup.min.js')}}"></script>
        <!-- Countdown -->
        <script src="{{asset('public/frontend/js/jquery.countdown.min.js')}}"></script>
        <!-- Counterup -->
        <script src="{{asset('public/frontend/js/jquery.counterup.min.js')}}"></script>
        <!-- Waypoints -->
        <script src="{{asset('public/frontend/js/waypoints.min.js')}}"></script>
        <!-- Barrating -->
        <script src="{{asset('public/frontend/js/jquery.barrating.min.js')}}"></script>
        <!-- Jquery-ui -->
        <script src="{{asset('public/frontend/js/jquery-ui.min.js')}}"></script>
        <!-- Venobox -->
        <script src="{{asset('public/frontend/js/venobox.min.js')}}"></script>
        <!-- Nice Select js -->
        <script src="{{asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>
        <!-- ScrollUp js -->
        <script src="{{asset('public/frontend/js/scrollUp.min.js')}}"></script>
        <!-- Main/Activator js -->
        <script src="{{asset('public/frontend/js/main.js')}}"></script>
    </body>

<!-- index30:23-->
</html>