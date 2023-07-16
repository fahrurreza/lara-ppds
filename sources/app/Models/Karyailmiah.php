<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyailmiah extends Model
{
    protected $table = 'trx_karya_ilmiah';

    public function portofolio() {
        return $this->belongsTo('App\Models\Portofolio', 'trx_id', 'trx_id');
    }

    public function path() {
        return $this->hasOne('App\Models\Pathportofolio', 'trx_id', 'trx_id');
    }
}
