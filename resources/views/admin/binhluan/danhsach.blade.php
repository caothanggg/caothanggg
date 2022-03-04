@extends('layouts.admin')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Bình Luận</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bình Luận</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                 <a href="{{ route('admin.binhluan.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm mb-0">
                    <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="10%">Họ tên</th>
                    <th width="10%">Bài viết</th>
                    <th width="10%">Nội dung</th>
                    <th width="5%">Hiển thị</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($binhluan as $value)
                <tr>
                     <td>{{ $loop->iteration }}</td>
                     <td>{{ $value->user->name }}</td>
                     <td>{{ $value->baiviet->tieude }}</td>     
                     <td><?php echo $value->noidung?></td> 
                     <td class="text-center">
                        @if($value->hienthi==0)
                        <a  href="{{ route('admin.binhluan.hienthi', ['id' => $value->id])  }}"><i class="fas fa-ban text-danger"></i></a>
                        @endif
                        @if($value->hienthi==1)
                         <a href="{{ route('admin.binhluan.hienthi', ['id' => $value->id])  }}"><i class="fas fa-check-circle text-info"></i>
                        @endif
                   </td>             
                    <td class="text-center"><a href="{{ route('admin.binhluan.sua', ['id' => $value->id]) }}"><i class="fa fa-edit"></i></a></td>
                    <td class="text-center"><a href="{{ route('admin.binhluan.xoa', ['id' => $value->id]) }}"  onclick="return confirm('Bạn có muốn xóa bình luận{{ $value->noidung }} không?')"><i class="fa fa-trash-alt text-danger"></i></a></td>
                </tr>
                @endforeach
            </tbody>
                </table>
            </div>
        </div>
    </section>
</div>


@endsection