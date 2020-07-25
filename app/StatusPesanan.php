<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPesanan extends Model
{
    protected $guarded = [];
    protected $table = 'status_pesanans';
    protected $primaryKey = 'id';

    public function pesanan(){
        return $this->hasMany('App\Pesanan', 'id');
    }
}
