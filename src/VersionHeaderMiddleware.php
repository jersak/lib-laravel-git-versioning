<?php

namespace Jersak\Versioning;

use Jersak\Versioning\FileHelper;
use Closure;

class VersionHeaderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $fHelp = new FileHelper();
        $versionFile = $fHelp->getConfigFile();

        $response->headers->set('X-App-Version', $fHelp->getVersionFromFile($versionFile));

        return $response;
    }
}
