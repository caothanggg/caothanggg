<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\ThuongHieuController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\BoNhoTrongController;
use App\Http\Controllers\PhuongThucThanhToanController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\ThietKeController;
use App\Http\Controllers\TinhTrangController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\HinhAnhController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KhachHangController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
//trang chủ

Route::get('/', [HomeController::class, 'getHome'])->name('frontend');
// Trang sản phẩm
Route::get('/san-pham', [HomeController::class, 'getSanPham'])->name('frontend.sanpham');
Route::get('/san-pham', [HomeController::class, 'postSanPham'])->name('frontend.sanpham');

//Thương hiệu/loai/ram/bonhotrong/thietke
    Route::get('/loai-san-pham/{all}', [HomeController::class, 'getLoaiSanPham'])->name('frontend.loaisanpham');
    Route::get('/thuong-hieu/{all}', [HomeController::class, 'getThuongHieu'])->name('frontend.thuonghieu');
    Route::get('/ram/{all}', [HomeController::class, 'getRam'])->name('frontend.ram');
    Route::get('/bo-nho-trong/{all}', [HomeController::class, 'getBoNhoTrong'])->name('frontend.bonhotrong');
    Route::get('/thiet-ke/{all}', [HomeController::class, 'getThietKe'])->name('frontend.thietke');

// Trang giỏ hàng
Route::get('/gio-hang', [HomeController::class, 'getGioHang'])->name('frontend.giohang');
Route::get('/gio-hang/them/{tensanpham_slug}', [HomeController::class, 'getGioHang_Them'])->name('frontend.giohang.them');
Route::get('/gio-hang/them/chitiet/{tensanpham_slug}', [HomeController::class, 'getGioHang_ThemChiTiet'])->name('frontend.giohang.them.chitiet');
Route::get('/gio-hang/xoa', [HomeController::class, 'getGioHang_XoaTatCa'])->name('frontend.giohang.xoatatca');
Route::get('/gio-hang/xoa/{row_id}', [HomeController::class, 'getGioHang_Xoa'])->name('frontend.giohang.xoa');
Route::get('/gio-hang/giam/{row_id}', [HomeController::class, 'getGioHang_Giam'])->name('frontend.giohang.giam');
Route::get('/gio-hang/tang/{row_id}', [HomeController::class, 'getGioHang_Tang'])->name('frontend.giohang.tang');

// Trang đặt hàng
Route::get('/dat-hang', [HomeController::class, 'getDatHang'])->name('frontend.dathang');
Route::post('/dat-hang', [HomeController::class, 'postDatHang'])->name('frontend.dathang');
Route::get('/dat-hang-thanh-cong', [HomeController::class, 'getDatHangThanhCong'])->name('frontend.dathangthanhcong');
// Tìm kiếm
Route::get('/search', [HomeController::class, 'getSearch'])->name('frontend.search');
// Liên hệ
Route::get('/lien-he', [HomeController::class, 'getLienHe'])->name('frontend.lienhe');
//Tin tức
Route::get('/tin-tuc', [HomeController::class, 'getBaiViet'])->name('frontend.baiviet');
Route::get('/tin-tuc/{tieude_slug}', [HomeController::class, 'getBaiViet_ChiTiet'])->name('frontend.baiviet_chitiet');
//Bình luận
Route::post('/binh-luan/{tieude_slug}', [HomeController::class, 'postBinhLuan'])->name('frontend.binhluan');

// Trang khách hàng
Route::get('/khach-hang/dang-ky', [HomeController::class, 'getDangKy'])->name('khachhang.dangky');
Route::get('/khach-hang/dang-nhap', [HomeController::class, 'getDangNhap'])->name('khachhang.dangnhap');

// Trang tài khoản khách hàng
Route::prefix('khach-hang')->group(function() {
 // Trang chủ tài khoản khách hàng
 Route::get('/', [KhachHangController::class, 'getHome'])->name('khachhang');

// Xem và cập nhật trạng thái đơn hàng
 Route::get('/don-hang/{id}', [KhachHangController::class, 'getDonHang'])->name('khachhang.donhang');
 Route::post('/don-hang/{id}', [KhachHangController::class, 'postDonHang'])->name('khachhang.donhang');
 
 // Cập nhật thông tin tài khoản
 Route::post('/cap-nhat-ho-so', [KhachHangController::class, 'postCapNhatHoSo'])->name('khachhang.capnhathoso');
});


