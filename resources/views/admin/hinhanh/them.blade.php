@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">Thêm hình ảnh</div>
		<div class="card-body">
			<form action="{{ route('admin.hinhanh.them',['tensanpham_slug' => $sanpham->tensanpham_slug]) }}" method="post" enctype="multipart/form-data">
				@csrf			
				<div class="mb-3">
					<label class="form-label" for="HinhAnh">Hình ảnh sản phẩm</label>
					<input type="file" class="form-control @error('HinhAnh') is-invalid @enderror" value="{{ old('HinhAnh') }}" name="HinhAnh[]" multiple/>
					@error('HinhAnh')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Thêm ảnh</button>
			</form>
			
		</div>
	</div>
@endsection