<?php

    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    use App\Models\Stase as StaseModel;
    use Illuminate\Support\Facades\Crypt;
    use App\Models\Portofolio as PortofolioModel;


    function stase_id()
    {
        $maxId = StaseModel::select('id')->max('id');

        $id=str_pad($maxId+1, 5, 0, STR_PAD_LEFT);
        $stase_id='STS'.$id;

        return $stase_id;
    }

    function cript($id)
    {
        $encrypted = Crypt::encryptString($id);

        return $encrypted;
    }

    function trx_id()
    {
        $maxId = PortofolioModel::select('id')->max('id');

        $id=str_pad($maxId+1, 6, 0, STR_PAD_LEFT);
        $year=date("Y");
        $month=date("m");
        $trx_id='TD'.'-'.date("m").'-'.date("Y").'-'.$id;

        return $trx_id;
    }