<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Validator;
use Toastr;
use DB;
use Hash;
use Auth;

class UserController extends Controller
{
    public function profile_ppds()
    {
        $data   = [
            'page'      => 'Data Profile PPDS',
            'ppds'      => UserModel::with(['update_name'])->where('user_level', 1)->get(),
        ];
        return view('user.profile_ppds', compact('data'));
    }

    public function profile_supervisor()
    {
        $data   = [
            'page'      => 'Data Profile Supervisor',
            'supervisor'      => UserModel::with(['update_name'])->where('user_level', 3)->get(),
        ];
        return view('user.profile_supervisor', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name'     => 'required',
            'phone'         => 'required',
            'gender'        => 'required',
            'email'         => 'required | unique:stp_user'
        ]);

        if ($validator->fails()) {
            Toastr::error('Register Gagal,'. $validator->messages());
            return \Redirect::back();
        } else {

            $insert =   DB::table('stp_user')->insert([
                            'user_name'     => $request->user_name,
                            'phone'         => $request->phone,
                            'gender'        => $request->gender,
                            'email'         => $request->email,
                            'password'      => Hash::make(123456),
                            'user_level'    => $request->user_level,
                            'status'        => 1,
                            'photo'         => null,
                            'update_date'   => now(), 
                            'update_id'     => Auth::user()->id,
                        ]);

            if($insert){
                Toastr::success('User berhasil di daftarkan. username adalah email, password : 123456');
                return \Redirect::back();
            }else{
                Toastr::error('Register Gagal');
                return \Redirect::back();
            }
        }
    }
}
