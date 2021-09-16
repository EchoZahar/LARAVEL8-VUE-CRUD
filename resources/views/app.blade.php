<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div id="app">
{{--    <div class="container-fluid">--}}
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">logo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarScroll" aria-controls="navbarScroll"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav mr-auto" style="max-height: 100px;">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">перезагрузить</a>
                        </li>

                    </ul>
                    <span class="navbar-text">
                    <a href="mailto:echo.zahar@gmail.com">Echo Zahar</a>
                </span>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name: 'categories.index'}">категорий</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name: 'posts.index'}">все посты</router-link>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">sign in</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">регистрация</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                auth user
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    выйти
                                </a>

                                <form id="logout-form" action="#" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <router-view></router-view>
{{--    </div>--}}
</div>
<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">footer</span>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
