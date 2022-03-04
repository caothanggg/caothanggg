<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThietKe extends Model
{
    use HasFactory;

    protected $table = 'thietke';
    protected $fillable = [
		'tenthietke', 'tenthietke_slug',];
     public function SanPham()
     {
     	 return $this->hasMany(SanPham::class, 'thietke_id', 'id');
     }
}
