<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPembayaran extends Model
{
    protected $guarded = [];
    protected $table = 'status_pembayarans';
    protected $primaryKey = 'id';

    public function pesanan(){
        return $this->hasMany('App\Pesanan', 'id');
    }
}
