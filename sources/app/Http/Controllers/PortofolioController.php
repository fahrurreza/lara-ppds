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
use Str;
use DB;
use Auth;
use Toastr;

class PortofolioController extends Controller
{
    public function tindakan()
    {
        $data = [
            'supervisor'    => UserModel::where('user_level', 3)->get(),
            'ppds'          => UserModel::where('user_level', 1)->get(),
            'hospital'      => HospitalModel::all(),
            'stase'         => StaseModel::all(),
            'trx_id'        =>  trx_id(),
            'page'          => 'Portofolio Pelayanan/Tindakan',
            'portofolio'    => PortofolioModel::with(['path', 'ppds', 'supervisor', 'tindakan', 'revision'])->where('portofolio_id', 1)->orderBy('create_date', 'desc')->get()
        ];


        return view('portofolio.tindakan', compact('data'));
    }

    public function case_report()
    {
        $data = [
            'supervisor'    => UserModel::where('user_level', 3)->get(),
            'ppds'          => UserModel::where('user_level', 1)->get(),
            'trx_id'        =>  trx_id(),
            'stase'         => StaseModel::all(),
            'page'          => 'Portofolio Case Report',
            'portofolio'    => PortofolioModel::with(['path', 'ppds', 'supervisor', 'case_report', 'revision'])->where('portofolio_id', 2)->get()
        ];
        return view('portofolio.casereport', compact('data'));
    }

    public function karya_ilmiah()
    {
        $data = [
            'supervisor'    => UserModel::where('user_level', 3)->get(),
            'ppds'          => UserModel::where('user_level', 1)->get(),
            'trx_id'        => trx_id(),
            'stase'         => StaseModel::all(),
            'page'          => 'Portofolio Karya Ilmiah',
            'portofolio'    => PortofolioModel::with(['path', 'ppds', 'supervisor', 'karya', 'revision'])->where('portofolio_id', 3)->get()
        ];
        return view('portofolio.karyailmiah', compact('data'));
    }

