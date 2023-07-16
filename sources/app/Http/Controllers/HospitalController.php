<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital as HospitalModel;

class HospitalController extends Controller
{
    public function index()
    {
        $data = [
            'hospital'  => HospitalModel::all(),
        ];
        return view('hospital.index', compact('data'));
    }
}
