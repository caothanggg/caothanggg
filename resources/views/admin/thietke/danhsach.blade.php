@extends('layouts.admin')
@section('content')
 <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thiết Kế</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thiết Kế</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
        	<div class="card-header">
                 <a href="{{ route('admin.thietke.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm mb-0">
                    <thead>
                        <tr>
                        	

                        	<th width="10%">#</th>
                        	<th width="40%">Tên Thiết Kế</th>
                        	<th width="40%">Tên Thiết Kế Không Dấu</th>
                        	<th width="10%">Sửa/Xóa</th>
                        	
                        </tr>
                    </thead>
                    <tbody>
                    	 @foreach($thietke as $value)
                    	<tr>
                    		<td>{{ $loop->iteration }}</td>
							 <td>{{ $value->tenthietke }}</td>
							 <td>{{ $value->tenthietke_slug }}</td>
							 <td class="text-center">
							 	<a class="btn btn-sm" href="{{ route('admin.thietke.sua', ['id' => $value->id]) }}"><i class="fas fa-pen-fancy"></i></a>
							 
							 	<a class="btn btn-sm" href="{{ route('admin.thietke.xoa', ['id' => $value->id]) }}"><i class="far fa-trash-alt"></i></a>
							 </td>

                    	</tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection