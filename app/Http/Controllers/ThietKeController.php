<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThietKe;
use Str;

class ThietKeController extends Controller
{
    public function getDanhSach()
	 {
	 		$thietke = ThietKe::all();
	 		return view('admin.thietke.danhsach', compact('thietke'));
	 }

	 public function getThem()
    {
        return view('admin.thietke.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tenthietke' => ['required', 'max:191', 'unique:thietke'],
            ]);
        $orm = new ThietKe();
        $orm->tenthietke = $request->tenthietke;
        $orm->tenthietke_slug = Str::slug($request->tenthietke, '-');
        $orm->save();
        
        return redirect()->route('admin.thietke');
    }

    public function getSua($id)
    {
        $thietke = ThietKe::find($id);
        return view('admin.thietke.sua', compact('thietke'));
        
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tenthietke' => ['required', 'string','max:255' ,'unique:thietke,tenthietke,' . $id],
           
        ]);
        $orm = ThietKe::find($id);
        $orm->tenthietke = $request->tenthietke;
        $orm->tenthietke_slug = Str::slug($request->tenthietke, '-');
        $orm->save();
        
        return redirect()->route('admin.thietke');
    }
    public function getXoa($id)
    {
        $orm = ThietKe::find($id);
        $orm->delete();
        
        return redirect()->route('admin.thietke');
    }
}
