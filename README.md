# Guide Réglementaire du Scoutisme Français

## Conditions techniques requises

* PHP 8
* grep (Bash)

## Développement

### Serveur interne de PHP

```shell
$ php -S localhost:8000 -t web/
```

URL : http://localhost:8000/

### Docker

```shell
$ docker build -t guidesf .
$ docker run -v $(pwd):/app --rm -p 8000:8000 --name guidesf guidesf
```

URL : http://localhost:8000/

## Style

Framework utilisé : Bootstrap 5

```shell
$ sass assets/scss/style.scss web/css/style.min.css --style compressed
```