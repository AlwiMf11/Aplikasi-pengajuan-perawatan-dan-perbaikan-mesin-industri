<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    protected $table = 'mesin';
    protected $fillable = [
        'kd', 'nama','merk','kapasitas','divisi_id','periode_id','tahun_id','tahun_pembuatan','periode_pakai','active'
    ];
    
    public function permintaan()
    {
        return $this->hasMany('App\model\Permintaan');
    }

    public function divisi()
    {
        return $this->belongsTo('App\model\Divisi');
    }
    public function tahun()
    {
        return $this->belongsTo('App\model\Tahun');
    }
    public function periode()
    {
        return $this->belongsTo('App\model\Periode');
    }
    
}
