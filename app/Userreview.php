<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userreview extends Model
{
    protected $table='user_review';
    protected $fillable = [
        'order_id','barang_id','user_id','rating','review'
    ];
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'barang_id');
    }
     
     public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
