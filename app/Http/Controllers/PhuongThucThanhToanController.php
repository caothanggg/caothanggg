<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhuongThucThanhToan;
use Str;
class PhuongThucThanhToanController extends Controller
{
    public function getDanhSach()
	 {
	 		$phuongthucthanhtoan = PhuongThucThanhToan::all();
	 		return view('admin.phuongthucthanhtoan.danhsach', compact('phuongthucthanhtoan'));
	 }

	 public function getThem()
    {
        return view('admin.phuongthucthanhtoan.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tenphuongthucthanhtoan' => ['required', 'max:191', 'unique:phuongthucthanhtoan'],
            ]);
        $orm = new PhuongThucThanhToan();
        $orm->tenphuongthucthanhtoan = $request->tenphuongthucthanhtoan;
        $orm->tenphuongthucthanhtoan_slug = Str::slug($request->tenphuongthucthanhtoan, '-');
        $orm->save();
        
        return redirect()->route('admin.phuongthucthanhtoan');
    }

    public function getSua($id)
    {
        $phuongthucthanhtoan = PhuongThucThanhToan::find($id);
        return view('admin.phuongthucthanhtoan.sua', compact('phuongthucthanhtoan'));
        
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tenphuongthucthanhtoan' => ['required', 'string','max:255' ,'unique:phuongthucthanhtoan,tenphuongthucthanhtoan,' . $id],
           
        ]);
        $orm = PhuongThucThanhToan::find($id);
        $orm->tenphuongthucthanhtoan = $request->tenphuongthucthanhtoan;
        $orm->tenphuongthucthanhtoan_slug = Str::slug($request->tenphuongthucthanhtoan, '-');
        $orm->save();
        
        return redirect()->route('admin.phuongthucthanhtoan');
    }
    public function getXoa($id)
    {
        $orm = PhuongThucThanhToan::find($id);
        $orm->delete();
        
        return redirect()->route('admin.phuongthucthanhtoan');
    }
}
