@if (count($packs))
    @foreach ($packs as $stream)
        <div class="col">
            <a href="{{ env('HOME') }}PPV/{{ $stream->ConvertNameNormalToUrl() }}">
                <div class="card bg-dark text-center footer-widget">
                    <img src="{{ $stream->imagen }}" class="card-img">
                    <div class="card-body">
                        <p class="card-text"></p><h2 class="card-title">{{ $stream->nombre }}</h2><p></p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@endif  