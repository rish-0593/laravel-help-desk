## Installation

Manually add the service provider in your config/app.php file:

```php
'providers' => [
    // ...
    Rish0593\HelpDesk\HelpDeskServiceProvider::class,
]
```

Run the migration:

```bash
php artisan migrate
```

## License

This is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
