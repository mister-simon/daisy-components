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

## Usage

For comprehensive examples of components' usage: [Daisy Components Example Project](https://github.com/mister-simon/daisy-components-project).

```blade
<x-dc-alert success>This is a DaisyUI alert. Fancy.</x-dc-alert>
```

If you would prefer a different namespace, that can be changed via the config.

### Overloading / proxied defaults

You may wish to extend this package's component classes, overriding props where necessary.

This is the approach taken to alias `<x-dc-button tag="a">` to `<x-dc-a>`. Check `src/Components/A.php`.

For example, the following will result in a compact-padded card with a large shadow by default when using `<x-app-card>`:

```php
// ... Other imports
use MisterSimon\DaisyComponents\Components\Card;

class AppCard extends Card
{
    public function render(): View|Closure|string
    {
        $this->compact ??= true;
        $this->bordered ??= true;
        $this->defaultAttributes['class'] .= ' shadow-xl';

        return parent::render();
    }
}
```

### Preparing for Production - Discarding Unused Components

There are some considerations to make when taking these components to production:

- Your Tailwind build removes styles that aren't used in your app.
- By adding the [content paths defined above](#installation), your build will include **all** components and related classes that this package aims to support.

For production use, consider the following steps:

- Remove any `"./vendor/mister-simon/daisy-components"` from your `tailwind.config.js`
- Publish component views, as described below
- Find all used components (if you use the default prefixed components then search `<x-dc-`)
  - Save the related component Class to your App directory, updating the namespace.
  - Consider saving the component class to `app/View/Components/Dc/<insert-component-name-here>.php` - `namespace App\View\Components\Dc;`
    - You can then replace `<x-dc-` with `<x-dc.` in your views.
- Delete any component views that aren't referenced in your App components
- Run your production build

As you continue to develop, be sure to keep an eye out for updates to this package to merge back into your App components. You also needn't worry about dealing with the above issue until

### Another Approach to Discarding Components

You might prefer to approach the above issue slightly differently by making use of tailwind safelists:

- Remove any `"./vendor/mister-simon/daisy-components"` from your `tailwind.config.js`
- Find all used components (if you use the default prefixed components then search `<x-dc-`)
  - Add component classes to your safelist:
    ```js
    safelist: [
        { pattern: /accordion(.*)/ },
    ]
    ```
  - Check the component view and class to ensure no classes are missed or mismatched from the component name. E.g. `glass` may be used on `button` elements, and button classes generally start with `btn-*`.


-------

You can publish the config file with:

```bash
php artisan vendor:publish --tag="daisy-components-config"
```

You can publish the components with:

```bash
php artisan vendor:publish --tag="daisy-components-views"
```


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

- [Simon W](https://github.com/mister-simon)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
