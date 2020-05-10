<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomEmpresa','idEmpresa', 'sector','horari','zona','cos',
    ];
}
