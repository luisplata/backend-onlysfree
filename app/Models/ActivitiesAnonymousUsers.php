<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivitiesAnonymousUsers extends Model
{
    protected $fillable = [
        'user_uuid', // Agregar este campo
        'page',      // Agregar otros campos si los tienes
        'data',  // Por ejemplo, si tienes un campo adicional para datos en JSON
    ];

}
