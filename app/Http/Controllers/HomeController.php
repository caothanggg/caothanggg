<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\SanPham;
use DB;
use App\Mail\DatHangEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\BinhLuan;
use App\Models\BaiViet;
use App\Models\ThuongHieu;
use App\Models\HinhAnh;
use App\Models\Ram;
use App\Models\BoNhoTrong;
use App\Models\ThietKe;
use App\Models\LoaiSanPham;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Models\PhuongThucThanhToan;
use Gloudemans\Shoppingcart\Facades\Cart;
class HomeController extends Controller
{
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
        public function getHome()
    {
    	
    	
       	 
       	 	 $sanpham = SanPham::select( 'sanpham.*',
        DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
        ->where('sanpham.hienthi',1)
        ->where('sanpham.soluong','>',0)
        ->paginate(9);

        return view('frontend.index', compact('sanpham'));
    	
        
       
    }
    public function getLienHe()
    {
        return view('frontend.lienhe');
    }
    public function getSearch(Request $request)
    {
          
        $sanpham = SanPham::select( 'sanpham.*',
        DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
        ->where('sanpham.hienthi',1)
        ->where('sanpham.soluong','>',0)
        ->where('sanpham.tensanpham','like', '%' . $request->key . '%')
        ->paginate(9);
        $session_title = $request->key;

        return view('frontend.thuonghieu', compact('sanpham','session_title'));

    }
            public function getSanPham()
    {
          
        $sanpham = SanPham::select( 'sanpham.*',
        DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
        
        ->where('sanpham.hienthi',1)
        ->where('sanpham.soluong','>',0)
        ->paginate(9);
          
        return view('frontend.thuonghieu', compact('sanpham'));

    }


        public function postSanPham(Request $request)
    {
        if($request->select1 == 'BUY')
        {
            $sanpham = SanPham::leftJoin('donhang_chitiet', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
                        ->select('sanpham.*',
                            DB::raw('sum(donhang_chitiet.soluongban) AS tongsoluongban'),
                            DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh')
                        )            
                        ->groupBy('sanpham.id')
                        ->orderBy('tongsoluongban', 'desc')
                        ->where('hienthi',1)
                        ->where('sanpham.soluong','>',0)
                        ->paginate(9);

            session()->put('select1', 'BUY');
        }
        elseif($request->select1 == 'NEW') 
        {
            $sanpham = SanPham::select( 'sanpham.*',DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
                    ->orderBy('created_at', 'desc')
                    ->where('hienthi',1)
                    ->where('sanpham.soluong','>',0)
                    ->paginate(9);

            session()->put('select1', 'NEW');
        }
        elseif($request->select1 == 'ASC') 
        {
            $sanpham = SanPham::select( 'sanpham.*',DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
                        ->orderBy('dongia', 'asc')
                        ->where('hienthi',1)
                        ->where('sanpham.soluong','>',0)
                        ->paginate(9);

            session()->put('select1', 'ASC');
        }  
        elseif($request->select1 == 'DESC') 
        {
            $sanpham = SanPham::select( 'sanpham.*',DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
                ->orderBy('dongia', 'desc')
                ->where('hienthi',1)
                ->where('sanpham.soluong','>',0)
                ->paginate(9);

            session()->put('select1', 'DESC');
        }      
        else 
        {
            $sanpham = SanPham::select( 'sanpham.*',DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
            ->where('hienthi',1)
            ->where('sanpham.soluong','>',0)
            ->paginate(9);


            session()->put('select1', 'default');
        }
        
        return view('frontend.sanpham', compact('sanpham'));
    }
    
    public function postTrang(Request $request)
    {
        if($request->select == '12')
        {
            $sanpham = SanPham::select( 'sanpham.*',
             DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
             ->where('sanpham.hienthi',1)
             ->where('sanpham.soluong','>',0)
             ->paginate(12);

            session()->put('select', '12');
        }
        elseif($request->select == '15') 
        {
            $sanpham = SanPham::select( 'sanpham.*',
             DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
             ->where('sanpham.hienthi',1)
             ->where('sanpham.soluong','>',0)
             ->paginate(15);

            session()->put('select', '15');
        }
        elseif($request->select == '18') 
        {
            $sanpham = SanPham::select( 'sanpham.*',
            DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
            ->where('sanpham.hienthi',1)
            ->where('sanpham.soluong','>',0)
            ->paginate(18);

            session()->put('select', '18');
        }
        elseif($request->select == '21') 
        {
            $sanpham = SanPham::select( 'sanpham.*',
             DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
             ->where('sanpham.hienthi',1)
             ->where('sanpham.soluong','>',0)
             ->paginate(21);   

            session()->put('select', '21');
        }
        else 
        {
            $sanpham = SanPham::select( 'sanpham.*',
             DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
             ->where('sanpham.hienthi',1)
             ->where('sanpham.soluong','>',0)
             ->paginate(9);
             
            session()->put('select', '9');
        }
        
        return view('frontend.sanpham', compact('sanpham'));
    }

    public function getSanPham_ChiTiet($tensanpham_slug)
    {
        $sanpham = SanPham::where('tensanpham_slug',$tensanpham_slug)->first();
        $hinhanh = HinhAnh::where('sanpham_id', $sanpham->id)->get();              

        return view('frontend.sanpham_chitiet',compact('sanpham','hinhanh'));
    }


            public function getDangKy()
         {
         return view('frontend.dangky');
         }
         
         public function getDangNhap()
         {
         return view('frontend.dangnhap');
         }

         public function getGioHang()
    {
        if(Cart::count() <= 0)
            return view('frontend.giohang_rong');
        else
            return view('frontend.giohang');
    }

    public function getGioHang_ThemChiTiet(Request $request, $tensanpham_slug)
    {
        $sanpham = SanPham::select( 'sanpham.*',
        DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
        ->where('tensanpham_slug', $tensanpham_slug)->first();

        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->tensanpham,
            'price' => $sanpham->dongia,
            'qty' => $request->quantity,
            'weight' => 0,
            'options' => [
                'image' => $sanpham->hinhanh
            ]
        ]);

        return redirect()->back();
    }

   

    public  function getBaiViet()
    {
        
        
            $baiviet = BaiViet::orderBy('created_at', 'desc')
            ->where([
                        ['hienthi',1],
                        ['kiemduyet', 1],
                    ])
            ->paginate(6);
          
            

            return view('frontend.baiviet',compact('baiviet'));
            
        
        
    }

    public function getBaiViet_ChiTiet($tieude_slug)
    {
        $baiviet = BaiViet::where('tieude_slug', $tieude_slug)->first();
        $binhluan = BinhLuan::where('baiviet_id', $baiviet->id)->where('hienthi', 1)->get();
        
        // C???p nh???t l?????t xem
        $idXem = 'BV' . $baiviet->id;
        if(!session()->has($idXem))
        {
            $orm = BaiViet::find($baiviet->id);
            $orm->LuotXem = $orm->luotxem + 1;
            $orm->save();
            session()->put($idXem, 1);
        }
        return view('frontend.baiviet_chitiet',compact('baiviet','binhluan'));
    }
    public function postBinhLuan(Request $request, $tieude_slug)
    {
        $this->validate($request, [
            'noidung' => ['required','string'],
        ],
        $messages = [
            'noidung.required' => 'N???i dung b??nh lu???n kh??ng ???????c b??? tr???ng.',
        ]);
        
        $baiviet = BaiViet::where('tieude_slug', $tieude_slug)->first();
        $binhluan = BinhLuan::where('baiviet_id', $baiviet->id)->where('hienthi', 1)->get();

        $orm = new BinhLuan();
        $orm->user_id = Auth::user()->id;
        $orm->baiviet_id = $baiviet->id;
        $orm->noidung = $request->noidung;
        $orm->save();
        session()->flash('success', 'B??nh lu???n c???a b???n ???? ???????c ghi nh???n');

        return view('frontend.baiviet_chitiet', compact('baiviet','binhluan'));
    }

    public function LayHinhDauTien($strNoiDung)
    {
        $first_img = "";
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strNoiDung, $matches);
        if(empty($output))
            return  env('APP_URL')."/public/image/noimage.png";
        else
            return $matches[1][0];
    }

    public function getGioHang_Xoa($row_id)
    {
        Cart::remove($row_id);
        return redirect()->route('frontend.giohang');
    }
    
    public function getGioHang_XoaTatCa()
    {
        Cart::destroy();
        return redirect()->route('frontend.giohang');
    }
    
    public function getGioHang_Giam($row_id)
    {
        $row = Cart::get($row_id);
        if($row->qty > 1)
        {
            Cart::update($row_id, $row->qty - 1);
        }
        return redirect()->route('frontend.giohang');
    }

    public function getGioHang_Tang($row_id)
    {
       $row = Cart::get($row_id);
        $sanpham = SanPham::find($row->id);

        if($row->qty < $sanpham->soluong )
        {
            Cart::update($row_id, $row->qty + 1);
            return redirect()->route('frontend.giohang');
        }
        else            
        return redirect()->route('frontend.giohang')->with("status",'S???n ph???m <strong>'.$sanpham->tensanpham. '</strong> ch??? c??n ' .$sanpham->soluong.'');
    }

         public function getGioHang_Them($tensanpham_slug)
    {
        //$sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();

        $sanpham = SanPham::select( 'sanpham.*',
        DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
        ->where('tensanpham_slug', $tensanpham_slug)->first();
        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->tensanpham,
            'price' => $sanpham->dongia,
            'qty' => 1,
            'weight' => 0,
            'options' => [
                'image' => $sanpham->hinhanh
            ]
        ]);

        return redirect()->route('frontend')->with('status', '???? th??m s???n ph???m v??o gi??? h??ng');
    }


    public function getDatHang()
    {
        if(!Auth::check())
            return redirect()->route('khachhang.dangnhap');
        else
        {
            $phuongthucthanhtoan=PhuongThucThanhToan::All();
            return view('frontend.dathang',compact('phuongthucthanhtoan'));
        }
    }

    public function postDatHang(Request $request)
    {
        $this->validate($request, [
            'diachigiaohang' => ['required', 'max:255'],
            'dienthoaigiaohang' => ['required','regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/','min:10','numeric'],
            'email' => ['required', 'string', 'email', 'max:255'],

        ],
        $messages = [
            'diachigiaohang.required' => '?????a ch??? giao h??ng kh??ng ???????c b??? tr???ng.',
            'dienthoaigiaohang.required' => '??i???n tho???i giao h??ng kh??ng ???????c b??? tr???ng.',
            'email.required' => '?????a ch??? email kh??ng ???????c b??? tr???ng.',
            'email.email' => '?????a ch??? email kh??ng kh??ng ????ng.',
            'dienthoaigiaohang.regex' => 'S??? ??i???n tho???i kh??ng ????ng.',
            'dienthoaigiaohang.min' => 'S??? ??i???n tho???i ph???i ????? 10 s???.',
            'dienthoaigiaohang.numeric' => 'S??? ??i???n tho???i ph???i l?? s???.',

        ]);
        
        // L??u v??o ????n h??ng
        $dh = new DonHang();    
        $dh -> user_id = Auth::user()->id;
        $dh -> tinhtrang_id = 1;
        $dh -> diachigiaohang = $request->diachigiaohang;
        $dh -> dienthoaigiaohang = $request->dienthoaigiaohang;
        $dh -> phuongthucthanhtoan_id = $request->phuongthucthanhtoan_id;
        
        $dh ->save();
    
        // L??u v??o ????n h??ng chi ti???t
        foreach(Cart::content() as $value)
        {
            $ct = new DonHang_ChiTiet();
            $ct->donhang_id = $dh->id;
            $ct->sanpham_id = $value->id;
            $ct->soluongban = $value->qty;
            $ct->dongiaban = $value->price;
            $ct->save();

            $sp = SanPham::find($value->id);
            $sp->soluong = $sp->soluong - $value->qty;
            $sp->save();
        }
       Mail::to(Auth::user()->email)->send(new DatHangEmail($dh));
        return redirect()->route('frontend.dathangthanhcong');

    }
    
    public function getDatHangThanhCong()
    {
        $cart = Cart::content();
        $cartsub = Cart::subtotal();
        $cartcount = Cart::count() ;
        // X??a gi??? h??ng khi ho??n t???t ?????t h??ng?
        Cart::destroy();
        
        return view('frontend.dathangthanhcong',compact('cart','cartsub','cartcount'));
    }

    public function getThuongHieu($all = '')
    {
        if($all == 'all')
        {
            $sanpham = SanPham::select( 'sanpham.*',
            DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
            ->where('sanpham.hienthi',1)
            ->paginate(9);
            $session_title = "Th????ng hi???u";
            return view('frontend.thuonghieu',compact('sanpham','session_title'));

        }
        else
        {
            $thuonghieu = ThuongHieu::where('tenthuonghieu_slug',$all)->first();
            $sanpham = SanPham::select( 'sanpham.*',
                DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
                ->where('sanpham.hienthi',1)->where('thuonghieu_id',$thuonghieu->id)
                ->paginate(9);
            $session_title = $thuonghieu->tenthuonghieu;
            return view('frontend.thuonghieu',compact('sanpham','session_title'));

        }
    }

        public function getLoaiSanPham($all = '')
        {
            if($all == 'all')
            {
                $sanpham = SanPham::select( 'sanpham.*',
                DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
                ->where('sanpham.hienthi',1)
                ->paginate(9);
                $session_title = "Lo???i";
                return view('frontend.loaisanpham',compact('sanpham','session_title'));

            }
            else
            {
                $loaisanpham = LoaiSanPham::where('tenloai_slug',$all)->first();
                $sanpham = SanPham::select( 'sanpham.*',
                    DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
                    ->where('sanpham.hienthi',1)->where('loaisanpham_id',$loaisanpham->id)
                    ->paginate(9);
                $session_title = $loaisanpham->tenloai;
                return view('frontend.loaisanpham',compact('sanpham','session_title'));

            }  
        }

        public function getRam($all = '')
        {
            if($all == 'all')
            {
                $sanpham = SanPham::select( 'sanpham.*',
                DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
                ->where('sanpham.hienthi',1)
                ->paginate(9);
                $session_title = "Ram";
                return view('frontend.ram',compact('sanpham','session_title'));

            }
            else
            {
                $ram = Ram::where('tenram_slug',$all)->first();
                $sanpham = SanPham::select( 'sanpham.*',
                    DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
                    ->where('sanpham.hienthi',1)->where('ram_id',$ram->id)
                    ->paginate(9);
                $session_title = $ram->tenram;
                return view('frontend.ram',compact('sanpham','session_title'));

            }    
            
        }

        public function getBoNhoTrong($all = '')
        {
            if($all == 'all')
            {
                $sanpham = SanPham::select( 'sanpham.*',
                DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
                ->where('sanpham.hienthi',1)
                ->paginate(9);
                $session_title = "B??? Nh??? Trong";
                return view('frontend.bonhotrong',compact('sanpham','session_title'));

            }
            else
            {
                $bonhotrong = BoNhoTrong::where('tenbonhotrong_slug',$all)->first();
                $sanpham = SanPham::select( 'sanpham.*',
                    DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
                    ->where('sanpham.hienthi',1)->where('bonhotrong_id',$bonhotrong->id)
                    ->paginate(9);
                $session_title = $bonhotrong->tenbonhotrong;
                return view('frontend.bonhotrong',compact('sanpham','session_title'));

            }
        }

         public function getThietKe($all = '')
        {
            if($all == 'all')
            {
                $sanpham = SanPham::select( 'sanpham.*',
                DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
                ->where('sanpham.hienthi',1)
                ->paginate(9);
                $session_title = "Thi???t K???";
                return view('frontend.thietke',compact('sanpham','session_title'));

            }
            else
            {
                $thietke = ThietKe::where('tenthietke_slug',$all)->first();
                $sanpham = SanPham::select( 'sanpham.*',
                    DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
                    ->where('sanpham.hienthi',1)->where('thietke_id',$thietke->id)
                    ->paginate(9);
                $session_title = $thietke->tenthietke;
                return view('frontend.thietke',compact('sanpham','session_title'));

            }
        }
}
