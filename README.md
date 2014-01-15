# Laravel Swagger

THIS IS AN ALPHA RELEASE, NOT INTENDED FOR PRODUCTION YET.

## Installation

### 1. Install with Composer
```bash
composer require domandtom/laravel-swagger dev-master
```

This will update `composer.json` and install it into the `vendor/` directory.

**Note:** `dev-master` is the latest development version.
See the [Packagist website][3] for a list of other versions.

### 2. Add to `app/config/app.php`
```php
    'providers' => array(
        // ...
        'DomAndTom\LaravelSwagger\LaravelSwaggerProvider',
    ),
```

## Usage


## Changelog
### 1.0.0alpha
* Initial release

## License
MIT License. See [LICENSE.txt][4].

[1]: http://www.domandtom.com/
[2]: https://github.com/domandtom/laravel-swagger
[3]: https://packagist.org/packages/domandtom/laravel-swagger
[4]: LICENSE.txt
