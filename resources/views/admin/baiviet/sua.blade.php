@extends('layouts.admin')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Cập Nhật Bài Viết</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.baiviet')}}">Danh Sách</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cập Nhật Bài Viết</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.baiviet.sua', ['id' => $baiviet->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
              
        <div class="mb-3">
                <label class="form-label" for="tieude">Tiêu đề</label>
                <input type="text" class="form-control @error('tieude') is-invalid @enderror" id="tieude" name="tieude" value="{{ $baiviet->tieude }}" required />
                    @error('tieude')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="tomtat">Tóm tắt</label> 
                <textarea type="text" class="form-control @error('tomtat') is-invalid @enderror" id="tomtat" name="tomtat" value="{{ $baiviet->tomtat }}" required/>{{ $baiviet->tomtat }}</textarea>
                    @error('tomtat')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="noidung">Nội dung</label>
                <textarea type="text" class="form-control  @error('noidung') is-invalid @enderror" id="noidung" name="noidung" value="{{ $baiviet->noidung }}"  required />{{ $baiviet->noidung }}</textarea>
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
