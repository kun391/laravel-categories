# Laravel Categories

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]

This is a package use to management multiple categories for laravel.

## Install

Via Composer

``` bash
$ composer require kun391/laravel-categories
```

## Setup

Add the following to your composer.json file :
```
"require": {
    "kun391/laravel-categories": "dev-master",
},
```

Then register service provider with in config/app.php:
```
'providers' => [
    ...
    'Kun\Categories\CategoriesServiceProvider::class',
]
```
Finally, you should run the command to publish assets of the package.

```
php artisan vendor:publish --tag=public --force
```

## Customize

In this package, I used the [Forms & HTML](https://laravelcollective.com/docs/5.2/html). If you change the alias of this one. You should publish file config and modify it.

```
php artisan vendor:publish --tag=config
```

then

```
return [
    'providers' => [
        'Collective\Html\HtmlServiceProvider'
    ],
    'aliases' => [
        'form' => [
            'alias_name' => 'Form',
            'alias' => 'Collective\Html\FormFacade'
        ],
        'html' => [
            'alias_name' => 'Html',
            'alias' => 'Collective\Html\HtmlFacade'
        ],
    ]
];
```

If you want to custom views or translations, you can publish views/translations.

```
php artisan vendor:publish --tag=views
php artisan vendor:publish --tag=translations
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/:vendor/:package_name
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/:vendor/:package_name
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
