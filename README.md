# DaisyUI Components - For the TALL stack

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mister-simon/daisy-components.svg?style=flat-square)](https://packagist.org/packages/mister-simon/daisy-components)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mister-simon/daisy-components/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mister-simon/daisy-components/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mister-simon/daisy-components/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mister-simon/daisy-components/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mister-simon/daisy-components.svg?style=flat-square)](https://packagist.org/packages/mister-simon/daisy-components)

This package provides a library of DaisyUI components from the DaisyUI docs, made with the TALL stack in mind.

## Installation

This package requires [DaisyUI](https://daisyui.com/), which in turn requires [TailwindCSS](https://tailwindcss.com/).

You can install the package via composer:

```bash
composer require mister-simon/daisy-components
```

- Follow setup [this Tailwind guide](https://tailwindcss.com/docs/guides/laravel).

- Then follow [installation instructions for DaisyUI](https://daisyui.com/docs/install/).

Allow tailwind to find package classes and add daisyui dependency:

```js
// tailwind.config.js
module.exports = {
    content: [
        "./vendor/mister-simon/daisy-components/src/**/*.php",
        "./vendor/mister-simon/daisy-components/resources/**/*.php"
    ],
    plugins: [require("daisyui")],
}
```

-------

You can publish the config file with:

```bash
php artisan vendor:publish --tag="daisy-components-config"
```

You can publish the components with:

```bash
php artisan vendor:publish --tag="daisy-components-views"
```

## Usage

```blade
<x-dc::alert>This is a DaisyUI alert. Fancy.</x-dc::alert>
```

If you would prefer a different namespace, that can be changed via the config.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Simon Wheelwright](https://github.com/mister-simon)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
