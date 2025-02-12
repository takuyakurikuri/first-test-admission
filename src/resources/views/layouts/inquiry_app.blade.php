<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    @yield('css')
</head>
<body>
    <header>
        <div class="header__inner">
            <a class="header__logo" href="/">FashionablyLate</a>
        </div>
        @yield('header-on')
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>