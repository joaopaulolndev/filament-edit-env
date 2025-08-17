# Package to edit env file

[![Latest Version on Packagist](https://img.shields.io/packagist/v/joaopaulolndev/filament-edit-env.svg?style=flat-square)](https://packagist.org/packages/joaopaulolndev/filament-edit-env)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/joaopaulolndev/filament-edit-env/run-tests.yml?branch=2.x&label=tests&style=flat-square)](https://github.com/joaopaulolndev/filament-edit-env/actions?query=workflow%3Arun-tests+branch%3A2.x)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/joaopaulolndev/filament-edit-env/fix-php-code-style-issues.yml?branch=2.x&label=code%20style&style=flat-square)](https://github.com/joaopaulolndev/filament-edit-env/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A2.x)
[![Total Downloads](https://img.shields.io/packagist/dt/joaopaulolndev/filament-edit-env.svg?style=flat-square)](https://packagist.org/packages/joaopaulolndev/filament-edit-env)



This is a plugin for FilamentPHP that, through an action, can edit the environment file.
> [!NOTE]
> There is a condition in the plugin that prevents it from being used in production!

<div class="filament-hidden">
    
![Screenshot of Application Feature](https://raw.githubusercontent.com/joaopaulolndev/filament-edit-env/2.x/art/joaopaulolndev-edit-env.jpg)

</div>

## Compatibility

| Package Version | Filament Version |
|-----------------|------------------|
| 1.x             | 3.x              |
| 2.x             | 4.x              |

## Installation

You can install the package via composer:

```bash
composer require joaopaulolndev/filament-edit-env:^2.0
```

## Usage

Add in AdminPanelProvider.php

```php
use Joaopaulolndev\FilamentEditEnv\FilamentEditEnvPlugin;

->plugins([
    FilamentEditEnvPlugin::make()
        ->showButton(fn () => auth()->user()->id === 1)
        ->setIcon('heroicon-o-cog'),
])
```

> [!NOTE]
> for the code editor field, I am using the plugin  [Filament Ace Editor](https://github.com/riodwanto/filament-ace-editor)

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [João Paulo Leite Nascimento](https://github.com/joaopaulolndev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
