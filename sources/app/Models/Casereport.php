<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casereport extends Model
{
    protected $table = 'trx_case_report';

    public function portofolio() {
        return $this->belongsTo('App\Models\Portofolio', 'trx_id', 'trx_id');
    }

    public function path() {
        return $this->hasOne('App\Models\Pathportofolio', 'trx_id', 'trx_id');
    }
}
