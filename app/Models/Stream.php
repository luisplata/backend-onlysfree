<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use HasFactory;

    public static function GetFirstStreams(){
        return Stream::where("estado","1")->where('publication_date', '<', date("Y-m-d H:i:s"))->orderBy('publication_date', 'desc')->paginate(12);
    }


    public function ConvertNameNormalToUrl(){
        return str_replace(" ", "-", $this->nombre);
    }
    public function Visitas(){
        return $this->hasOne(VisitStream::class);
    }
    public function LogVisitas(){
        return $this->hasMany(LogVisitStream::class);
    }

    public function CreateLog(){
        $log = new LogVisitStream();
        $log->stream_id = $this->id;
        $log->save();
    }

    public function CreateVisit(){
        $visita = $this->Visitas;
        if($visita == null){
            $visita = new VisitStream();
            $visita->stream_id = $this->id;
            $visita->save();
        }
        $visita->AddVisita();
    }
}
