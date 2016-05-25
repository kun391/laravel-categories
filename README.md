# Laravel Categories

[![Latest Stable Version](https://poser.pugx.org/kun391/laravel-categories/v/stable)](https://packagist.org/packages/kun391/laravel-categories) [![Total Downloads](https://poser.pugx.org/kun391/laravel-categories/downloads)](https://packagist.org/packages/kun391/laravel-categories) [![Latest Unstable Version](https://poser.pugx.org/kun391/laravel-categories/v/unstable)](https://packagist.org/packages/kun391/laravel-categories) [![License](https://poser.pugx.org/kun391/laravel-categories/license)](https://packagist.org/packages/kun391/laravel-categories)

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
