<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>設定画面</title>

    <!-- Styles -->
    {!! Html::style('css/normalize.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/control-panel.css') !!}


    @yield('stylesheet')

</head>
<body>

<header>設定</header>

<div class="container">
    <section class="menu">
        <h2>管理画面</h2>
        <ul>
            {!! autoActiveLink('/control-panel', 'ホーム', 'menu-selected') !!}
        </ul>

        <h2>記事</h2>
        <ul>
            {!! autoActiveLink('/control-panel/posts', '一覧', 'menu-selected') !!}
            {!! autoActiveLink('/control-panel/post/create', '新規追加', 'menu-selected') !!}
            {!! autoActiveLink('/control-panel/categories', 'カテゴリ', 'menu-selected') !!}
        </ul>

        <h2>メディア</h2>
        <ul>
            {!! autoActiveLink('/', 'アップロード', 'menu-selected') !!}
            {!! autoActiveLink('/', 'メディア一覧', 'menu-selected') !!}
        </ul>

        <h2>設定</h2>
        <ul>
            {!! autoActiveLink('/control-panel/blog-info', 'ブログの情報', 'menu-selected') !!}
            {!! autoActiveLink('/', '表示設定', 'menu-selected') !!}
            {!! autoActiveLink('/', 'プライバシー', 'menu-selected') !!}
        </ul>

    </section>
    <section class="content">
        @yield('content')
    </section>
</div>

<!-- Scripts -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
{!! Html::script('js/control-panel.js') !!}
@yield('scripts')
</body>
</html>
