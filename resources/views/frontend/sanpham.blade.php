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
                                <h2>ViettelStore</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!-- Latest Products Start -->
        <section class="popular-items latest-padding">
            <div class="container">
                <div class="row product-btn justify-content-between mb-40">
                    <form action="{{ route('frontend.sanpham') }}" method="get">
                    @csrf
                        <div class="select-itms">
                            <select name="select1" id="select1" onchange="if(this.value != 0) { this.form.submit(); }">
                                <option value="default" {{ session('select1') == 'default' ? 'selected' : '' }}> Hiện thị mặc định</option>
                                <option value="BUY"{{ session('select1') == 'BUY' ? 'selected' : '' }}>Mua nhiều nhất</option>
                                <option value="NEW"{{ session('select1') == 'NEW' ? 'selected' : '' }}>Hàng mới nhất</option>
                                <option value="ASC"{{ session('select1') == 'ASC' ? 'selected' : '' }}>Giá thấp đến cao</option>
                                <option value="DESC"{{ session('select1') == 'DESC' ? 'selected' : '' }}>Giá cao đến thấp</option>
                            </select>
                        </div>
                    </form>
                    <!-- Grid and List view -->
                    <div class="grid-list-view">
                    </div>
                    <!-- Select items -->
                    <div class="select-this">
                        <form action="#" method="post">
                            @csrf
                                <div class="select-itms">
                                    <select name="select" id="select1" onchange="if(this.value != 0) { this.form.submit(); }">
                                        <option value="default" {{ session('select') == 'default' ? 'selected' : '' }}> Hiện thị mặc định</option>
                                        <option value="12"{{ session('select') == '12' ? 'selected' : '' }}>12 mỗi trang</option>
                                        <option value="15"{{ session('select') == '15' ? 'selected' : '' }}>15 mỗi trang</option>
                                        <option value="18"{{ session('select') == '18' ? 'selected' : '' }}>18 mỗi trang</option>
                                        <option value="21"{{ session('select') == '21' ? 'selected' : '' }}>21 mỗi trang</option>
                                    </select>
                                </div>
                        </form>
                    </div>
                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            @foreach($sanpham as $value)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-popular-items mb-50 text-center">
                                        <div class="popular-img">   
                                            <a href="#">
                                                <img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" alt="" class="img-fluid" />                                          
                                                <div class="img-cap">
                                                    <a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}"><span>Thêm vào giỏ hàng</span></a>
                                                </div>
                                                <div class="favorit-items">
                                                    <span class="flaticon-heart"></span>
                                                </div>
                                            </a> 
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="#">{{ $value->tensanpham }}</a></h3>
                                            <span>{{ number_format($value->dongia) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach                      
                        </div>
                    </div>
                   
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                {{ $sanpham->links() }}
                            </li>
                           
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
       
        <!-- Latest Products End -->
        <!--? Shop Method Start-->
        <div class="shop-method-area">
            <div class="container">
                <div class="method-wrapper">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-package"></i>
                                <h6>Phương thức vận chuyển</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-unlock"></i>
                                <h6>Hệ thống thanh toán an toàn</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div> 
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-reload"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Shop Method End-->
    </main>
    
    
@endsection