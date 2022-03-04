<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinhTrang;
use Str;

class TinhTrangController extends Controller
{
    public function getDanhSach()
	 {
	 		$tinhtrang = TinhTrang::all();
	 		return view('admin.tinhtrang.danhsach', compact('tinhtrang'));
	 }

	 public function getThem()
    {
        return view('admin.tinhtrang.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tentinhtrang' => ['required', 'max:191', 'unique:tinhtrang'],
            ]);
        $orm = new TinhTrang();
        $orm->tentinhtrang = $request->tentinhtrang;
        
        $orm->save();
        
        return redirect()->route('admin.tinhtrang');
    }

    public function getSua($id)
    {
        $tinhtrang = TinhTrang::find($id);
        return view('admin.tinhtrang.sua', compact('tinhtrang'));
        
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tentinhtrang' => ['required', 'string','max:255' ,'unique:tinhtrang,tentinhtrang,' . $id],
           
        ]);
        $orm = TinhTrang::find($id);
        $orm->tentinhtrang = $request->tentinhtrang;
        
        $orm->save();
        
        return redirect()->route('admin.tinhtrang');
    }
    public function getXoa($id)
    {
        $orm = TinhTrang::find($id);
        $orm->delete();
        
        return redirect()->route('admin.tinhtrang');
    }
}
