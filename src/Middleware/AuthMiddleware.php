<?php

namespace Acme\Middleware;

use GuzzleHttp\Middleware;
use Slim\MiddlewareAwareTrait;

class AuthMiddleware {

    /**
     * Auth middleware
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
        if (key_exists('identity',$_SESSION) && strlen($_SESSION['identity']) > 0) {
            return $next($request, $response);
        }

        //failed authorization
        return $response->withStatus(401);
    }

    public function signIn($username, $password) {
        if ($username === 'acme' && $password === 'AcmePass') {
            session_regenerate_id();
            $_SESSION['identity'] = $username;
            return true;
        }
        return false;
    }

    public function signOut() {
        unset($_SESSION['identity']);
        session_regenerate_id();
    }
}
