<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoNhoTrong extends Model
{
    use HasFactory;
     protected $table = 'bonhotrong';
     protected $fillable = [
		'tenbonhotrong', 'tenbonhotrong_slug',];
     public function SanPham()
    {
        return $this->hasMany(SanPham::class, 'bonhotrong_id', 'id');
    }
}
