<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;

    protected $table = 'binhluan';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public function User()
    {
            return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function BaiViet()
    {
            return $this->belongsTo(BaiViet::class, 'baiviet_id', 'id');
    }

}
