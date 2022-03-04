@extends('layouts.admin')
@section('title', 'Người dùng')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Người Dùng</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Người Dùng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                 <a href="{{ route('admin.nguoidung.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm mb-0">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="20%">Họ và tên</th>
                        <th width="20%">Tên đăng nhập</th>
                        <th width="35%">Email</th>
                        <th width="10%">Quyền hạn</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nguoidung as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->username }}</td>
                        <td>{{ $value->email }}</td>
                        <td class="text-center">
                            @if($value->role == 'admin')
                                <span class="badge bg-danger">{{ $value->role }}</span>
                            @elseif($value->role == 'staff')
                                <span class="badge bg-warning text-dark">{{ $value->role }}</span>
                            @else
                                <span class="badge bg-info text-dark">{{ $value->role }}</span>

                            @endif
                        </td>
                        <td class="text-center"><a href="{{ route('admin.nguoidung.sua', ['id' => $value->id]) }}"><i class="fas fa-edit"></i></a></td>
                        <td class="text-center"><a href="{{ route('admin.nguoidung.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa người dùng {{ $value->name}} không?')"><i class="fas fa-trash-alt text-danger"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

    
@endsection