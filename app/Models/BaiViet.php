<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;
    
    protected $table = 'baiviet';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public function User()
    {
            return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function BinhLuan()
    {
        return $this->hasMany(BinhLuan::class, 'baiviet_id', 'id');
    }
}
