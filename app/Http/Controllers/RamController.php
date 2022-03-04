<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ram;
use Str;

class RamController extends Controller
{
    public function getDanhSach()
	 {
	 		$ram = Ram::all();
	 		return view('admin.ram.danhsach', compact('ram'));
	 }

	 public function getThem()
    {
        return view('admin.ram.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tenram' => ['required', 'max:191', 'unique:ram'],
            ]);
        $orm = new Ram();
        $orm->tenram = $request->tenram;
        $orm->tenram_slug = Str::slug($request->tenram, '-');
        $orm->save();
        
        return redirect()->route('admin.ram');
    }

    public function getSua($id)
    {
        $ram = Ram::find($id);
        return view('admin.ram.sua', compact('ram'));
        
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tenram' => ['required', 'string','max:255' ,'unique:ram,tenram,' . $id],
           
        ]);
        $orm = Ram::find($id);
        $orm->tenram = $request->tenram;
        $orm->tenram_slug = Str::slug($request->tenram, '-');
        $orm->save();
        
        return redirect()->route('admin.ram');
    }
    public function getXoa($id)
    {
        $orm = Ram::find($id);
        $orm->delete();
        
        return redirect()->route('admin.ram');
    }
}
