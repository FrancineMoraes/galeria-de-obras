<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $fillable = ['titulo', 'descricao', 'foto_id'];

    public function fotoObra(){
        return $this->hasOne('App\Foto');
    }
}
