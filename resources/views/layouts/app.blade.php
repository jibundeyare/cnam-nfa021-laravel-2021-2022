<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O'Buro - @yield('title')</title>
    @section('style')
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- mon css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @show

    @section('script')
    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- mon js -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @show
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">lien</a></li>
                <li><a href="#">lien</a></li>
                <li><a href="#">lien</a></li>
                <li><a href="#">lien</a></li>
            </ul>
        </nav>
    </header>

    @section('content')
    @show

    <footer>
        Copyright Foo bar baz 2022
    </footer>
</body>
</html>