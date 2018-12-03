[![Maintainability](https://api.codeclimate.com/v1/badges/23202b2306cf7398c403/maintainability)](https://codeclimate.com/repos/5bb54c844500f602860053ee/maintainability) [![Test Coverage](https://api.codeclimate.com/v1/badges/23202b2306cf7398c403/test_coverage)](https://codeclimate.com/repos/5bb54c844500f602860053ee/test_coverage)

# lib-laravel-git-versioning

# Descriptioin

This package pulls versioning information from github through an artisan command and appends it to the response headers on every api call through a middleware.


# Installation

**composer.json**

    "require": {
	    "Jersak/lib-laravel-git-versioning": "0.*",
    }
    ...
    "repositories": [
	    {
            "type": "vcs",
            "url": "https://github.com/Jersak/lib-laravel-git-versioning"
        }
    ],

**bootstrap/app.php**

	$app->middleware([
    	Jersak\Versioning\VersionHeaderMiddleware::class,
	]);

    $app->register('Jersak\Versioning\VersioningServiceProvider');


**Pull versioning information**
On the CLI, run:

    php artisan github:getversion -S <commit or version SHA>
