@extends('layouts.admin')
@section('title', 'Người dùng')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thêm Tài Khoản</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.nguoidung')}}">Danh Sách</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Tài Khoản</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.nguoidung.them') }}" method="post">
            @csrf

                <div class="mb-3">
                    <label class="form-label" for="name">Họ và tên</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"  />
                    @error('name')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">Địa chỉ email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}"  />
                    @error('email')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="role">Quyền hạn</label>
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" >
                        <option value="">-- Chọn --</option>
                        <option value="admin">Quản trị viên</option>
                        <option value="staff">Nhân viên</option>
                        <option value="user">Khách hàng</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Mật khẩu mới</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  />
                    @error('password')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">Xác nhận mật khẩu mới</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"  />
                    @error('password_confirmation')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Thêm người dùng</button>
            </form>
            </div>
        </div>
    </section>
</div>

    
@endsection