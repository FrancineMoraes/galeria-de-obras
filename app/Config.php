<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['titulo', 'sub', 'biografia'];

    protected $table = 'config';
}
