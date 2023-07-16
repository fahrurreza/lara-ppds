<?php

namespace App\Http\Controllers;

use App\Models\Stase as StaseModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Toastr;

class StaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'stase'  => StaseModel::all(),
        ];
        return view('stase.index', compact('data'));
    }

    public function store(Request $request)
    {
        $insert_stase    =   DB::table('stp_stase')->insert([    
                                'stase_id'          => stase_id(),
                                'stase_name'        => $request->stase_name,
                                'score'             => $request->stase_score,
                                'semester'          => 1,
                                'status'            => 1,
                                'update_date'       => now(),
                                'update_id'         => null
                            ]);
        if($insert_stase){
            Toastr::success('Stase telah ditambahkan');
            return Redirect('stase');
        }else{
            Toastr::error('Stase gagal di insert');
            return Redirect('stase');
        }
    }

}