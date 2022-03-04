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
              <div class="single_confirmation_details">
                <h4>Chào Mừng {{Auth::user()->name}}.</h4>   
              </div>
            </div>
          </div>
         
        </div>
      </section>	
	</main>
  

@endsection