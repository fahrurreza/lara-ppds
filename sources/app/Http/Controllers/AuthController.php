<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\Store as StoreModel;
use Toastr;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required']
        ]);

        $user = UserModel::where('email', $request->email)
                        ->where('user_level', 2)
                        ->orwhere('user_level', 4)
                        ->first();

        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                
                Auth::login($user);

                Toastr::success('Login berhasil!');
                
                return Redirect('dashboard');
            }
            else
            {
                Toastr::error('Username atau Password Salah');
                return \Redirect::back();
            }
        }
        else
        {
            Toastr::error('Maaf, Anda Tidak Memiliki akses atau akun anda belum aktif');
            return \Redirect::back();
        }
    }

    public function select_store()
    {
        $data['store'] = StoreModel::all();
        return view('auth.selectstore', compact('data'));
    }

    public function set_store(Request $request)
    {
        $store = StoreModel::where('store_id', $request->store_id)->first();
        session(['store' => $store], time() + 2629700);
        Toastr::success('Login berhasil!');
        return Redirect('dashboard');
    }

    public function change_password()
    {
        $data = [
            'page'  => 'Change Password',
        ];
        return view('user.change_password', compact('data'));
    }

    public function update_password(Request $request)
    {
        $user = UserModel::where('id', Auth::user()->id)
                        ->where('user_level', 1)
                        ->where('status', 1)
                        ->first();

        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                $data_update = [
                    'password' => Hash::make($request->password_update),
                ];
                
                $update = UserModel::where('id', Auth::user()->id)->update($data_update);

                Toastr::success('Password berhasil di update!');
                return Redirect('dashboard');
            }
            else
            {
                Toastr::error('Password salah atau akun anda bukan admin / belum aktif!');
                return \Redirect::back();
            }
        }
        else
        {
            Toastr::error('Password gagal update!');
            return \Redirect::back();
        }
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
