@extends('layouts.admin')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Cập Nhật Bình Luận</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.binhluan')}}">Danh Sách</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cập Nhật Bình Luận</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.binhluan.sua', ['id' => $binhluan->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        

        <div class="mb-3" >
            <label for="noidung" class="form-label  @error('noidung') is-invalid @enderror" value="{{ old('noidung') }}">Nội dung</label>
            <textarea id="noidung" class="form-control" name="noidung">{{ $binhluan->noidung }}</textarea>
            @error('noidung')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
            
        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Cập nhật</button>
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
                .create( document.querySelector( '#noidung' ) )
                .catch( error => {
                    console.error( error );
                } );
    </script>


@endsection
