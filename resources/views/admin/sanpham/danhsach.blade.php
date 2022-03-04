@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Sản Phẩm</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sản Phẩm</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
        	<div class="card-header">
                 <a href="{{ route('admin.sanpham.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a>
                 <a href="#nhap" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-upload"></i> Nhập từ Excel</a>
 				<a href="{{ route('admin.sanpham.xuat') }}" class="btn btn-success"><i class="fas fa-download"></i> Xuất ra Excel</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm mb-0">
				<thead>
					<tr>
						<th class="text-center" width="3%">#</th>
						<th class="text-center" width="13%">Thông tin sản phẩm</th>
						<th class="text-center" width="12%">Tên sản phẩm không dấu </th>
						<th class="text-center" width="7%">Số lượng</th>
                        <th class="text-center" width="7%">Hiển thị</th>
						<th class="text-center" width="7%">Hình ảnh</th>       
						<th class="text-center" width="5%">Sửa</th>
						<th class="text-center" width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($sanpham as $value)
						<tr class="text-center">
                            <td>{{ $loop->iteration }}</td>		
							<td>
								Loại sản phẩm: {{ $value->loaisanpham->tenloai }}  </br>
								Thương hiệu{{ $value->thuonghieu->tenthuonghieu }}  </br>
								Thiết Kế :{{ $value->thietke->tenthietke }}  </br>
								Tên sản phẩm: {{ $value->tensanpham }}  </br>
								
								Đơn giá: {{ number_format($value->dongia) }}  </br>

							</td>
                            <td>{{ $value->tensanpham_slug }}</td>
                            <td>{{ $value->soluong }}  </td>
							<td >
								@if($value->hienthi == 0)
									<a  href="{{ route('admin.sanpham.hienthi', ['id' => $value->id])  }}"><i class="fas fa-ban text-danger"></i></a>
								@endif
								@if($value->hienthi == 1)
									<a href="{{ route('admin.sanpham.hienthi', ['id' => $value->id])  }}"><i class="fas fa-check-circle text-info"></i></a>
								@endif

							</td> 
							
							<td class="text-center">
								<a href="{{ route('admin.hinhanh', ['tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="far fa-image"></i></a>
							</td>
							<td class="text-center"><a href="{{ route('admin.sanpham.sua', ['id' => $value->id]) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="{{ route('admin.sanpham.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa sản phẩm {{ $value->tensanpham }} không?')"><i class="fas fa-trash-alt text-danger"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
            </div>
        </div>
    </section>
</div>

	
<form action="{{ route('admin.sanpham.nhap') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nhập từ Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<label for="file_excel" class="form-label">Chọn tập tin Excel</label>
        <input type="file" class="form-control" id="file_excel" name="file_excel" required />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-danger"><i class="fal fa-upload"></i> Nhập dữ liệu</button>
      </div>
    </div>
  </div>
</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#AlertBox').removeClass('hide');
        $('#AlertBox').delay(2000).slideUp(500);
    });
</script>

@endsection