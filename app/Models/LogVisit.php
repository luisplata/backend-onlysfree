<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogVisit extends Model
{
    public function Post(){
        return $this->hasOne(Producto::class);
    }
}
