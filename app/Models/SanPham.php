<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = [
     'loaisanpham_id',
     'tensanpham',
     'tensanpham_slug',
     'thuonghieu_id',
     'ram_id',
     'bonhotrong_id',
     'thietke_id',
     'soluong',
     'dongia',
     'motasanpham',
     ];

    public function LoaiSanPham()
    {
            return $this->belongsTo(LoaiSanPham::class, 'loaisanpham_id', 'id');
    }
    
    public function sanphamyeuthich()
    {
            return $this->hasMany(sanphamyeuthich::class, 'sanpham_id', 'id');
    }
    public function ThuongHieu()
    {
            return $this->belongsTo(ThuongHieu::class, 'thuonghieu_id', 'id');
    }

    public function Ram()
    {
            return $this->belongsTo(Ram::class, 'ram_id', 'id');
    }

    public function BoNhoTrong()
    {
            return $this->belongsTo(BoNhoTrong::class, 'bonhotrong_id', 'id');
    }
    public function HinhAnh()
    {
        return $this->hasMany(HinhAnh::class, 'sanpham_id', 'id');
    }
    public function ThietKe()
    {
            return $this->belongsTo(ThietKe::class, 'thietke_id', 'id');
    }

    public function DonHang_ChiTiet()
    {
        return $this->hasMany(DonHang_ChiTiet::class, 'sanpham_id', 'id');
    }
}
