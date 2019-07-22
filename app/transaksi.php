<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table ='transaksi';
    protected $fillable = ['kodeBarang','namaBarang','stock','hargaJual','kategory','nama','alamat'];
}
