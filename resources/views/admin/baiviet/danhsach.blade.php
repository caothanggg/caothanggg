@extends('layouts.admin')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Bài Viết</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bài Viết</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                 <a href="{{ route('admin.baiviet.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm mb-0">
                    <thead>
                <tr>
                    <th width="3%">#</th>
                    <th width="10%">Họ tên</th>
                    <th width="20%">Tiêu đề</th>
                    <th width="20%">Tiêu đề  không dấu</th>
                    <th width="5%">Lượt Xem</th>
                    <th width="5%">Bình luận</th>
                    <th width="5%">Kiểm duyệt</th>
                    <th width="5%">Hiển thị</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($baiviet as $value)
                <tr>
                     <td>{{ $loop->iteration }}</td>
                     <td>{{ $value->user->name }}</td>
                     <td>{{ $value->tieude }}</td>
                     <td>{{ $value->tieude_slug }}</td>   
                    <td>{{ $value->luotxem }}</td>
                    <td class="text-center">
                        @if($value->binhluan==0)
                        <a  href="{{ route('admin.baiviet.binhluan', ['id' => $value->id])  }}"><i class="fas fa-ban text-danger"></i></a>
                        @endif

                        @if($value->binhluan==1)
                         <a href="{{ route('admin.baiviet.binhluan', ['id' => $value->id])  }}"><i class="fas fa-check-circle text-info"></i></a>
                        @endif
                   </td> 
                    <td class="text-center">
                        @if($value->kiemduyet==0)
                        <a  href="{{ route('admin.baiviet.kiemduyet', ['id' => $value->id])  }}"><i class="fas fa-ban text-danger"></i></a>
                        @endif

                        @if($value->kiemduyet==1)
                         <a href="{{ route('admin.baiviet.kiemduyet', ['id' => $value->id])  }}"><i class="fas fa-check-circle text-info"></i></a>
                        @endif
                   </td>      
                   <td class="text-center">
                        @if($value->hienthi==0)
                        <a  href="{{ route('admin.baiviet.hienthi', ['id' => $value->id])  }}"><i class="fas fa-ban text-danger"></i></a>
                        @endif
                        @if($value->hienthi==1)
                         <a href="{{ route('admin.baiviet.hienthi', ['id' => $value->id])  }}"><i class="fas fa-check-circle text-info"></i>
                        @endif
                   </td>             
                    <td class="text-center"><a href="{{ route('admin.baiviet.sua', ['id' => $value->id]) }}"><i class="fa fa-edit"></i></a></td>
                    <td class="text-center"><a href="{{ route('admin.baiviet.xoa', ['id' => $value->id]) }}"  onclick="return confirm('Bạn có muốn xóa bài viết {{ $value->tieude }} không?')"><i class="fa fa-trash-alt text-danger"></i></a></td>
                </tr>
                @endforeach
            </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection