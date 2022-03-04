<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BaiViet;
use Str;
use Illuminate\Support\Facades\Auth;
class BaiVietController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getDanhSach()
    {
        $baiviet = BaiViet::all();
        return view('admin.baiviet.danhsach', ['baiviet' => $baiviet]);
    }
    
    public function getThem()
    {
        $user = User::all();
        return view('admin.baiviet.them', compact('user'));
    }
    
    public function postThem(Request $request)
    {
        $request->validate([
          
            'tieude' => ['required', 'string' ],
            'tomtat' => ['required', 'string'],
            'noidung' => ['required', 'string'],
           
        ]);
        
        $orm = new BaiViet();
        $orm->user_id = Auth::user()->id;
        $orm->tieude = $request->tieude;
        $orm->tieude_slug = Str::slug($request->tieude, '-');
        $orm->tomtat = $request->tomtat;
        $orm->noidung = $request->noidung;  
        $orm->luotxem = 0;
     //   $orm->luotxem = $request->luotxem;
     //   $orm->kiemduyet = $request->kiemduyet;  
      //  $orm->hienthi = $request->hienthi;
        $orm->save();
        
        return redirect()->route('admin.baiviet');
    }
    
    public function getSua($id)
    {
        $baiviet = BaiViet::find($id);
        $user = User::all();
        return view('admin.baiviet.sua', compact('baiviet', 'user'));
    }
    
    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tieude' => ['required', 'string' ,'unique:baiviet,tieude,' . $id],
            'tomtat' => ['required', 'string' ,'unique:baiviet,tomtat,' . $id],
            'noidung' => ['required', 'string' ,'unique:baiviet,noidung,' . $id],
        ]);
            
        $orm = BaiViet::find($id);
        $orm->user_id = Auth::user()->id;
        $orm->tieude = $request->tieude;
        $orm->tieude_slug = Str::slug($request->tieude, '-');
        $orm->tomtat = $request->tomtat;
        $orm->noidung = $request->noidung;  
        $orm->save();
            
        return redirect()->route('admin.baiviet');
    }
    
    public function getXoa($id)
    {
        $orm = BaiViet::find($id);
        $orm->delete();
 
        return redirect()->route('admin.baiviet');

    }

    public function getOnOff($id)
    {
        $orm = BaiViet::find($id);
        $orm->kiemduyet = 1 - $orm->kiemduyet;
        
        $orm->save();
        return redirect()->route('admin.baiviet');

    }

    public function getHienThi($id)
    {
        $orm = BaiViet::find($id);
        $orm->hienthi = 1 - $orm->hienthi;
        
        $orm->save();
        return redirect()->route('admin.baiviet');

    }

    public function getBinhLuan($id)
    {
        $orm = BaiViet::find($id);
        $orm->binhluan = 1 - $orm->binhluan;
        
        $orm->save();
        return redirect()->route('admin.baiviet');

    }
}
