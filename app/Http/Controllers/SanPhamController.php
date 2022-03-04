<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\Ram;
use App\Models\LoaiSanPham;
use App\Models\ThuongHieu;
use App\Models\ThietKe;
use App\Models\BoNhoTrong;
use App\Models\HinhAnh;
use App\Imports\SanPhamImport;
use App\Exports\SanPhamExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Excel;


class SanPhamController extends Controller
{
        // Nhập từ Excel
     public function postNhap(Request $request)
     {
     Excel::import(new SanPhamImport, $request->file('file_excel'));
     
     return redirect()->route('admin.sanpham');
     }
     
     // Xuất ra Excel
     public function getXuat()
     {
     return Excel::download(new SanPhamExport, 'danh-sach-san-pham.xlsx');
     }
    
    public function getDanhSach()
    {
        $sanpham = SanPham::all();
        return view('admin.sanpham.danhsach', compact('sanpham'));
    }
    
    public function getThem()
    {
        $loaisanpham = LoaiSanPham::all();
        $thuonghieu = ThuongHieu::all();
        $thietke = ThietKe::all();
        $ram = Ram::all();
        $bonhotrong = BoNhoTrong::all();
        return view('admin.sanpham.them', compact('loaisanpham', 'thuonghieu', 'thietke','ram','bonhotrong'));
    }
    
    public function postThem(Request $request)
    {
        
        $request->validate([
			'loaisanpham_id' => ['required'],
			'thuonghieu_id' => ['required'],
			'thietke_id' => ['required'],
            'ram_id' => ['required'],
            'bonhotrong_id' => ['required'],
			'tensanpham' => ['required', 'string', 'max:191'],
			'soluong' => ['required', 'numeric'],
			'dongia' => ['required', 'numeric'],
			
		]);
        
        $orm = new SanPham();
		$orm->loaisanpham_id = $request->loaisanpham_id;
		$orm->ram_id = $request->ram_id;
		$orm->bonhotrong_id = $request->bonhotrong_id;
		$orm->thuonghieu_id = $request->thuonghieu_id;
        $orm->thietke_id = $request->thietke_id;
		$orm->tensanpham = $request->tensanpham;
		$orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
		$orm->soluong = $request->soluong;
		$orm->dongia = $request->dongia;
        $orm->motasanpham = $request->motasanpham;
        $orm->save();

		if($request->hasFile('HinhAnh')) 
        {
            $images = $request->file('HinhAnh');

            foreach($images as $image) 
            {
                // Xác định tên tập tin
                $extension = $image->getClientOriginalName();
                $filename = Str::slug($request->tensanpham, '-') . '-' . $extension; 
                
                // Upload vào thư mục và trả về đường dẫn
                $path = Storage::putFileAs('sanpham', $image, $filename);
             
                $img = new HinhAnh();
                $img->hinhanh = $path;
                $img->sanpham_id = $orm->id;      
                $img->save();
                
		    }  
       
        }
       
        return redirect()->route('admin.sanpham');
    }
    
   

    public function getSua($id)
    {
        
        $sanpham = SanPham::find($id);
        $loaisanpham = LoaiSanPham::all();
        $thuonghieu = ThuongHieu::all();
         $ram = Ram::all();
          $bonhotrong = BoNhoTrong::all();
        $thietke = ThietKe::all();

        $hinhanh = HinhAnh::Where('sanpham_id', $id)->get();
        $img = HinhAnh::Where('sanpham_id', $id)->first();
        

        return view('admin.sanpham.sua', compact('sanpham', 'thuonghieu', 'thietke', 'hinhanh', 'loaisanpham','ram','bonhotrong', 'img'));
    }
    public function postSua(Request $request, $id)
    {   
        $this->validate($request,[
            'thuonghieu_id' => ['required'],
            'thietke_id' => ['required'],
            'loaisanpham_id' => ['required'],
            'tensanpham' =>['required','max:255','unique:sanpham,tensanpham,' .$id],
            'soluong' =>['required','numeric'],
            'dongia' =>['required','numeric'],
        ]);
 
        $orm = SanPham::find($id);
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->thuonghieu_id = $request->thuonghieu_id;
        $orm->thietke_id = $request->thietke_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->motasanpham = $request->motasanpham;
        $orm->save();
        
        if(!empty($request->hasfile('HinhAnh')))
        {
            if ($request->hasfile('HinhAnh')) 
            {
                $img = HinhAnh::where('sanpham_id',$id)->get();
                foreach($img as $value)
                {
                    Storage::delete($value->hinhanh);
                    $value->delete();
                }
                
                $images = $request->file('HinhAnh');           
                foreach($images as $image) 
                {               
                    $extension = $image->getClientOriginalName();                
                    $fileName = Str::slug($request->tensanpham, '-'). '-' . $extension;
                    $path = Storage::putFileAs('sanpham', $image, $fileName);

                    
                    
                    $img = new HinhAnh();
                    $img->hinhanh = $path;
                    $img->sanpham_id = $orm->id;
                    $img->save();
                    
                }
               
            }      
        }
    
        return redirect()->route('admin.sanpham');
    }
    
    
    public function getXoa($id)
    {

        $img = HinhAnh::where('sanpham_id',$id)->get();
        foreach($img as $anh){
            Storage::delete($anh->hinhanh);
        }
        $orm = SanPham::find($id);
        $orm->delete();
       
        return redirect()->route('admin.sanpham');

    }

    public function getHienThi($id)
    {
        $orm = SanPham::find($id);
        $orm->hienthi = 1 - $orm->hienthi;
        
        $orm->save();
        return redirect()->route('admin.sanpham');

    }
}
