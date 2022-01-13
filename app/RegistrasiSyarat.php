<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrasiSyarat extends Model
{
    protected $guarded = [];

    
    public function registrasi()
    {
        return $this->belongsTo('App\Registrasi');
    }
}
