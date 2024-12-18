<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Menu;
use App\Models\JenisUser;


class AuthController extends Controller
{
    // public function dashboard() {
    //     $menus = Menu::with('submenus')->where('delete_mark', '0')->get();
    //     return view('dashboard', compact('menus'));
    // }

    public function showLogin() {
        return view('auth.login'); 
    }

    public function showRegister() {
        $Roles = JenisUser::all();
        return view('auth.register',compact('Roles')); 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->id_jenis_user == 1){
                return redirect('/dashboard');
        }
        if(Auth::user()->id_jenis_user == 2){
            return redirect('/menu');
    }

        
        }
        
        
        // Jika autentikasi gagal
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    
    // public function register(Request $request)
    // {
    //     // Validasi input
    //     $validator = $request->validate([
    //         'nama_user' => 'required|string|max:60',
    //         'username' => 'required|string|unique:users|max:60',
    //         'password' => 'required|string|min:8',
    //         'email' => 'required|string|email|max:200|unique:users',
    //         'id_jenis_user' => 'required',
    //     ]);
        

    //     // // Jika validasi gagal, kembali ke form dengan pesan error
    //     // if ($validator->fails()) {
    //     //     return redirect()->back()
    //     //                     ->withErrors($validator)
    //     //                     ->withInput();
    //     // }

    //     // Buat user baru
    //     User::create([
    //         'nama_user' => $request->nama_user,
    //         'username' => $request->username,
    //         'password' => Hash::make($request->password),
    //         'email' => $request->email,
    //         'id_jenis_user' => $request->id_jenis_user, // Menyimpan jenis user
    //     ]);

    //     // Redirect ke halaman login setelah registrasi berhasil
    //     return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    // }

    // public function logout(Request $request) {
    //     // Cek apakah pengguna sudah login
    //     if (Auth::check()) {
    //         // Logout user
    //         Auth::logout();
    
    //         // Invalidate the session
    //         $request->session()->invalidate();
    
    //         // Regenerate session token to prevent CSRF attacks
    //         $request->session()->regenerateToken();
    
    //         // Redirect to the login page or homepage with a success message
    //         return redirect('/login')->with('status', 'You have been logged out successfully!');
    //     }
    
    //     // Jika tidak ada pengguna yang login, kembalikan dengan pesan error
    //     return redirect('/login')->with('error', 'No active session found!');
    // }
}
