@extends('layouts.frontend')
@section('content')
<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{route('frontend')}}">Trang Chủ</a></li>
                            <li class="active">Chi tiết bài viết </li>
                        </ul>
                    </div>
                </div>
            </div>
          
            <div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Blog Sidebar Area -->
                        
                        <!-- Li's Blog Sidebar Area End Here -->
                        <!-- Begin Li's Main Content Area -->
                        <div class="col-lg-9 order-lg-2 order-1">
                            <div class="row li-main-content">
                                <div class="col-lg-12">
                                    <div class="li-blog-single-item pb-30">
                                        <div class="li-blog-banner">
                                            <a href="blog-details.html"><img class="img-full" src="images/blog-banner/bg-banner.jpg" alt=""></a>
                                        </div>
                                        <div class="li-blog-content">
                                            <div class="li-blog-details">
                                                <h3 class="li-blog-heading pt-25"><a href="#">{{$baiviet->tieude}}</a></h3>
                                                <div class="li-blog-meta">
                                                    <a class="author" href="#"><i class="fa fa-user"></i>{{$baiviet->user->name}}</a>
                                                    <a class="comment" href="#"><i class="fa fa-comment-o"></i> {{$baiviet->luotxem}} Lượt xem</a>
                                                    <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{$baiviet->created_at->format('d/m/Y')}}</a>
                                                </div>
                                                <p>{!!html_entity_decode($baiviet->noidung)!!}</p>
                                               
                                                
                                                
                                                <div class="li-blog-sharing text-center pt-30">
                                                    <h4>share this post:</h4>
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Begin Li's Blog Comment Section -->
                                    <div class="li-comment-section">
                                        <h3>{{ $binhluan->count()}} Bình luận</h3>

                                        <ul>
                                            @foreach($binhluan as $value)
                                            <li>
                                                <div class="author-avatar pt-15">
                                                    <img src="{{asset('public/image/noimage.png')}}" alt="User">
                                                </div>
                                                <div class="comment-body pl-15">
                                                        <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                                    <h5 class="comment-author pt-15">{{$value->User->name}}</h5>
                                                    <div class="comment-post-date">
                                                        {{$value->created_at->format('d/m/Y H:i:s')}}
                                                    </div>
                                                    <p>{{$value->noidung}}</p>
                                                </div>
                                            </li>
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                    <!-- Li's Blog Comment Section End Here -->
                                    <!-- Begin Blog comment Box Area -->
                                    @if($baiviet->binhluan == 1)
                                    <div class="li-blog-comment-wrapper">
                                        
                                        <h3>Để lại bình luận</h3>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <form  action="{{route('frontend.binhluan',['tieude_slug' => $baiviet->tieude_slug])}}" method="post" id="commentForm">
                                            @csrf
                                            <div class="comment-post-box">
                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <label>Nội dung</label>
                                                        <textarea  class="form-control w-100 @error('noidung') is-invalid @enderror" name="noidung" id="noidung" cols="30" rows="9"
                                                         placeholder="Nội dung "></textarea>
                                                    </div>
                                                    @error('noidung')
                                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                                    
                                                    @if(Auth::user() == null)
                            <div class="form-group">
                                <a href="{{route('khachhang.dangnhap')}}" class="button button-contactForm btn_1 boxed-btn">đăng nhập để bình luận  </a>
                            </div>
                                 @else
                            <div class="col-lg-12">
                                                        <div class="coment-btn pt-30 pb-sm-30 pb-xs-30 f-left">
                                                            <input class="li-btn-2" type="submit" name="submit" value="post comment">
                                                        </div>
                                                    </div>
                                     @endif
                                              </div>
                                    @endif

                                                </div>
                                            </div>
                                        </form>
                                        
                                    <!-- Blog comment Box Area End Here -->
                                </div>
                            </div>
                        </div>
                        <!-- Li's Main Content Area End Here -->
                    </div>
                </div>
            </div>
          


@endsection