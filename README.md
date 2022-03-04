# Projet de site web de restaurant

Projet de la formation du CNAM.

## Install

Dans un terminal, tapez :

```bash
git clone https://github.com/jibundeyare/cnam-nfa021-laravel-2021-2022.git
cd cnam-nfa021-laravel-2021-2022
composer install
php artisan db:wipe
php artisan migrate
php artisan db:seed --class=SqlFileSeeder
```

## Utilisation

Dans un terminal, tapez :

```bash
php artisan serve
```

Dans votre navigateur, ouvrez l'url [http://127.0.0.1/](http://127.0.0.1/).


## Media

Photo by <a href="https://unsplash.com/@taylorheeryphoto?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Taylor Heery</a> on <a href="https://unsplash.com/?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
