<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

class ApiPortofolioController extends Controller
{
    public function path(Request $request)
    {
        $random = Str::random(8);
        $file = $request->file('photo');
        $filename = $random.'.'.$file->getClientOriginalExtension();
        
        $tujuan_upload = 'assets\ppds_path\posting';
        $file->move($tujuan_upload, $filename);

        return 'success';
    }
}
