<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoNhoTrong;
use Str;
class BoNhoTrongController extends Controller
{
    public function getDanhSach()
	 {
	 		$bonhotrong = BoNhoTrong::all();
	 		return view('admin.bonhotrong.danhsach', compact('bonhotrong'));
	 }

	 public function getThem()
    {
        return view('admin.bonhotrong.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tenbonhotrong' => ['required', 'max:191', 'unique:bonhotrong'],
            ]);
        $orm = new BoNhoTrong();
        $orm->tenbonhotrong = $request->tenbonhotrong;
        $orm->tenbonhotrong_slug = Str::slug($request->tenbonhotrong, '-');
        $orm->save();
        
        return redirect()->route('admin.bonhotrong');
    }

    public function getSua($id)
    {
        $bonhotrong = BoNhoTrong::find($id);
        return view('admin.bonhotrong.sua', compact('bonhotrong'));
        
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tenbonhotrong' => ['required', 'string','max:255' ,'unique:bonhotrong,tenbonhotrong,' . $id],
           
        ]);
        $orm = BoNhoTrong::find($id);
        $orm->tenbonhotrong = $request->tenbonhotrong;
        $orm->tenbonhotrong_slug = Str::slug($request->tenbonhotrong, '-');
        $orm->save();
        
        return redirect()->route('admin.bonhotrong');
    }
    public function getXoa($id)
    {
        $orm = BoNhoTrong::find($id);
        $orm->delete();
        
        return redirect()->route('admin.bonhotrong');
    }
}
