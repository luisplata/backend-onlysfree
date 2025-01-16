@if (count($packs))
    @foreach ($packs as $pack)
    <div class="col">
        <a href="{{ env('HOME') }}content/{{ $pack->ConvertNameNormalToUrl() }}">
            <div class="card bg-dark text-center">
                @if($pack->isVideo == "1")
                <video class="card-img" src="{{ $pack->url_video }}" muted autoplay loop></video>
                @else
                <img src="{{ $pack->imagen }}" class="card-img">
                @endif
                <div class="card-body">
                    <p class="card-text"></p><h2 class="card-title">{{ $pack->nombre }}</h2><p></p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
@endif  