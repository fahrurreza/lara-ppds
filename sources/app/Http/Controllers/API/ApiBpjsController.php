<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiBpjsController extends Controller
{
    public function antrean_harian(Request $request)
    {
        $url = 'https://apijkn.bpjs-kesehatan.go.id/antreanrs/antrean/pendaftaran/tanggal/2023-05-04';
        $method = 'GET';
        
        
        return accessApi($url, $method);
    }
}
