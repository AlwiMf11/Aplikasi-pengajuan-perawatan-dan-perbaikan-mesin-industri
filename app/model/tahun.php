<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class tahun extends Model
{
    protected $table = 'tahun';
    
    protected $fillable = [
        'tahun', 'active'
    ];

    public function mesin()
    {
        return $this->hasMany('App\model\Mesin');
    }
}
