<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    use HasFactory;

    protected $table = 'hinhanh';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = [

        'sanpham_id',
        'hinhanh',               
    ];

    public function SanPham()
    {
            return $this->belongsTo(SanPham::class, 'sanpham_id', 'id');
    }
}
