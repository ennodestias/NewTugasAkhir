<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $guarded = [];
    protected $table = 'karyawan';
    protected $primaryKey = 'id';
}
