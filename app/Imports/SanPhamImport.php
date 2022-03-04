<?php

namespace App\Imports;

use App\Models\SanPham;
use App\Models\HinhAnh;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SanPhamImport implements ToModel, WithHeadingRow
{
   
    public function model(array $row)
    {

        
        $sanpham = SanPham::create([
            'loaisanpham_id' => $row['loai'],
            'thuonghieu_id' => $row['thuong_hieu'],
            'thietke_id' => $row['thiet_ke'],
            'ram_id' => $row['ram'],
            'bonhotrong_id' => $row['bo_nho_trong'],
            'tensanpham' => $row['ten_san_pham'],
            'tensanpham_slug' => Str::slug($row['ten_san_pham']),
            'soluong' => $row['so_luong'],
            'dongia' => $row['don_gia'],
        ]);

        $spreadsheet = IOFactory::load(request()->file('file_excel'));
        $i = 0;
        $image = $row['hinh_anh'];      
        $path =  explode("?",$image);
        foreach($path as $hinhanh)
        {
            HinhAnh::create([
                'sanpham_id' => $sanpham->id,
                'hinhanh' => $hinhanh,
            ]);
        }

        return $sanpham;
    }

}
