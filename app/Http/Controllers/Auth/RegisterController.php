<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255','regex:/(.*)@(mrbglobalbd|millwardbrown)\.com/i', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        $messages = [
            'name.required' => 'Họ và tên không được bỏ trống',
            'password.required' => 'Mật khẩu không được bỏ trống.',
            'email.required' => 'Địa chỉ Email không được bỏ trống.',
            'email.email' => 'Địa chỉ Email không  hợp lệ.',
            'password.min' => 'Mật khẩu tối thiểu 8 ký tự.',
            'email.unique' => 'Địa chỉ Email đã tồn tại.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => Str::before($data['email'], '@'),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function Register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect()->route('admin.home')->with('status', 'Bạn đã đăng ký tài khoản thành công');
    }
    
}