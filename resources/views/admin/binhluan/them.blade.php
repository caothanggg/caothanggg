@extends('layouts.admin')
@section('title', 'Bình luận')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thêm Bình Luận</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.binhluan')}}">Danh Sách</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Bình Luận</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.binhluan.them') }}" method="post">
        @csrf
        <div class="mb-3">
                    <label class="form-label" for="baiviet_id">Bài viết</label>
                    <select class="form-select @error('baiviet_id') is-invalid @enderror" id="baiviet_id" name="baiviet_id" required>
                        <option value="">-- Chọn --</option>
                        @foreach($baiviet as $value)
                            <option value="{{ $value->id }}">{{ $value->tieude }}</option>
                        @endforeach
                    </select>
                    @error('baiviet_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
        </div>

        <div class="mb-3" >
            <label for="noidung" class="form-label  @error('noidung') is-invalid @enderror" value="{{ old('noidung') }}">Nội dung</label>
            <textarea id="noidung" class="form-control" name="noidung"></textarea>
            @error('noidung')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
       

        <button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
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