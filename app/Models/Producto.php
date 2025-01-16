<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    use HasFactory;
    protected $hidden = ['hotLink','publication_date','created_at','updated_at','id','imagen','categorias_id','estado'];
    public function categoria() {
        return $this->belongsTo(Categoria::class,"categorias_id");
    }
    public static function PostOfBanner(){
        return Producto::where("estado","1")->where('publication_date', '<', date("Y-m-d H:i:s"))->limit(6)->orderBy('publication_date', 'desc')->get();
    }
    public static function PostOfHot(){
        return Producto::where('publication_date', '<', date("Y-m-d H:i:s"))->join('visit_posts', 'visit_posts.producto_id', '=', 'productos.id')->orderByRaw('(visit_posts.idoAlPack / visit_posts.visita)*100 desc')->limit(3)->get();
    }
    public static function PostOfPopular(){
        return Producto::where('publication_date', '<', date("Y-m-d H:i:s"))->join('visit_posts', 'visit_posts.producto_id', '=', 'productos.id')->orderBy('visit_posts.visita','desc')->limit(3)->get();
    }
    public static function PostOfPacks(){
        return Producto::where("estado","1")->where('publication_date', '<', date("Y-m-d H:i:s"))->orderBy('publication_date', 'desc')->paginate(10);
    }

    public static function GetGrafics(){
        $days = env("days_of_grafic",1);
        $sql = "select CAST(created_at AS DATE) as date_of_day, count(1) as count_of_day from `log_visits` where CAST(created_at AS DATE) = CAST(created_at AS DATE) and CAST(created_at AS DATE) > DATE_ADD(NOW(), INTERVAL -$days DAY) group by CAST(created_at AS DATE)";
        return $sql;
    }

    public static function TazaDeConvercion(){
        return "SELECT producto_id, visita, idoAlPack, ((idoAlPack/visita)*100) as porcentaje_efectividad FROM `visit_posts` v ORDER BY (idoAlPack/visita)*100  DESC LIMIT 10";
    }

    public static function VisitasPorClicks(){
        return "SELECT producto_id, visita, idoAlPack FROM `visit_posts` v ORDER BY visita  DESC LIMIT 10";
    }

    public function ConvertNameNormalToUrl(){
        return str_replace(" ", "-", $this->nombre);
    }
    public function Visitas(){
        return $this->hasOne(VisitPost::class);
    }
    public function LogVisitas(){
        return $this->hasMany(LogVisit::class);
    }
}
