# Require Read/Agree to Terms on Form

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jt782/require-read-terms-php.svg?style=flat-square)](https://packagist.org/packages/jt782/require-read-terms-php)
[![Tests](https://github.com/jt782/require-read-terms-php/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/jt782/require-read-terms-php/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/jt782/require-read-terms-php.svg?style=flat-square)](https://packagist.org/packages/jt782/require-read-terms-php)

Display modal for "terms and conditions", and require user read (scroll to bottom) and agree to those terms before submitting form.

## Installation

You can install the package via composer:

```bash
composer require jt782/require-read-terms-php
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
2. You can modify the following values with these methods:
- Agree Button Text: ```$terms->agreeButtonText("Yes, I agree!")```
- Agree Button Color: ```$terms->agreeButtonColor("green")```
- Cancel Button Text: ```$terms->cancelButtonText("NO, this is dumb!")```
- Cancel Button Color: ```$terms->cancelButtonColor("red")```
3. Within the form, load content and display button:
```php
$terms->loadModalDisplayButton()
```
4. If you want more control of the placement of the button vs the script, you can load them separately:
- For button display:
```php
$terms->displayButton()
```
- For script output:
```php
$terms->loadScript()
```

##Example

```php
<?php
$terms = new FormTerms('test-form', '<p>Term content goes here</p>');
?>
<form id="test-form" method="get" action="/form">
    <?php
        $terms->loadModalDisplayButton();
    ?>

    <p>
        <button type="submit">Submit</button>
    </p>
</form>
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
