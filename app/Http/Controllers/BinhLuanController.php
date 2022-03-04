<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use App\Models\BaiViet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BinhLuanController extends Controller
{
    public function getDanhSach()
    {
        $binhluan = BinhLuan::all();
        return view('admin.binhluan.danhsach', ['binhluan' => $binhluan]);
    }
    
    public function getThem()
    {
        $user = User::all();
        $baiviet = BaiViet::all();
        return view('admin.binhluan.them', compact('user', 'baiviet'));
    }
    
    public function postThem(Request $request)
    {
       
        $orm = new BinhLuan();
        $orm->user_id = Auth::User()->id;
        $orm->baiviet_id = $request->baiviet_id;
        $orm->noidung = $request->noidung;    
      //  $orm->hienthi = $request->hienthi;

        $orm->save();
        
        return redirect()->route('admin.binhluan');
    }
    
    public function getSua($id)
    {
        $binhluan = BinhLuan::find($id);
        $user = User::all();
        $baiviet = BaiViet::all();
        return view('admin.binhluan.sua', compact('binhluan', 'user', 'baiviet'));
    }
    
    public function postSua(Request $request, $id)
    {
         
        $orm = BinhLuan::find($id);
        $orm->user_id = Auth::User()->id;
        $orm->noidung = $request->noidung;    
      //  $orm->hienthi = $request->hienthi;

        $orm->save();
            
        return redirect()->route('admin.binhluan');
    }
    
    public function getXoa($id)
    {
        $orm = BinhLuan::find($id);
        $orm->delete();
 
        return redirect()->route('admin.binhluan');

    }

    public function getHienThi($id)
    {
        $orm = BinhLuan::find($id);
        $orm->hienthi = 1 - $orm->hienthi;
        
        $orm->save();
        return redirect()->route('admin.binhluan');

    }
}
