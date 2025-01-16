<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Stream;

class PPV extends Controller
{
    private function GetTags(){
        $post = Producto::all();
        $streams = Stream::all();

        $result = [];
        foreach ($post as $p){
            $tags = explode("-", $p->tags);
            foreach ($tags as $tag){
                $result[] = $tag;
            }
        }
        foreach ($streams as $p){
            $tags = explode("-", $p->tags);
            foreach ($tags as $tag){
                $result[] = $tag;
            }
        }
        return array_unique($result);
    }
    public function index()
    {
        return view("PPV.index", [
            "packs" => Stream::GetFirstStreams(),
            "other"=>$this->GetTags()
        ]);
    }

    public function show($id)
    {
        //desconvertir
        $id = str_replace("-", " ", $id);
        $id = trim($id);
        $stream = Stream::where("nombre", $id)->first();
        $stream->CreateLog();
        return view('client.stream', [
            "stream" => $stream,
            "streams" => Stream::GetFirstStreams(),
            "tags" => explode("-", $stream->tags),
            "other"=>$this->GetTags()
        ]);

    }

    public function RegisterVisit($id)
    {
        $stream = Stream::Find($id);
        $stream->CreateVisit();
    }

    public function search($work)
    {
        $post = Producto::whereRaw('LOWER(`tags`) like ?', ['%' . strtolower($work) . '%'])->get();
        $streams = Stream::whereRaw('LOWER(`tags`) like ?', ['%' . strtolower($work) . '%'])->get();
        $postName = Producto::whereRaw('LOWER(`nombre`) like ?', ['%' . strtolower($work) . '%'])->get();
        $streamsName = Stream::whereRaw('LOWER(`nombre`) like ?', ['%' . strtolower($work) . '%'])->get();
        return view('Search.Searching', [
            "posts" => $post,
            "postNames" => $postName,
            "streams" => $streams,
            "streamNames" => $streamsName,
            "other"=>$this->GetTags()
        ]);
    }
}
