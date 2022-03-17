@extends('layouts.frontend')
@section('content')
  <div class="body-wrapper">
            <!-- Begin Header Area -->
            
            <!-- Header Area End Here -->
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{route('frontend')}}">Trang Chủ</a></li>
                            <li class="active">Mua Sắm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Shopping Cart Area Strat-->
            
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove"></th>
                                                <th class="li-product-thumbnail">Hình Ảnh</th>
                                                <th class="cart-product-name">Tên Sản Phẩm</th>
                                                <th class="li-product-price">Giá</th>
                                                <th class="li-product-quantity">Số Lượng</th>
                                                <th class="li-product-subtotal">Thành Tiền</th>
                                                <th class="li-product-subtotal">Xóa</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Cart::content() as $value)
                                            <tr>    
                                                <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                                <td class="li-product-thumbnail"><a href="#"><img src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}"width="150" alt="Li's Product Image"></a></td>
                                                <td class="li-product-name"><a href="#">{{ $value->name }}</a></td>
                                                <td class="li-product-price"><span class="amount">{{ number_format($value->price) }}</span></td>
                                                <td class="quantity">
                                                    
                                        <span class="input-number-increment">
                                            <a  href="{{ route('frontend.giohang.tang', ['row_id' => $value->rowId]) }}">       
                                                <i class="fas fa-plus-circle"></i>
                                            </a>
                                        </span>
                                        <input type="text" name="qty" value="{{ $value->qty }}" class="qty" size="4" />
                                        
                                        <span class="input-number-decrement">                                   
                                            <a  href="{{ route('frontend.giohang.giam', ['row_id' => $value->rowId]) }}"> 
                                                <i class="fas fa-minus"></i>
                                            </a>
                                        </span>
                                   
                                                </td>
                                                <td class="product-subtotal"><span class="amount">{{ number_format($value->price * $value->qty) }}</span></td>
                                                <td>
                                    <a href="{{route('frontend.giohang.xoa',['row_id' => $value->rowId])}}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                            </tr>
                                             @endforeach   
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                                <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                            </div>
                                            <div class="coupon2 cart-page-total">
                                               
                                                <a class="button" name="update_cart" value="Update cart" type="submit" href="{{route('frontend')}}">Tiếp Tục Mua Hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            
                                            <h2>Tạm Tính</h2>
                                            <ul>
                                                <li>Tổng Tiền <span>{{ Cart::subtotal() }}</span></li>
                                            </ul>
                                            <a href="{{route('frontend.dathang')}}">Tiến hành thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
            <!-- Begin Footer Area -->
           
                <!-- Footer Static Middle Area End Here -->
                <!-- Begin Footer Static Bottom Area -->
               
                <!-- Footer Static Bottom Area End Here -->
            </div>
            <!-- Footer Area End Here -->
        </div>
        
@endsection