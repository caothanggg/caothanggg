@extends('layouts.admin')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thêm Sản Phẩm</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.sanpham')}}">Danh Sách</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Sản Phẩm</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.sanpham.them') }}" method="post" enctype="multipart/form-data">
				@csrf
			
				<div class="mb-3">
					<label class="form-label" for="loaisanpham_id">Loại</label>
					<select class="form-select @error('loaisanpham_id') is-invalid @enderror" id="loaisanpham_id" name="loaisanpham_id" required>
						<option value="">-- Chọn --</option>
						@foreach($loaisanpham as $value)
							<option value="{{ $value->id }}">{{ $value->tenloai }}</option>
						@endforeach
					</select>
					@error('loaisanpham_id')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="thuonghieu_id">Thương hiệu</label>
					<select class="form-select @error('thuonghieu_id') is-invalid @enderror" id="thuonghieu_id" name="thuonghieu_id" required>
						<option value="">-- Chọn --</option>
						@foreach($thuonghieu as $value)
							<option value="{{ $value->id }}">{{ $value->tenthuonghieu }}</option>
						@endforeach
					</select>
					@error('thuonghieu_id')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
                <div class="mb-3">
					<label class="form-label" for="thietke_id">Thiết Kế</label>
					<select class="form-select @error('thietke_id') is-invalid @enderror" id="thietke_id" name="thietke_id" required>
						<option value="">-- Chọn --</option>
						@foreach($thietke as $value)
							<option value="{{ $value->id }}">{{ $value->tenthietke }}</option>
						@endforeach
					</select>
					@error('thietke_id')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>

				<div class="mb-3">
					<label class="form-label" for="ram_id">Ram</label>
					<select class="form-select @error('ram_id') is-invalid @enderror" id="ram_id" name="ram_id" required>
						<option value="">-- Chọn --</option>
						@foreach($ram as $value)
							<option value="{{ $value->id }}">{{ $value->tenram }}</option>
						@endforeach
					</select>
					@error('ram_id')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>

				<div class="mb-3">
					<label class="form-label" for="bonhotrong_id">Bộ Nhớ Trong</label>
					<select class="form-select @error('bonhotrong_id') is-invalid @enderror" id="bonhotrong_id" name="bonhotrong_id" required>
						<option value="">-- Chọn --</option>
						@foreach($bonhotrong as $value)
							<option value="{{ $value->id }}">{{ $value->tenbonhotrong }}</option>
						@endforeach
					</select>
					@error('bonhotrong_id')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				
				

				<div class="mb-3">
					<label class="form-label" for="tensanpham">Tên sản phẩm</label>
					<input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham" name="tensanpham" value="{{ old('tensanpham') }}" required />
					@error('tensanpham')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="soluong">Số lượng</label>
					<input type="number" min="0" class="form-control @error('soluong') is-invalid @enderror" id="soluong" name="soluong" value="{{ old('soluong') }}" required />
					@error('soluong')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="dongia">Đơn giá</label>
					<input type="number" min="0" class="form-control @error('dongia') is-invalid @enderror" id="dongia" name="dongia" value="{{ old('dongia') }}" required />
					@error('dongia')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<div class="mb-3" >
					<label class="form-label" for="HinhAnh">Hình ảnh</label>
					<input type="file" min="0" class="form-control @error('HinhAnh') is-invalid @enderror" name="HinhAnh[]" accept=".jpg, jpeg, .png" multiple/>
					@error('HinhAnh')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>

				<div class="mb-3">
					<label class="form-label" for="motasanpham">Mô tả sản phẩm</label>
					<textarea class="form-control" id="motasanpham" name="motasanpham">{{ old('motasanpham') }}</textarea>
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Thêm vào CSDL</button>
			</form>
            </div>
        </div>
    </section>
</div>

	
@endsection
@section('javascript')
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
			<script>
					ClassicEditor
						.create( document.querySelector( '#motasanpham' ) )
						.catch( error => {
							console.error( error );
						} );
			</script>
@endsection