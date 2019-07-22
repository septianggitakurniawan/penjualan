<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table ='barangs';
    protected $fillable = ['kodeBarang','namaBarang','stock','hargaJual','kategory'];
}
