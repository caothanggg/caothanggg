@extends('layouts.admin')
@section('content')
<main>
    <!--? Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>404</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? Hero Area End-->
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
          <section class="content">
            <div class="error-page">
              <h2 class="headline text-warning"> 404</h2>

              <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Không tìm thấy trang.</h3>
                <p>             
                Chúng tôi không thể tìm thấy trang bạn đang tìm kiếm.
                Trong khi đó, bạn có thể <a href="#" class="genric-btn success medium circle"> trở lại trang chủ </a> hoặc thử sử dụng biểu mẫu tìm kiếm.
                </p>
                <form class="search-form">
                  <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" name="submit" class="genric-btn danger" style="height: 38px;"><i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.input-group -->
                </form>
              </div>
              <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
          </section>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
</main>
@endsection