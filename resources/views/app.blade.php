<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
 <div id="app">
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">

             </ul>
             <span class="navbar-text">
                <a href="mailto:echo.zahar@gmail.com">Echo Zahar</a>
            </span>
             <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                     <router-link class="nav-link" :to="{ name: 'categories.index' }">categories<span class="sr-only"></span></router-link>
                 </li>
                 <li class="nav-item">
                     <router-link class="nav-link" :to="{ name: 'posts.index' }">posts</router-link>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">добавлю авторизацию</a>
                 </li>
             </ul>
{{--             <form class="form-inline my-2 my-lg-0">--}}
{{--                 <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--             </form>--}}
         </div>
     </nav>
     <div class="container-fluid mt-5">
        <router-view></router-view>
     </div>
 </div>
 <footer class="footer mt-auto py-3">
     <div class="container" style="width: auto; max-width: 680px; padding: 0 15px;">
         <div class="row justify-content-center">
             <span class="text-muted">sticky footer.</span>
         </div>
     </div>
 </footer>
 <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
