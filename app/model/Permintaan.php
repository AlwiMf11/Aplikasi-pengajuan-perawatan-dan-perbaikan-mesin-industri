<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $table = 'permintaan';
    protected $fillable = [
        'kd','divisi_id','mesin_id','user_id','judul','keterangan','status','tgl_permintaan','type'
    ];

    public function divisi()
    {
        return $this->belongsTo('App\model\Divisi');
    }
    public function mesin()
    {
        return $this->belongsTo('App\model\Mesin');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
