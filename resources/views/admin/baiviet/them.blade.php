@extends('layouts.admin')
@section('title', 'Bài viết')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thêm Bài Viết</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.baiviet')}}">Danh Sách</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Bài Viết</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.baiviet.them') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="tieude" class="form-label  @error('tieude') is-invalid @enderror" value="{{ old('$baiviet->tieude') }}">Tiêu đề   </label>
            <input type="text" class="form-control" id="tieude" name="tieude">
            @error('tieude')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tomtat" class="form-label  @error('tomtat') is-invalid @enderror" value="{{ old('$baiviet->tomtat') }}">Tóm tắt</label>
            <textarea type="text" class="form-control" id="tomtat" name="tomtat" ></textarea>
            @error('tomtat')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="mb-3" >
            <label for="noidung" class="form-label  @error('noidung') is-invalid @enderror" value="{{ old('$baiviet->noidung') }}">Nội dung</label>
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