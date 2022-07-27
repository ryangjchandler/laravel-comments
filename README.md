# A dead-simple comments package for Laravel.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/laravel-comments.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/laravel-comments)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/laravel-comments/run-tests?label=tests)](https://github.com/ryangjchandler/laravel-comments/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/laravel-comments/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ryangjchandler/laravel-comments/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/laravel-comments.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/laravel-comments)

This package provides an incredibly simple comment system for your Laravel applications.

> If you're looking for a package with UI components, I highly recommend using [Spatie's `laravel-comments`](https://laravel-comments.com/) package which comes with Livewire support out of the box.

## Installation

You can install the package via Composer:

```bash
composer require ryangjchandler/laravel-comments
```

The package automatically registers migrations so there's no need to publish anything, just run them.

```
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="comments-config"
```

This is the contents of the published config file:

```php
return [

    'model' => \RyanChandler\Comments\Models\Comment::class,

    'user' => \App\Models\User::class,

];
```

## Usage

Start by using the `RyanChandler\Comments\Concerns\HasComments` trait on your model.

```php
use RyanChandler\Comments\Concerns\HasComments;

class Post extends Model
{
    use HasComments;
}
```

This trait adds a `comments(): MorphMany` relationship on your model. It also adds a new `comment()` method that can be used to quickly add a comment to your model.

```php
$post = Post::first();

$post->comment('Hello, world!');
```

By default, the package will use the authenticated user's ID as the "commentor". You can customise this by providing a custom `User` to the `comment()` method.

```php
$post->comment('Hello, world!', user: User::first());
```

The package also supports `parent -> children` relationships for comments. This means that a comment can `belongTo` another comment.

```php
$post->comment('Thanks for commenting!', parent: Comment::find(2));
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

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
