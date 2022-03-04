@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">Sửa hình ảnh</div>
		<div class="card-body">
			<form action="{{ route('admin.hinhanh.sua', ['id' => $hinhanh->id]) }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="mb-3" >
					<label class="form-label" for="HinhAnh"></label>
					<div class="d-flex flex-nowrap justify-content-center">
						@if(!empty($hinhanh->hinhanh))
							<img src="{{ env('APP_URL') . '/storage/app/' .$hinhanh->hinhanh}}" width="100" />
						@endif
					</div>
						<input type="file" class="mt-4 form-control @error('HinhAnh') is-invalid @enderror" id="HinhAnh" name="HinhAnh" multiple/>		
					@error('HinhAnh')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection