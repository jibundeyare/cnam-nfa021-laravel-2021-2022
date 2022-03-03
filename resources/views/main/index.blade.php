<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- notre css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- notre js -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- 1ère colonne -->
            <div class="col-lg-5">
                <article>
                    <h2>Test</h2>
                    <p>
                        <img class="img-fluid" src="{{ asset('img/taylor-heery-pLQuWniq9kU-unsplash.jpg') }}" alt="">
                    </p>
                    <p>
                        Vous êtes sur la page de test.
                    </p>
                    <p>
                        {{ $message }}
                    </p>
                </article>
            </div>
            <!-- 2ème colonne -->
            <div class="col-lg-5">
                <article>
                    <h2>Test</h2>
                    <p>
                        <img class="img-fluid" src="{{ asset('img/taylor-heery-pLQuWniq9kU-unsplash.jpg') }}" alt="">
                    </p>
                    <p>
                        Vous êtes sur la page de test.
                    </p>
                    <p>
                        {{ $message }}
                    </p>
                </article>
            </div>
            <!-- 3ème colonne -->
            <div class="col-lg-2">
                <article>
                    <h2>Test</h2>
                    <p>
                        <img class="img-fluid" src="{{ asset('img/taylor-heery-pLQuWniq9kU-unsplash.jpg') }}" alt="">
                    </p>
                    <p>
                        Vous êtes sur la page de test.
                    </p>
                    <p>
                        {{ $message }}
                    </p>
                </article>
            </div>
        </div>
    </div>
</body>
</html>