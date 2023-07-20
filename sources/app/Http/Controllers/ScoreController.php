<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portofolio as PortofolioModel;
use Illuminate\Support\Facades\Crypt;
use Auth;

class ScoreController extends Controller
{
    public function index()
    {
        $data   = [
            'ppds'      => PortofolioModel::groupByPpdsId(Auth::user()->id)->with(['ppds'])->get(),
            'page'      => 'Data Nilai PPDS'
        ];

        return view('score.nilai_ppds', compact('data'));
    }

    public function ppds_portofolio($id)
    {
        $supervisor_id  = Auth::user()->id;
        $ppds_id        = Crypt::decryptString($id);

        $data   = [
            'stase'     => PortofolioModel::groupByStaseId($ppds_id)->with(['stase'])->get()
        ];

        return view('score.stase_ppds', compact('data'));
    }
}
