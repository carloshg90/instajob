<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'idRemitent','missatgeEnviat','zonaOferta', 'horariOferta','sectorOferta','cosOferta','nomReceptor',
    ];
}
