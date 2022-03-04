@extends('layouts.admin')
@section('content')

 <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thêm Tình Trạng</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.tinhtrang')}}">Danh Sách</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Tình Trạng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.tinhtrang.them') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="tentinhtrang">Tên Tình Trạng</label>
                        <input type="text" class="form-control @error('tentinhtrang') is-invalid @enderror" id="tentinhtrang" name="tentinhtrang" value="{{ old('tentinhtrang') }}" required />
                        @error('tentinhtrang')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm vào CSDL</button>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection