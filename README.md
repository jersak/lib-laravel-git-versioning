[![Maintainability](https://api.codeclimate.com/v1/badges/0ef4424fdd1a44195d30/maintainability)](https://codeclimate.com/github/jersak/lib-laravel-git-versioning/maintainability) [![Test Coverage](https://api.codeclimate.com/v1/badges/0ef4424fdd1a44195d30/test_coverage)](https://codeclimate.com/github/jersak/lib-laravel-git-versioning/test_coverage)

# lib-laravel-git-versioning

# Descriptioin

This package pulls versioning information from github through an artisan command and appends it to the response headers on every api call through a middleware.


# Installation

**.env file**

Set three new variables:
- GITHUB_ORG_NAME: name of your organization or personal github account (eg: Jersak)
- GITHUB_REPO_NAME: name of your repository (eg: lib-laravel-git-versioning)
- GITHUB_TOKEN: Github access token. 'repo:status' permission should suffice.

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

**What does it add?**

A header to every request called 'X-App-Version' containing either the version of the application if a released version is being used (such as v0.1) or the SHA of the commit.
