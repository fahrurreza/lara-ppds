<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Resources\ProductToStoreResource;
use App\Models\ProductToStore as ProductToStoreModel;
use App\Models\SellingInfo as SellingInfoModel;
use DB;

class BpjsController extends Controller
{
    public function antrean()
    {
        $url = 'https://apijkn.bpjs-kesehatan.go.id/antreanrs/antrean/pendaftaran/tanggal/2023-05-04';
        $method = 'GET';

        $response = accessApi($url, $method);
        $array_response = json_decode($response, true);

        $data_json = '{"nama": "John", "umur": 20, "alamat": "Jakarta"}';
        $data_array = json_decode($data_json, true);

        foreach($array_response as $list){
            echo $list->kodedokter;
        }

        $data = [
            'page'      => 'Antrean BPJS',
            'toko'      => 'RSU Royal Prima',
            'response'  => accessApi($url, $method)
        ];
        return view('bpjs.antrean_harian', compact('data'));
    }
}
