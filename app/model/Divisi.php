<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{

    protected $table = 'divisi';
    
    protected $fillable = [
        'nama', 'active'
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }
    public function mesin()
    {
        return $this->hasMany('App\model\Mesin');
    }
    
    public function permintaan()
    {
        return $this->hasMany('App\model\Permintaan');
    }
}
