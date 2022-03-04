@extends('layouts.admin')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thương Hiệu</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thương Hiệu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
        	<div class="card-header">
                 <a href="{{ route('admin.thuonghieu.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a>
                 <a href="#nhap" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#importModal" ><i class="fas fa-upload"></i> Nhập từ Excel</a>
            <a href="{{ route('admin.thuonghieu.xuat') }}" class="btn btn-success"><i class="fas fa-download"></i> Xuất ra Excel</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm mb-0">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="10%">Hình ảnh</th>
						<th class="text-center" width="45%">Tên Thương Hiệu</th>
						<th class="text-center" width="30%">Tên Thương Hiệu không dấu</th>
						<th width="10%">Sửa/Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($thuonghieu as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td class="text-center" >
								@if(empty($value->hinhanh))
								<img src="{{ env('APP_URL') . '/public/image/noimage.png'}}" width="100" class="img-thumbnail" />
								@else
								<img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" width="100" class="img-thumbnail" />
								@endif
							</td>
							<td>{{ $value->tenthuonghieu }}</td>
							<td>{{ $value->tenthuonghieu_slug }}</td>
							<td class="text-center">
							 	<a class="btn btn-sm" href="{{ route('admin.thuonghieu.sua', ['id' => $value->id]) }}"><i class="fas fa-pen-fancy fa-lg"></i></a>
							 
							 	<a class="btn btn-sm" href="{{ route('admin.thuonghieu.xoa', ['id' => $value->id]) }}"><i class="far fa-trash-alt fa-lg text-danger"></i></a>
							 </td>
						</tr>
					@endforeach
				</tbody>
			</table>
            </div>
        </div>
    </section>
</div>
<form action="{{ route('admin.thuonghieu.nhap') }}" method="post" enctype="multipart/form-data">
@csrf
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-0">
                    <label for="file_excel" class="form-label">Chọn tập tin Excel</label>
                    <input type="file" class="form-control" id="file_excel" name="file_excel" required />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Hủy bỏ</button>
                <button type="submit" class="btn btn-danger"><i class="fas fa-upload"></i> Nhập dữ liệu</button>
            </div>
        </div>
    </div>
</div>
</form>

@endsection