
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
        "sgpatil/orientdb": "@dev"
    }
}
```

Add the service provider in `app/config/app.php`:

```php
'Sgpatil\Orientdb\OrientdbServiceProvider',
```

This will register all the required classes for this package.

## Database Configuration

Open `app/config/database.php`
make `orientdb` your default connection:

```php
'default' => 'orientdb',
```

Add the connection defaults:

```php
'connections' => [
    'orientdb' => [
        'driver' => 'orientdb',
        'host'   => 'localhost',
        'port'   => '2480',
        'database' => 'database',
        'username' => 'root',
        'password' => 'root'
    ]
]
```

Add your database username and password in 'username' and 'password' field
