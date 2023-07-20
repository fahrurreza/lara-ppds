<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'trx_portofolio';
    public $timestamps = false;

    public function ppds() {
        return $this->belongsTo('App\Models\User', 'ppds_id', 'id');
    }

    public function supervisor() {
        return $this->belongsTo('App\Models\User', 'supervisor_id', 'id');
    }

    public function stase() {
        return $this->belongsTo('App\Models\Stase', 'stase_id', 'stase_id');
    }

    public function tindakan() {
        return $this->hasOne('App\Models\Tindakan', 'trx_id', 'trx_id');
    }

    public function path() {
        return $this->belongsTo('App\Models\Pathportofolio', 'trx_id', 'trx_id');
    }

    public function scopeGroupByPpdsId($query, $supervisor_id)
    {
        return $query->groupBy('ppds_id');
    }

    public function scopeGroupByStaseId($query, $ppds_id)
    {
        return $query->where('ppds_id', $ppds_id)->groupBy('stase_id');
    }
}
