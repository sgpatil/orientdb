
# Orientdb Driver for Laravel 4


Orientdb Graph Eloquent Driver for Laravel 4

## Quick Reference

 - [Installation](#installation)
 - [Configuration](#configuration)

## Installation

Add the package to your `composer.json` and run `composer update`.

```json
{
    "require": {
        "sgpatil/orientdb": "*"
    }
}
```

Add the service provider in `app/config/app.php`:

```php
'Sgpatil\Orientdb\OrientdbServiceProvider',
```

This will register all the required classes for this package.

## Configuration
