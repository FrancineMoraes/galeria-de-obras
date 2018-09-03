<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'fotos_obras';

    protected $fillable = ['caminho'];

    public function obra(){
        return $this->belongsTo('App\Obra');
    }
}