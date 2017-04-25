<?php

namespace Acme\Controller\Api;

use Acme\Controller\AbstractController;
use Acme\Entity\Movie;
use Acme\Middleware\AuthMiddleware;

class AuthController extends AbstractController
{
    /**
     * API sign in action
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $req  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $res  PSR7 response
     * @param  array                                    $args Route parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($req, $res, $args)
    {
        $auth = new AuthMiddleware();
        if ($auth->signIn($req->getParam('login'), $req->getParam('password'))) {
            //authenticated
            return $res;
        }
        //failed
        return $res->withStatus(401);
    }

    public function delete($req, $res, $args) {
        $auth = new AuthMiddleware();
        $auth->signOut();
        return $res;
    }
}

