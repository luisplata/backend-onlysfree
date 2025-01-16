<!DOCTYPE HTML>
<!--
 Editorial by HTML5 UP
 html5up.net | @ajlkn
 Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('CLAVE_DE_GOOGLE_ANALYTICS') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{ env('CLAVE_DE_GOOGLE_ANALYTICS') }}');

    </script>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="{{ url('') }}/assets/css/main.css?v{{ date('Ymdhs') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css?v<?= date('Ymdhs') ?>"
          rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">
            <!-- Header -->
            <header id="header">
                <h1><a href="{{ env('HOME') }}" class="logo"><strong>{{ env('APP_NAME') }}</strong></a></h1>
                <ul class="icons">
                    <li>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                            </svg>
                            Search
                        </button>
                    </li>
                    <li><a href="{{ env('TELEGRAM', '#') }}" target="_blank" class="icon brands fa-telegram"><span
                                    class="label">Telegram</span></a></li>
                    <li><a href="{{ env('DISCORD', '#') }}" target="_blank" class="icon brands fa-discord"><span
                                    class="label">Discord</span></a></li>
                    <li><a href="{{ env('REDDIT', '#') }}" target="_blank" class="icon brands fa-reddit"><span
                                    class="label">Reddit</span></a>
                    </li>

                    <li>
                        <div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input"
                                                                         id="darkMode"><label
                                    class="custom-control-label" for="darkMode">Dark Mode</label></div>
                    </li>

                </ul>
            </header>


            <!-- Content -->
            <section>
                <header class="main">
                    <h1>{{ $post->nombre }}</h1>
                </header>

                <h2>
                    @foreach ($tags as $tag)
                        <a class="badge bg-secondary" href="{{ env('HOME') }}search/{{$tag}}">{{$tag}}</a>
                    @endforeach
                </h2>

                <span class="image main">
                        @if($post->isVideo == "1")
                        <video src="{{ $post->url_video }}" muted autoplay loop></video>
                    @else
                        <img src="{{ $post->imagen }}" alt=""/>
                    @endif
                    </span>

                <ul class="actions fit">
                    <li><a target="_blank" href="{{ env('HOME') }}redirect/{{ $post->id }}"
                           class="button primary fit">{{ $post->NombreLink }}</a></li>
                </ul>

                <p>
                    {{ $post->NombreLink }} : <a target="_blank" href="{{ env('HOME') }}redirect/{{ $post->id }}"
                                                 class="primary">{{ env('HOME') }}redirection/{{ $post->nombre }}</a>
                </p>
            </section>
            <!-- Banner -->
            <section id="banner">
                <div class="row row-cols-2 row-cols-sm-3">
                    @foreach ($banners as $pack)
                        <div class="col">
                            <a href="{{ env('HOME') }}content/{{ $pack->ConvertNameNormalToUrl() }}">
                                <div class="card bg-dark text-center">
                                    <img src="{{ $pack->imagen }}" class="card-img">
                                    <div class="card-body">
                                        <p class="card-text"></p>
                                        <h2 class="card-title">{{ $pack->nombre }}</h2>
                                        <p></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

    <!-- Sidebar -->
    <div id="sidebar">
        <div class="inner">
            <!-- Section -->
            <section>
                <header class="major">
                    <h2>Hot Post</h2>
                </header>
                <div class="mini-posts">
                    @foreach ($hot as $pack)
                        <article>
                            <a href="{{ env('HOME') }}content/{{ $pack->ConvertNameNormalToUrl() }}">
                                <div class="card bg-dark text-white center">
                                    <img src="{{ $pack->imagen }}" class="card-img">
                                    <div class="card-img-overlay text-center">
                                        <h5 class="card-title">{{ $pack->nombre }}</h5>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </section>

            <section>
                <header class="major">
                    <h2>Popular Post</h2>
                </header>
                <div class="mini-posts">
                    @foreach ($popular as $pack)
                        <article>
                            <a href="{{ env('HOME') }}content/{{ $pack->ConvertNameNormalToUrl() }}">
                                <div class="card bg-dark text-white center">
                                    <img src="{{ $pack->imagen }}" class="card-img">
                                    <div class="card-img-overlay text-center">
                                        <h5 class="card-title">{{ $pack->nombre }}</h5>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </section>

            <section>
                <header class="major">
                    <h2>Tags</h2>
                </header>
                <div class="mini-posts">
                    <h2>
                        @foreach ($other as $o)
                            <a class="badge bg-secondary" href="{{ env('HOME') }}search/{{$o}}">{{$o}}</a>
                        @endforeach
                    </h2>
                </div>
            </section>
            <!-- Section -->
            <section>
                <header class="major">
                    <h2>Chanels</h2>
                </header>
                <ul class="contact">
                    <li class="icon brands fa-telegram"><a
                                href="{{ env('TELEGRAM', '#') }}">TELEGRAM</a></li>
                    <li class="icon brands fa-discord"><a
                                href="{{ env('DISCORD', '#') }}">DISCORD</a></li>
                    <li class="icon brands fa-reddit"><a
                                href="{{ env('REDDIT', '#') }}">REDDIT</a></li>
                </ul>
            </section>

            <section>
                <header class="major">
                    <h2>Tutorial</h2>
                </header>
                <ul class="contact">
                    <li class="icon solid fa-mobile-alt"><a
                                href="{{ env('TUTORIAL_MOVIL', '#') }}">FOR MOBILE</a></li>
                    <li class="icon solid fa-desktop"><a
                                href="{{ env('TUTORIAL_PC', '#') }}">FOR DESKTOP</a></li>
                </ul>
            </section>

            <!-- Footer -->
            <footer id="footer">
                <p class="copyright">&copy; {{ env('APP_NAME') }}.com</p>
            </footer>

        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <form id="form-search">
                    <div class="input-group">
                        <input type="text" id="search" class="form-control" placeholder="Input group example"
                               aria-label="Input group example" aria-describedby="btnGroupAddon2">
                        <button type="submit" class="input-group-text btn btn-secondary" id="search_button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    //variables iniciables
    let pagePrincipal = "{{url('')}}"
</script>
<script src="{{ url('') }}/assets/js/searchComponent.js?v<?=date('Ymd')?>"></script>
<!-- Scripts -->
<script src="{{url('')}}/assets/js/jquery-3.5.1.min.js"></script>
<script src="{{url('')}}/assets/js/browser.min.js"></script>
<script src="{{url('')}}/assets/js/breakpoints.min.js"></script>
<script src="{{url('')}}/assets/js/util.js"></script>
<script src="{{url('')}}/assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script src="{{ url('') }}/assets/js/DarkMode.js"></script>

</body>

</html>
