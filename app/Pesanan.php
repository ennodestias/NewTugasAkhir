<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $guarded = [];
    protected $table = 'pesanans';
    protected $primaryKey = 'id';
    // protected $fillable = ['name'];

    public function customer(){
        return $this->belongsTo(Customer::class);
        // return $this->belongsTo('App\Customer', 'id');
    }
    public function paket(){
        // return $this->belongsTo('App\Paket','id','id') ;
        return $this->belongsTo(Paket::class);
    }
    public function statuspesanan(){
        // return $this->belongsTo('App\StatusPesanan', 'id');
        return $this->belongsTo(StatusPesanan::class);
    }
    public function statuspembayaran(){
        // return $this->belongsTo('App\StatusPembayaran', 'id');
        return $this->belongsTo(StatusPembayaran::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
        // return $this->belongsTo('App\Customer', 'id');
    }
}

