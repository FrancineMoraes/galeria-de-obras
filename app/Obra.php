<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $fillable = ['titulo', 'descricao'];

    public function fotoObra(){
        return $this->hasOne('App\Foto');
    }
}
