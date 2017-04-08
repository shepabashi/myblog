<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {!! Html::style('css/normalize.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/styles.css') !!}
    @yield('stylesheet')

</head>
<body>
@include('layouts.admin_bar')

<header>
    <div class="container">
        <div class="header-title">しぇぱっちのブログ</div>
        <nav>
            <i class="fa fa-bars header-mobile-menu" aria-hidden="true"></i>
            <ul class="header-pc-menu">
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Categories</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Q&amp;A</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <section class="content">
        @yield('content')
    </section>
    <section class="sidebar">
        <div class="item">
            <div class="sidebar-heading">Menu1</div>
            <p>hello. hello. hello. hello. hello. hello. </p>
        </div>
        <div class="item">
            <div class="sidebar-heading">Menu2</div>
            <p>hello. hello. hello. hello. hello. hello. </p>
        </div>
        <div class="item">
            <div class="sidebar-heading">Menu3</div>
            <p>hello. hello. hello. hello. hello. hello. </p>
        </div>
    </section>
</div>

<footer>
    <div class="container">
        &copy; しぇぱっち
    </div>
</footer>

<!-- Scripts -->
{!! Html::script('js/script.js') !!}
@yield('scripts')
</body>
</html>
