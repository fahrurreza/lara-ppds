<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'stase_ppds';

    public function ppds() {
        return $this->belongsTo('App\Models\User', 'ppds_id', 'id');
    }
}
