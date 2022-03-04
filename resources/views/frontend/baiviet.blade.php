@extends('layouts.frontend')
@section('content')
 <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{route('frontend')}}">Trang Chủ</a></li>
                            <li class="active">Bài Viết</li>
                        </ul>
                    </div>
                </div>
            </div>
           
            <div class="li-main-blog-page pt-60 pb-55">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Main Content Area -->
                        <div class="col-lg-12">
                            <div class="row li-main-content">
                                @foreach($baiviet as $value)
                                <div class="col-lg-6 col-md-6">
                                    <div class="li-blog-single-item pb-25">
                                        <div class="li-blog-banner">
                                            <a href="blog-details-left-sidebar.html"><img class="img-full" src="images/blog-banner/2.jpg" alt=""></a>
                                        </div>
                                        <div class="li-blog-content">
                                            <div class="li-blog-details">
                                                <h3 class="li-blog-heading pt-25"><a href="blog-details-left-sidebar.html">{{$value->tieude}}</a></h3>
                                                <div class="li-blog-meta">
                                                    <a class="author" href="#"><i class="fa fa-user"></i>{{$value->User->name}}</a>
                                                    <a class="comment" href="#"><i class="fa fa-comment-o"></i> {{$value->binhluan}} Bình luận</a>
                                                    <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{$value->created_at->format('d/m/Y')}}</a>
                                                </div>
                                                <p>{{$value->tomtat}}</p>
                                                <a class="read-more" href="{{route('frontend.baiviet_chitiet',['tieude_slug' =>  $value->tieude_slug])}}">Xem Thêm...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                <!-- Begin Li's Pagination Area -->
                                <div class="col-lg-12">
                                    <div class="li-paginatoin-area text-center pt-25">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="li-pagination-box">
                                                    <li>{{ $baiviet->links() }}</li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Pagination End Here Area -->
                            </div>
                        </div>
                        <!-- Li's Main Content Area End Here -->
                    </div>
                </div>
            </div>
         
@endsection