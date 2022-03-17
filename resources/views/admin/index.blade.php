@extends('layouts.admin')

@section('content')
<div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Đơn Hàng Mới</h6>
                                                <h6 class="font-extrabold mb-0">{{count($donhang)}}</h6>
                                                <a href="{{route('admin.donhang.moi')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Doanh Thu Hôm Nay</h6>
                                                <h6 class="font-extrabold mb-0">@php $tongtien=0; @endphp
                                                    @foreach($doanhthu as $value)
                                                        @php $tongtien += $value->tongsoluongban * $value->dongia; @endphp
                                                    @endforeach
                                                    {{number_format($tongtien)}}</h6>
                            <a href="{{route('admin.donhang.ngay')}}" class="small-box-footer"> Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Đăng Ký Người Dùng</h6>
                                                <h6 class="font-extrabold mb-0">{{count($user)}}</h6>
                                                <a href="{{route('admin.nguoidung')}}" class="small-box-footer">Xem thêm  <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Bình Luận</h6>
                                                <h6 class="font-extrabold mb-0">{{ $binhluan->count() }}</h6>
                                                <a href="{{route('admin.binhluan.danhsach')}}" class="small-box-footer">Xem thêm  <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </section>
            </div>

@endsection