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
                            <h2>Khách hàng</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="confirmation_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-lx-4">
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
            
                <div class="col-lg-9 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Chào Mừng {{Auth::user()->name}}.</h4> 
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Điện thoại giao hàng</th>
                                    <th scope="col">Địa chỉ giao hang</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Tình Trạng</th>
                                    <th scope="col">Chi tiết</th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($donhang as $value)
                                <tr>
                                    <th>{{ $value->dienthoaigiaohang }}</th>
                                    <th>{{ $value->diachigiaohang }}</th>
                                    <th>{{ $value->created_at }}</th>
                                    <th>{{ $value->TinhTrang->tinhtrang }}</th>
                                    <th>
                                        <a href="{{ route('khachhang.donhang.chitiet',['id' => $value->id])}}"><i class="fas fa-info-circle"></i></a>
                                    </th>
                                    <th>
                                        @if($value->tinhtrang_id === 1 or $value->tinhtrang_id === 2 )
                                            <a href="{{ route('khachhang.donhang.huy',['id' => $value->id])}}" class="genric-btn danger radius" >Hủy</a>
                                        @elseif($value->tinhtrang_id === 3)
                                            <a href=""class="genric-btn btn btn-danger disabled radius" >Đã hủy</a>
                                        @else
                                            <a href="{{ route('khachhang.donhang.huy',['id' => $value->id])}}" class="genric-btn btn btn-info disabled radius">Thành công</a>
                                        @endif

                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
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

@endsection