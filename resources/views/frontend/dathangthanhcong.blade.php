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
                              <h2>Đặt hàng thành công</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================ confirmation part start =================-->
      <section class="confirmation_part section_padding">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="confirmation_tittle">
                <h2>Cảm ơn bạn. Đơn đặt hàng của bạn đã được ghi nhận, vui lòng check gmail để xem chi tiết hoặc theo dõi phía dưới</h2>
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="order_details_iner">
                <h3>Chi tiết đặt hàng </h3>
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col" colspan="2">sản phẩm</th>
                      <th scope="col">số lượng</th>
                      <th scope="col">Đơn giá</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cart as $value)
                      <tr>
                        <th colspan="2"><span>{{ $value->name }}</span></th>
                        <th>x {{$value->qty}}</th>
                        <th> <span>{{number_format($value->price)}}</span></th>
                      </tr>
                    @endforeach
                    <tr>
                      <th colspan="3">Tổng tiền phải trả</th>
                      <th> <span>{{ $cartsub }}</span></th>
                    </tr>
                    <tr>
                      <th colspan="3">shipping</th>
                      <th><span>Free ship</span></th>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th scope="col" colspan="2">Tổng số lượng </th>
                      <th scope="col">{{ $cartcount }}</th>

                      <th scope="col">Tổng tiền {{ $cartsub }}</th>
                      
                    </tr>
                   
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--================ confirmation part end =================-->
  </main>
  @endsection