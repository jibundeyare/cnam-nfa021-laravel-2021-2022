# Projet de site web de restaurant

Projet de la formation du CNAM.

## Prérequis

- git
- php 7.3 ou plus
- composer
- mariadb et à un accès à une BDD

## Install

Dans un terminal, tapez :

```bash
git clone https://github.com/jibundeyare/cnam-nfa021-laravel-2021-2022.git
cd cnam-nfa021-laravel-2021-2022
# complétez le fichier ".env" avec les codes d'accès à la BDD
composer install
php artisan migrate
```

Si vous le souhaitez, vous pouvez aussi injecter des données de test :

```bash
php artisan db:seed --class=SqlFileSeeder
```

## Reset de la BDD

Attention : cette action supprime toutes les données existantes !

```bash
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
