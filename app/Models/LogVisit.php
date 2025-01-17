<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogVisit extends Model
{
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
