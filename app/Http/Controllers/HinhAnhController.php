<?php

namespace App\Http\Controllers;

use App\Models\HinhAnh;
use App\Models\SanPham;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class HinhAnhController extends Controller
{
   public function getDanhSach($tensanpham_slug)
    {
        $sanpham = SanPham::Where('tensanpham_slug',$tensanpham_slug)->first();
        $hinhanh = HinhAnh::Where('sanpham_id', $sanpham->id)->get();

        return view('admin.hinhanh.danhsach', compact('hinhanh','sanpham'));
        
    }

    public function getThem($tensanpham_slug)
    {
        
        $sanpham = SanPham::Where('tensanpham_slug',$tensanpham_slug)->first();
        return view('admin.hinhanh.them', compact('sanpham'));
    }

    public function postThem(Request $request, $tensanpham_slug)
    {
        $this->validate($request, [
            'HinhAnh' => ['required'],
            'HinhAnh.*' => ['mimes:jpeg,png,jpg,gif,svg', 'image', 'max:1024']
        ],
        $messages = ['required' => 'Hình ảnh không được bỏ trống']);
       
        
        $sanpham = SanPham::Where('tensanpham_slug',$tensanpham_slug)->first();

        if($request->hasFile('HinhAnh')) 
        {
            $images = $request->file('HinhAnh');

            foreach($images as $image) 
            {
                // Xác định tên tập tin
                $extension = $image->getClientOriginalName();
                $filename = $tensanpham_slug. '-' . $extension; 
                
                // Upload vào thư mục và trả về đường dẫn
                $path = Storage::putFileAs('sanpham', $image, $filename);
             
                $img = new HinhAnh();
                $img->hinhanh = $path;
                $img->sanpham_id = $sanpham->id;      
                $img->save();
                
            }  
       
        }
       
        return redirect()->route('admin.hinhanh', $tensanpham_slug);
    }

    public function getSua($id)
    {
        
        $hinhanh = HinhAnh::find($id);
        $images = HinhAnh::Where('sanpham_id', $id)->get();
        $img = HinhAnh::Where('sanpham_id', $id)->first();

        return view('admin.hinhanh.sua', compact('hinhanh', 'images', 'img'));
    }

    public function postSua(Request $request, $id)
    {   
        $this->validate($request, [
            'HinhAnh' => ['required','mimes:jpeg,png,jpg,gif,svg', 'image', 'max:1024'],
           
        ],
        $messages = ['required' => 'Hình ảnh không được bỏ trống']);

        $hinhanh = HinhAnh::find($id);
        $sanpham = SanPham::where('id', $hinhanh->sanpham_id)->first();

        $hinhanh->delete();
        Storage::delete($hinhanh->hinhanh);

        $images = $request->file('HinhAnh');
        $extension = $images->getClientOriginalName();                
        $fileName = $sanpham->tensanpham_slug. '-' . $extension;
        $path = Storage::putFileAs('sanpham', $images, $fileName);

          
        $img = new HinhAnh();
        $img->hinhanh = $path;
        $img->sanpham_id = $sanpham->id;
        $img->save();
        

        return redirect()->route('admin.hinhanh', $sanpham->tensanpham_slug);
    }

    public function getXoa($id)
    {
        $orm = HinhAnh::find($id);
        $orm->delete();

        $sanpham = SanPham::Where('id',$orm->sanpham_id)->first();
        return redirect()->route('admin.hinhanh', $sanpham->tensanpham_slug);

    }
}
