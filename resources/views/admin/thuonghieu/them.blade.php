@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thêm Thương Hiệu</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.thuonghieu')}}">Danh Sách</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Thương Hiệu Sản Phẩm</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.thuonghieu.them') }}" method="post" enctype="multipart/form-data">
				@csrf
				
				<div class="mb-3">
					<label class="form-label" for="tenthuonghieu">Tên thương hiệu</label>
					<input type="text" class="form-control @error('tenthuonghieu') is-invalid @enderror" id="tenthuonghieu" name="tenthuonghieu" value="{{ old('tenthuonghieu') }}" required />
					@error('tenthuonghieu')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="hinhanh">Hình ảnh</label>
					<input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" />
					@error('hinhanh')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Thêm vào CSDL</button>
			</form>
            </div>
        </div>
    </section>
</div>

	
@endsection