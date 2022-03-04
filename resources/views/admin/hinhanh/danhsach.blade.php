@extends('layouts.admin')
@section('content')
 <div class="card">
    <div class="card-header">Hình ảnh</div>
    <div class="card-body table-responsive">
    <p><a href="{{ route('admin.hinhanh.them',['tensanpham_slug' => $sanpham->tensanpham_slug]) }}" class="btn btn-info"><i class="fa fa-plus"></i> Thêm mới</a></p>
        <table class="table table-bordered table-hover table-sm mb-0">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Hình ảnh</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
            @foreach($hinhanh as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" width="80" /></td>
                    <td class="text-center"><a href="{{ route('admin.hinhanh.sua', ['id' => $value->id]) }}"><i class="fa fa-edit"></i></a></td>
                    <td class="text-center"><a href="{{ route('admin.hinhanh.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa hình ảnh {{ $value->name }} không?')"><i class="fa fa-trash-alt text-danger"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
 </div>
@endsection