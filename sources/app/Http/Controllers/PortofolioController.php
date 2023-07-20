<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Portofolio as PortofolioModel;
use App\Models\Tindakan as TindakanModel;
use App\Models\Casereport as CasereportModel;
use App\Models\Karyailmiah as KaryailmiahModel;
use App\Models\Extrakulikuler as ExtrakulikulerModel;
use App\Models\User as UserModel;
use App\Models\Hospital as HospitalModel;
use App\Models\Stase as StaseModel;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function tindakan()
    {
        $data = [
            'supervisor'    => UserModel::where('user_level', 3)->get(),
            'hospital'      => HospitalModel::all(),
            'stase'         => StaseModel::all(),
            'trx_id'        =>  trx_id(),
            'page'          => 'Portofolio Pelayanan/Tindakan',
            'portofolio'    => PortofolioModel::with(['path', 'ppds', 'supervisor', 'tindakan'])->where('portofolio_id', 1)->get()
        ];
        return view('portofolio.tindakan', compact('data'));
    }

    public function case_report()
    {
        $data = [
            'supervisor'    => UserModel::where('user_level', 3)->get(),
            'trx_id'        =>  trx_id(),
            'stase'         => StaseModel::all(),
            'page'          => 'Portofolio Case Report',
            'portofolio'    => PortofolioModel::with(['path', 'ppds', 'supervisor'])->where('portofolio_id', 2)->get()
        ];
        return view('portofolio.casereport', compact('data'));
    }

    public function karya_ilmiah()
    {
        $data = [
            'supervisor'    => UserModel::where('user_level', 3)->get(),
            'trx_id'        => trx_id(),
            'stase'         => StaseModel::all(),
            'page'          => 'Portofolio Karya Ilmiah',
            'portofolio'    => PortofolioModel::with(['path', 'ppds', 'supervisor'])->where('portofolio_id', 3)->get()
        ];
        return view('portofolio.karyailmiah', compact('data'));
    }

    public function extrakulikuler()
    {
        $data = [
            'trx_id'        => trx_id(),
            'supervisor'    => UserModel::where('user_level', 3)->get(),
            'stase'         => StaseModel::all(),
            'page'          => 'Portofolio Extrakulikuler',
            'portofolio'    => PortofolioModel::with(['path', 'ppds', 'supervisor'])->where('portofolio_id', 4)->get()
        ];
        return view('portofolio.extrakulikuler', compact('data'));
    }

    public function approve_portofolio(Request $request)
    {
        $update = PortofolioModel::where('trx_id', $request->trx_id)->update(['status' => 4]);

        if($update)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
