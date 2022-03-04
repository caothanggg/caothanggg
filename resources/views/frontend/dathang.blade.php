@extends('layouts.frontend')
@section('content')

 <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Trang Chủ</a></li>
                            <li class="active">Đặt Hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Checkout Area Strat-->
            <div class="checkout-area pt-60 pb-30">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <form id="checkoutform" class="row contact_form" action="{{ route('frontend.dathang') }}" method="post" novalidate="novalidate" >
              @csrf
                                <div class="checkbox-form">
                                    <h3>Thông Tin Giao Hàng</h3>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Họ Tên <span class="required">*</span></label>
                                                <input type="text" class="form-control @error('nguoidung_id') is-invalid @enderror" name="name" placeholder="Họ và tên *" value="{{ Auth::user()->name ?? '' }}" required />
                                                    @error('nguoidung_id')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Số Điện Thoại Giao Hàng <span class="required">*</span></label>
                                                <input type="text" class="form-control @error('dienthoaigiaohang') is-invalid @enderror" name="dienthoaigiaohang" placeholder="Điện thoại *" required />
                                                  @error('dienthoaigiaohang')
                                                      <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                  @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Địa Chỉ Giao Hàng</label>
                                                <input type="text" class="form-control @error('diachigiaohang') is-invalid @enderror" name="diachigiaohang" placeholder="Địa chỉ giao hàng *" required />
                                                    @error('diachigiaohang')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Email <span class="required">*</span></label>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Địa chỉ Email *" value="{{ Auth::user()->email ?? '' }}" required />
                                                    @error('email')
                                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                                <div class="country-select clearfix">
                                                    <label>Phương Thức Thanh Toán <span class="required">*</span></label>
                                                    <select class="nice-select wide @error('phuongthucthanhtoan_id') is-invalid @enderror" id="phuongthucthanhtoan_id" name="phuongthucthanhtoan_id" required>
                                                      <option value="">-- Chọn --</option>
                                                      @foreach($phuongthucthanhtoan as $value)
                                                        <option value="{{ $value->id }}">{{ $value->tenphuongthucthanhtoan }}</option>
                                                      @endforeach
                                                    </select>
                                                    @error('phuongthucthanhtoan_id')
                                                      <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                                    
                                                </div>
                                            </div>
                                        
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Đơn Hàng Của Tôi</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Tên Sản Phẩm</th>
                                                <th class="cart-product-total">Đơn Giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach(Cart::content() as $value)
                                            <tr class="cart_item">
                                              <td class="cart-product-name"> {{ $value->name }}<strong class="product-quantity"> x  {{ $value->qty }}</strong></td>
                                              <td class="cart-product-total"><span class="amount">{{ number_format($value->price * $value->qty) }}</span></td>  
                                            </tr>
                                            
                                              
                                                
                                            
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Thành Tiền</th>
                                                <td><span class="amount">{{ Cart::subtotal() }}</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng Tiền</th>
                                                <td><strong><span class="amount">{{ Cart::subtotal() }}</span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                          <div class="card">
                                            <div class="card-header" id="#payment-1">
                                              <h5 class="panel-title">
                                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Phí vận chuyển
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>Miễn Phí Vận Chuyển</p>
                                              </div>
                                            </div>
                                          </div>
                                          
                                          
                                        </div>
                                        <div class="order-button-payment">
                                          
                                            <input value="Place order" href="{{ route('frontend.dathang') }}"
                    onclick="event.preventDefault();document.getElementById('checkoutform').submit();" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           



@endsection