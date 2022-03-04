<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuongThucThanhToan extends Model
{
    use HasFactory;

    protected $table = 'phuongthucthanhtoan';
    protected $fillable = [
		'tenphuongthucthanhtoan', 'tenphuongthucthanhtoan_slug',];

     public function SanPham()
     {
     	 return $this->hasMany(SanPham::class, 'phuongthucthanhtoan_id', 'id');
     }
}