    public function extrakulikuler()
    {
        $data = [
            'trx_id'        => trx_id(),
            'supervisor'    => UserModel::where('user_level', 3)->get(),
            'ppds'          => UserModel::where('user_level', 1)->get(),
            'stase'         => StaseModel::all(),
            'page'          => 'Portofolio Extrakulikuler',
            'portofolio'    => PortofolioModel::with(['path', 'ppds', 'supervisor', 'extrakulikuler', 'revision'])->where('portofolio_id', 4)->get()
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

    public function revision_portofolio(Request $request)
    {
        
        DB::beginTransaction();
        try {
            PortofolioModel::where('trx_id', $request->trx_id)->update(['status' => 2]);

            DB::table('portofolio_revision')->insert([
                'trx_id'        => $request->trx_id,
                'note'          => $request->note,
                'create_date'   => now(),
                'create_id'     => Auth::user()->id,
            ]);

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function post_tindakan(Request $request)
    {

        DB::beginTransaction();

        try {
                $trx_id = trx_id();

                $insert_portofolio  =   DB::table('trx_portofolio')->insert([
                                        'portofolio_id'     => 1,
                                        'trx_id'            => $trx_id,
                                        'stase_id'          => $request->stase_id,
                                        'supervisor_id'     => $request->supervisor_id,
                                        'ppds_id'           => $request->ppds_id,
                                        'status'            => 1,
                                        'create_date'       => now(),
                                        'create_id'         => Auth::user()->id
                                        ]);

                
                $insert_tindakan    =   DB::table('trx_tindakan')->insert([
                                        'trx_id'            => $trx_id,
                                        'stase_id'          => $request->stase_id,
                                        'hospital_id'       => $request->hospital_id,
                                        'description'       => $request->description
                                        ]);

                // PROSES FILE UPLOAD

                $random = Str::random(8);
                $file = $request->file('photo');
                $filename = $random.'.'.$file->getClientOriginalExtension();
                
                $tujuan_upload = '../assets/ppds_path/posting';
                $file->move($tujuan_upload, $filename);

                $insert_path        =   DB::table('path_portofolio')->insert([
                                        'trx_id'            => $trx_id,
                                        'path'              => $filename
                                        ]);

                DB::commit();

                Toastr::success('Portofolio berhasil disimpan di nomor '. $trx_id);
                return Redirect('trx-tindakan');
        
        } catch (Exception $e) {
            DB::rollback();
            Toastr::error('Portofolio di posting, silahkan coba lagi');
            return \Redirect::back();
        }
        
    }

    public function post_case_report(Request $request)
    {

        DB::beginTransaction();
        
        try {
                $trx_id = trx_id();

                $insert_portofolio      =   DB::table('trx_portofolio')->insert([
                                            'portofolio_id'     => 2,
                                            'trx_id'            => $trx_id,
                                            'stase_id'          => $request->stase_id,
                                            'supervisor_id'     => $request->supervisor_id,
                                            'ppds_id'           => $request->ppds_id,
                                            'status'            => 1,
                                            'create_date'       => now(),
                                            'create_id'         => Auth::user()->id
                                            ]);

                
                $insert_case_report     =   DB::table('trx_case_report')->insert([
                                            'trx_id'            => $trx_id,
                                            'presenter'         => $request->presenter,
                                            'description'       => $request->description
                                            ]);

                // PROSES FILE UPLOAD

                $random = Str::random(8);
                $file = $request->file('photo');
                $filename = $random.'.'.$file->getClientOriginalExtension();
                
                $tujuan_upload = '../assets/ppds_path/posting';
                $file->move($tujuan_upload, $filename);

                $insert_path            =   DB::table('path_portofolio')->insert([
                                            'trx_id'            => $trx_id,
                                            'path'              => $filename
                                            ]);

                DB::commit();

                Toastr::success('Portofolio berhasil disimpan di nomor '. $trx_id);
                return \Redirect::back();
        
        } catch (Exception $e) {
            DB::rollback();
            Toastr::error('Portofolio di posting, silahkan coba lagi');
            return \Redirect::back();
        }

            

    }

    public function post_karya(Request $request)
    {

        DB::beginTransaction();
        
        try {
                $trx_id = trx_id();

                $insert_portofolio      =   DB::table('trx_portofolio')->insert([
                                            'portofolio_id'     => 3,
                                            'trx_id'            => $trx_id,
                                            'stase_id'          => $request->stase_id,
                                            'supervisor_id'     => $request->supervisor_id,
                                            'ppds_id'           => $request->ppds_id,
                                            'status'            => 1,
                                            'create_date'       => now(),
                                            'create_id'         => Auth::user()->id
                                            ]);

                
                $insert_case_report     =   DB::table('trx_karya_ilmiah')->insert([
                                            'trx_id'            => $trx_id,
                                            'jenis_karya'       => $request->jenis_karya_ilmiah,
                                            'judul'             => $request->judul,
                                            'description'       => $request->description
                                            ]);

                // PROSES FILE UPLOAD

                $random = Str::random(8);
                $file = $request->file('file');
                $filename = $random.'.'.$file->getClientOriginalExtension();
                
                $tujuan_upload = '../assets/ppds_path/posting';
                $file->move($tujuan_upload, $filename);

                $insert_path            =   DB::table('path_portofolio')->insert([
                                            'trx_id'            => $trx_id,
                                            'path'              => $filename
                                            ]);

                DB::commit();

                Toastr::success('Portofolio berhasil disimpan di nomor '. $trx_id);
                return \Redirect::back();
        
        } catch (Exception $e) {
            DB::rollback();
            Toastr::error('Portofolio gagal di posting, silahkan coba lagi');
            return \Redirect::back();
        }

            

    }

    public function post_extrakulikuler(Request $request)
    {

        DB::beginTransaction();
        
        try {
                $trx_id = trx_id();

                $insert_portofolio      =   DB::table('trx_portofolio')->insert([
                                            'portofolio_id'     => 4,
                                            'trx_id'            => $trx_id,
                                            'stase_id'          => $request->stase_id,
                                            'supervisor_id'     => $request->supervisor_id,
                                            'ppds_id'           => $request->ppds_id,
                                            'status'            => 1,
                                            'create_date'       => now(),
                                            'create_id'         => Auth::user()->id
                                            ]);

                
                $insert_extrakulikuler  =   DB::table('trx_extrakulikuler')->insert([
                                            'trx_id'            => $trx_id,
                                            'description'       => $request->description
                                            ]);

                // PROSES FILE UPLOAD

                $random = Str::random(8);
                $file = $request->file('photo');
                $filename = $random.'.'.$file->getClientOriginalExtension();
                
                $tujuan_upload = '../assets/ppds_path/posting';
                $file->move($tujuan_upload, $filename);

                $insert_path            =   DB::table('path_portofolio')->insert([
                                            'trx_id'            => $trx_id,
                                            'path'              => $filename
                                            ]);

                DB::commit();

                Toastr::success('Portofolio berhasil disimpan di nomor '. $trx_id);
                return \Redirect::back();
        
        } catch (Exception $e) {
            DB::rollback();
            Toastr::error('Portofolio gagal di posting, silahkan coba lagi');
            return \Redirect::back();
        }

            

    }
}