// Trang quản trị
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('/', [AdminController::class, 'getHome'])->name('home');
    Route::get('/403', [AdminController::class, 'getForbidden'])->name('forbidden');

    //Quản lý loại sản phẩm
    Route::get('/loaisanpham', [LoaiSanPhamController::class, 'getDanhSach'])->name('loaisanpham')->middleware('admin');
    Route::get('/loaisanpham/them', [LoaiSanPhamController::class, 'getThem'])->name('loaisanpham.them')->middleware('admin');
    Route::post('/loaisanpham/them', [LoaiSanPhamController::class, 'postThem'])->name('loaisanpham.them')->middleware('admin');
    Route::get('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'getSua'])->name('loaisanpham.sua')->middleware('admin');
    Route::post('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'postSua'])->name('loaisanpham.sua')->middleware('admin');
    Route::get('/loaisanpham/xoa/{id}', [LoaiSanPhamController::class, 'getXoa'])->name('loaisanpham.xoa')->middleware('admin');

    Route::post('/sanpham/nhap', [SanPhamController::class, 'postNhap'])->name('sanpham.nhap')->middleware('admin');
    Route::get('/sanpham/xuat', [SanPhamController::class, 'getXuat'])->name('sanpham.xuat')->middleware('admin');


    //Quản lý thương hiệu
    Route::get('/thuonghieu', [ThuongHieuController::class, 'getDanhSach'])->name('thuonghieu')->middleware('admin');
    Route::get('/thuonghieu/them', [ThuongHieuController::class, 'getThem'])->name('thuonghieu.them')->middleware('admin');
    Route::post('/thuonghieu/them', [ThuongHieuController::class, 'postThem'])->name('thuonghieu.them')->middleware('admin');
    Route::get('/thuonghieu/sua/{id}', [ThuongHieuController::class, 'getSua'])->name('thuonghieu.sua')->middleware('admin');
    Route::post('/thuonghieu/sua/{id}', [ThuongHieuController::class, 'postSua'])->name('thuonghieu.sua')->middleware('admin');
    Route::get('/thuonghieu/xoa/{id}', [ThuongHieuController::class, 'getXoa'])->name('thuonghieu.xoa')->middleware('admin');
    Route::post('/thuonghieu/nhap', [ThuongHieuController::class, 'postNhap'])->name('thuonghieu.nhap')->middleware('admin');
    Route::get('/thuonghieu/xuat', [ThuongHieuController::class, 'getXuat'])->name('thuonghieu.xuat')->middleware('admin');

    //Quản lý ram
    Route::get('/ram', [RamController::class, 'getDanhSach'])->name('ram')->middleware('admin');
    Route::get('/ram/them', [RamController::class, 'getThem'])->name('ram.them')->middleware('admin');
    Route::post('/ram/them', [RamController::class, 'postThem'])->name('ram.them')->middleware('admin');
    Route::get('/ram/sua/{id}', [RamController::class, 'getSua'])->name('ram.sua')->middleware('admin');
    Route::post('/ram/sua/{id}', [RamController::class, 'postSua'])->name('ram.sua')->middleware('admin');
    Route::get('/ram/xoa/{id}', [RamController::class, 'getXoa'])->name('ram.xoa')->middleware('admin');

    //Quản lý bộ nhớ trong
    Route::get('/bonhotrong', [BoNhoTrongController::class, 'getDanhSach'])->name('bonhotrong')->middleware('admin');
    Route::get('/bonhotrong/them', [BoNhoTrongController::class, 'getThem'])->name('bonhotrong.them')->middleware('admin');
    Route::post('/bonhotrong/them', [BoNhoTrongController::class, 'postThem'])->name('bonhotrong.them')->middleware('admin');
    Route::get('/bonhotrong/sua/{id}', [BoNhoTrongController::class, 'getSua'])->name('bonhotrong.sua')->middleware('admin');
    Route::post('/bonhotrong/sua/{id}', [BoNhoTrongController::class, 'postSua'])->name('bonhotrong.sua')->middleware('admin');
    Route::get('/bonhotrong/xoa/{id}', [BoNhoTrongController::class, 'getXoa'])->name('bonhotrong.xoa')->middleware('admin');

    //Quản lý phương thức thanh toán
    Route::get('/phuongthucthanhtoan', [PhuongThucThanhToanController::class, 'getDanhSach'])->name('phuongthucthanhtoan')->middleware('admin');
    Route::get('/phuongthucthanhtoan/them', [PhuongThucThanhToanController::class, 'getThem'])->name('phuongthucthanhtoan.them')->middleware('admin');
    Route::post('/phuongthucthanhtoan/them', [PhuongThucThanhToanController::class, 'postThem'])->name('phuongthucthanhtoan.them')->middleware('admin');
    Route::get('/phuongthucthanhtoan/sua/{id}', [PhuongThucThanhToanController::class, 'getSua'])->name('phuongthucthanhtoan.sua')->middleware('admin');
    Route::post('/phuongthucthanhtoan/sua/{id}', [PhuongThucThanhToanController::class, 'postSua'])->name('phuongthucthanhtoan.sua')->middleware('admin');
    Route::get('/phuongthucthanhtoan/xoa/{id}', [PhuongThucThanhToanController::class, 'getXoa'])->name('phuongthucthanhtoan.xoa')->middleware('admin');

    //Quản lý thiết kế
    Route::get('/thietke', [ThietKeController::class, 'getDanhSach'])->name('thietke')->middleware('admin');
    Route::get('/thietke/them', [ThietKeController::class, 'getThem'])->name('thietke.them')->middleware('admin');
    Route::post('/thietke/them', [ThietKeController::class, 'postThem'])->name('thietke.them')->middleware('admin');
    Route::get('/thietke/sua/{id}', [ThietKeController::class, 'getSua'])->name('thietke.sua')->middleware('admin');
    Route::post('/thietke/sua/{id}', [ThietKeController::class, 'postSua'])->name('thietke.sua')->middleware('admin');
    Route::get('/thietke/xoa/{id}', [ThietKeController::class, 'getXoa'])->name('thietke.xoa')->middleware('admin');

    //Quản lý thiết kế
    Route::get('/tinhtrang', [TinhTrangController::class, 'getDanhSach'])->name('tinhtrang')->middleware('admin');
    Route::get('/tinhtrang/them', [TinhTrangController::class, 'getThem'])->name('tinhtrang.them')->middleware('admin');
    Route::post('/tinhtrang/them', [TinhTrangController::class, 'postThem'])->name('tinhtrang.them')->middleware('admin');
    Route::get('/tinhtrang/sua/{id}', [TinhTrangController::class, 'getSua'])->name('tinhtrang.sua')->middleware('admin');
    Route::post('/tinhtrang/sua/{id}', [TinhTrangController::class, 'postSua'])->name('tinhtrang.sua')->middleware('admin');
    Route::get('/tinhtrang/xoa/{id}', [TinhTrangController::class, 'getXoa'])->name('tinhtrang.xoa')->middleware('admin');

    // Quản lý bài viết
    Route::get('/baiviet', [BaiVietController::class, 'getDanhSach'])->name('baiviet')->middleware('nhanvien');
    Route::get('/baiviet/them', [BaiVietController::class, 'getThem'])->name('baiviet.them')->middleware('nhanvien');
    Route::post('/baiviet/them', [BaiVietController::class, 'postThem'])->name('baiviet.them')->middleware('nhanvien');
    Route::get('/baiviet/sua/{id}', [BaiVietController::class, 'getSua'])->name('baiviet.sua')->middleware('nhanvien');
    Route::post('/baiviet/sua/{id}', [BaiVietController::class, 'postSua'])->name('baiviet.sua')->middleware('nhanvien');
    Route::get('/baiviet/xoa/{id}', [BaiVietController::class, 'getXoa'])->name('baiviet.xoa')->middleware('nhanvien');
    Route::post('/baiviet/nhap', [BaiVietController::class, 'postNhap'])->name('baiviet.nhap')->middleware('nhanvien');
    Route::get('/baiviet/xuat', [BaiVietController::class, 'getXuat'])->name('baiviet.xuat')->middleware('nhanvien');
    Route::get('/baiviet/kiemduyet/{id}', [BaiVietController::class, 'getOnOff'])->name('baiviet.kiemduyet')->middleware('nhanvien');
    Route::get('/baiviet/hienthi/{id}', [BaiVietController::class, 'getHienThi'])->name('baiviet.hienthi')->middleware('nhanvien');
    Route::get('/baiviet/binhluan/{id}', [BaiVietController::class, 'getBinhLuan'])->name('baiviet.binhluan')->middleware('nhanvien');
   
    // Quản lý bình luận
    Route::get('/binhluan', [BinhLuanController::class, 'getDanhSach'])->name('binhluan')->middleware('nhanvien');
    Route::get('/binhluan/them', [BinhLuanController::class, 'getThem'])->name('binhluan.them')->middleware('nhanvien');
    Route::post('/binhluan/them', [BinhLuanController::class, 'postThem'])->name('binhluan.them')->middleware('nhanvien');
    Route::get('/binhluan/sua/{id}', [BinhLuanController::class, 'getSua'])->name('binhluan.sua')->middleware('nhanvien');
    Route::post('/binhluan/sua/{id}', [BinhLuanController::class, 'postSua'])->name('binhluan.sua')->middleware('nhanvien');
    Route::get('/binhluan/xoa/{id}', [BinhLuanController::class, 'getXoa'])->name('binhluan.xoa')->middleware('nhanvien');
    Route::post('/binhluan/nhap', [BinhLuanController::class, 'postNhap'])->name('binhluan.nhap')->middleware('nhanvien');
    Route::get('/binhluan/xuat', [BinhLuanController::class, 'getXuat'])->name('binhluan.xuat')->middleware('nhanvien');
    Route::get('/binhluan/hienthi/{id}', [BinhLuanController::class, 'getHienThi'])->name('binhluan.hienthi')->middleware('nhanvien');

    // Quản lý Sản phẩm
    Route::get('/sanpham', [SanPhamController::class, 'getDanhSach'])->name('sanpham')->middleware('nhanvien');
    Route::get('/sanpham/them', [SanPhamController::class, 'getThem'])->name('sanpham.them')->middleware('nhanvien');
    Route::post('/sanpham/them', [SanPhamController::class, 'postThem'])->name('sanpham.them')->middleware('nhanvien');
    Route::get('/sanpham/sua/{id}', [SanPhamController::class, 'getSua'])->name('sanpham.sua')->middleware('nhanvien');
    Route::post('/sanpham/sua/{id}', [SanPhamController::class, 'postSua'])->name('sanpham.sua')->middleware('nhanvien');
    Route::get('/sanpham/xoa/{id}', [SanPhamController::class, 'getXoa'])->name('sanpham.xoa')->middleware('nhanvien');
    Route::post('/sanpham/nhap', [SanPhamController::class, 'postNhap'])->name('sanpham.nhap')->middleware('nhanvien');
    Route::get('/sanpham/xuat', [SanPhamController::class, 'getXuat'])->name('sanpham.xuat')->middleware('nhanvien');
    Route::get('/sanpham/hienthi/{id}', [SanPhamController::class, 'getHienThi'])->name('sanpham.hienthi')->middleware('nhanvien');

    

    // Quản lý hình ảnh
    Route::get('/hinhanh/{tensanpham_slug}', [HinhAnhController::class, 'getDanhSach'])->name('hinhanh');
    Route::get('/hinhanh/them/{tensanpham_slug}', [HinhAnhController::class, 'getThem'])->name('hinhanh.them');
    Route::post('/hinhanh/them/{tensanpham_slug}', [HinhAnhController::class, 'postThem'])->name('hinhanh.them');
    Route::get('/hinhanh/sua/{id}', [HinhAnhController::class, 'getSua'])->name('hinhanh.sua');
    Route::post('/hinhanh/sua/{id}', [HinhAnhController::class, 'postSua'])->name('hinhanh.sua');
    Route::get('/hinhanh/xoa/{id}', [HinhAnhController::class, 'getXoa'])->name('hinhanh.xoa');
    
    // Quản lý Đơn hàng
    Route::get('/donhang', [DonHangController::class, 'getDanhSach'])->name('donhang');
    Route::get('/donhang/them', [DonHangController::class, 'getThem'])->name('donhang.them');
    Route::post('/donhang/them', [DonHangController::class, 'postThem'])->name('donhang.them');
    Route::get('/donhang/sua/{id}', [DonHangController::class, 'getSua'])->name('donhang.sua');
    Route::post('/donhang/sua/{id}', [DonHangController::class, 'postSua'])->name('donhang.sua');
    Route::get('/donhang/xoa/{id}', [DonHangController::class, 'getXoa'])->name('donhang.xoa');

    // Quản lý Đơn hàng chi tiết
    Route::get('/donhang/chitiet', [DonHangChiTietController::class, 'getDanhSach'])->name('donhang.chitiet');
    Route::get('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'getSua'])->name('donhang.chitiet.sua');
    Route::post('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'postSua'])->name('donhang.chitiet.sua');
    Route::get('/donhang/chitiet/xoa/{id}', [DonHangChiTietController::class, 'getXoa'])->name('donhang.chitiet.xoa');

    // Quản lý Tài khoản người dùng
    Route::get('/nguoidung', [NguoiDungController::class, 'getDanhSach'])->name('nguoidung');
    Route::get('/nguoidung/them', [NguoiDungController::class, 'getThem'])->name('nguoidung.them');
    Route::post('/nguoidung/them', [NguoiDungController::class, 'postThem'])->name('nguoidung.them');
    Route::get('/nguoidung/sua/{id}', [NguoiDungController::class, 'getSua'])->name('nguoidung.sua');
    Route::post('/nguoidung/sua/{id}', [NguoiDungController::class, 'postSua'])->name('nguoidung.sua');
    Route::get('/nguoidung/xoa/{id}', [NguoiDungController::class, 'getXoa'])->name('nguoidung.xoa');
    Route::post('/nguoidung/nhap', [NguoiDungController::class, 'postNhap'])->name('nguoidung.nhap');
    Route::post('/nguoidung/xuat', [NguoiDungController::class, 'postXuat'])->name('nguoidung.xuat');
    Route::get('/nguoidung/info/{name}', [NguoiDungController::class, 'getInfo'])->name('nguoidung.info');
    Route::post('/nguoidung/sua/info/{id}', [NguoiDungController::class, 'postSuaInfo'])->name('nguoidung.sua.info');
});