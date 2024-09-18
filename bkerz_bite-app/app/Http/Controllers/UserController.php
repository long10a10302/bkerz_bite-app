<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    //
    public function register()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $rules = [
            'full_name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'phone_number' => 'nullable|string|regex:/^0[0-9]{9}$/|max:20',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required_with:password|same:password',
        ];

        $messages = [
            'full_name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email has already been taken',
            'phone_number.regex' => 'Phone number must start with 0 and have 10 digits',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Password confirmation does not match',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Tạo người dùng mới
        User::create(attributes: [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
        ]);

        // Chuyển hướng sau khi đăng ký thành công
        return redirect()->route('user.login')->with('success', 'Registration successful!');
    }

    public function login(){
        return view('users.login');
    }

    public function signin(Request $request){
        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];

        $messages = [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'password.required' => 'Password is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            // Nếu xác thực thành công, tái sinh phiên người dùng
            $request->session()->regenerate();
        
            // Lấy người dùng hiện tại
            $user = Auth::user();
        
            // Lưu ID người dùng vào phiên
            $request->session()->put('user_id', $user->id);
        
            // Điều hướng dựa trên vai trò của người dùng
            if ($user->role == 'admin') {
                return redirect()->route('admin')->with('logined', 'Đăng nhập thành công');
            }
            
            return redirect()->route('home')->with('logined', 'Đăng nhập thành công');
        } else {
            // Nếu xác thực thất bại, quay lại với lỗi và dữ liệu nhập
            return redirect()->back()
                ->withErrors(['email' => 'Invalid credentials'])
                ->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
