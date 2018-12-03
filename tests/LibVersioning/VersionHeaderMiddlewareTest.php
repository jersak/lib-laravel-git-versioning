<?php

namespace Jersak\Tests\Versioning;

use Illuminate\Http\Request;
use Jersak\Versioning\VersionHeaderMiddleware;
use Jersak\Tests\Versioning\AbstractTestCase;

class VersionHeaderMiddlewareTest extends AbstractTestCase
{

    public function testMiddleware()
    {
        $request = Request::create('/', 'GET');
        
        $middleware = new VersionHeaderMiddleware;

        $response = $middleware->handle($request, function () use ($request) {
            return $request;
        });

        $this->assertEquals($response->header('x-app-version'), null);
    }
}
