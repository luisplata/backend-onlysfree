<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitStream extends Model
{
    use HasFactory;

    //
    public function Stream(){
        return $this->belongsTo(Stream::class);
    }

    public function AddVisita(){
        $this->visita++;
        $this->save();
    }
}
