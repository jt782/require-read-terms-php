
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Require Read/Agree to Terms on Form

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jt782/require-read-terms-php.svg?style=flat-square)](https://packagist.org/packages/jt782/require-read-terms-php)
[![Tests](https://github.com/jt782/require-read-terms-php/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/jt782/require-read-terms-php/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/jt782/require-read-terms-php.svg?style=flat-square)](https://packagist.org/packages/jt782/require-read-terms-php)

Display modal for "terms and conditions", and require user read (scroll to bottom) and agree to those terms before submitting form.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/require-read-terms-php.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/require-read-terms-php)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require jt782/require-read-terms-php

npm install
```

## Usage

1. Initialize class with form ID and terms content:

```php
use Seven82Media\RequireReadTerms\FormTerms;

$terms = new FormTerms(
    'id-of-form',
    '<p>terms go here</p>'
);
```

2. Within the form, load content and display button:

```php
$terms->loadModalDisplayButton()
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [John Todd](https://github.com/jt782)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
