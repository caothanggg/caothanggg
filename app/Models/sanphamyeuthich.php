<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanphamyeuthich extends Model
{
    use HasFactory;
    protected $table = 'sanphamyeuthich';
    public function SanPham()
    {
            return $this->belongsTo(SanPham::class, 'sanpham_id', 'id');
    }
}

