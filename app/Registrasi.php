<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected  $guarded = [];

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
    public function mahasiswa()
    {
        return $this->belongsTo('\App\Mahasiswa');
    }
    
    public function syarat()
    {
        return $this->hasMany('App\RegistrasiSyarat');
    }
   
    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan');
    }
}
