<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/api/ceshi','/api/user/signin','/api/user/signup'
    ];
    private $openRoutes = [
        '/api/ceshi','/api/user/signin','/api/user/signup'
    ];

    public function handle($request, Closure $next)
    {
        foreach($this->openRoutes as $route){
            if ($request->is($route)){
                return $next($request);
            }
            return parent::handle($request, $next);
        }
    }
}
