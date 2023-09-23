<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <header>
    @include('blog.header')
    </header>
    <br>
    <div class="container">
    @yield('content')
</div>
    </div>
    <footer class="footer bg-dark  fixed-bottom">
        @include('blog.footer')
    </footer>
</body>
</html>