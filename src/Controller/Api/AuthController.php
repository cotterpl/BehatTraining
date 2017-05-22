<?php

namespace Acme\Controller\Api;

use Acme\Controller\AbstractController;
use Acme\Entity\Movie;
use Acme\Middleware\AuthMiddleware;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * User API authentication Controller
 *
 * @package Acme\Controller\Api
 */
class AuthController extends AbstractController
{
    /**
     * API sign in action
     *
     * @param  Request  $req  PSR7 request
     * @param  Response $res  PSR7 response
     * @param  array    $args Route parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post(Request $req, Response $res, $args)
    {
        $auth = new AuthMiddleware();
        if ($auth->signIn($req->getParam('login'), $req->getParam('password'))) {
            //authenticated
            return $res;
        }
        //failed
        return $res->withStatus(401);
    }

    /**
     * API sign out action
     *
     * @param  Request  $req  PSR7 request
     * @param  Response $res  PSR7 response
     * @param  array    $args Route parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete(Request $req, Response $res, $args)
    {
        $auth = new AuthMiddleware();
        $auth->signOut();
        return $res;
    }
}

