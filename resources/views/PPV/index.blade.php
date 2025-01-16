<!DOCTYPE HTML>
<!--
 Editorial by HTML5 UP
 html5up.net | @ajlkn
 Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="{{url('')}}/assets/css/main.css?v<?=date('Ymdhs')?>"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
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
                <h1><a href="{{ env('HOME') }}PPV" class="logo"><strong>{{ env('APP_ALTER_NAME') }}</strong></a></h1>

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
                    <li><a href="{{ env('HOME') }}" target="" class="logo"><span
                                    class="label">{{ env('APP_NAME') }}</span></a></li>
                    <li><a href="{{ env('TELEGRAM', '#') }}" target="_blank" class="icon brands fa-telegram"><span
                                    class="label">Telegram</span></a></li>
                    <li><a href="{{ env('DISCORD', '#') }}" target="_blank" class="icon brands fa-discord"><span
                                    class="label">Discord</span></a></li>
                    <li><a href="{{ env('REDDIT', '#') }}" target="_blank" class="icon brands fa-reddit"><span
                                    class="label">Reddit</span></a></li>

                    <li>
                        <div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input"
                                                                         id="darkMode"><label
                                    class="custom-control-label" for="darkMode">Dark Mode</label></div>
                    </li>

                </ul>
            </header>

            <!-- Section -->
            <section class="row">
                <div class="row row-cols-2 row-cols-sm-4" id="contentPacks">
                    @include('ScrollInfiniteStream')
                </div>
                <div class="row row-cols-1 row-cols-sm-4">
                    <div class="text-center col-12" id="cargando"><span class="h1">CARGANDO...</span></div>
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
                    <h2>Packs</h2>
                </header>
                <div class="mini-posts">
                    <article>
                        <a href="{{ env('HOME') }}" target="">
                            <div class="card bg-dark text-white center">
                                <img src="data:image/jpeg;base64,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"
                                     class="card-img">
                                <div class="card-img-overlay text-center">
                                    <h5 class="card-title">Streaming</h5>
                                </div>
                            </div>
                        </a>
                    </article>
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
                                href="{{ env('TELEGRAM', '#') }}">{{ env('TELEGRAM', 'TELEGRAM') }}</a></li>
                    <li class="icon brands fa-discord"><a
                                href="{{ env('DISCORD', '#') }}">{{ env('DISCORD', 'DISCORD') }}</a></li>
                    <li class="icon brands fa-reddit"><a
                                href="{{ env('REDDIT', '#') }}">{{ env('REDDIT', 'REDDIT') }}</a></li>
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
                <p class="copyright">&copy; {{ env('APP_NAME') }}</p>
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
                        <input type="text" id="search" class="form-control" name="" placeholder="Input group example"
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
<script>
    let pagina = 2
    const cargando = document.getElementById("cargando")
    let isLoad = false
    window.onscroll = () => {
        //console.log(window.innerHeight + window.pageYOffset + 20 , document.body.offsetHeight)
        if ((window.innerHeight + window.pageYOffset + 20) >= document.body.offsetHeight && !isLoad) {
            isLoad = true
            fetch('{{url('')}}/api/infiniteScrollStream?page=' + pagina, {
                method: 'get'
            })
                .then(response => response.text())
                .then(html => {
                    cargando.classList.add("d-none")
                    console.log(html != "")
                    document.getElementById("contentPacks").innerHTML += html
                    pagina++;
                    if (html != "") {
                        isLoad = false
                        cargando.classList.remove("d-none")
                    } else {
                        cargando.classList.add("d-none")
                    }
                })
                .catch(error => console.log(error))
        }
    }
</script>

</body>

</html>
