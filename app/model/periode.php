<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class periode extends Model
{
    protected $table = 'periode';
    
    protected $fillable = [
        'tahun', 'active'
    ];

    public function mesin()
    {
        return $this->hasMany('App\model\Mesin');
    }

}
