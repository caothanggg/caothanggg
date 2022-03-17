<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhTrang extends Model
{
    use HasFactory;

    protected $table = 'tinhtrang';
    protected $fillable = ['tentinhtrang'];
    
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public function DonHang()
    {
        return $this->hasMany(DonHang::class, 'tinhtrang_id', 'id');
    }
}
