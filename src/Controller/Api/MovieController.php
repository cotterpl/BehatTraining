<?php

namespace Acme\Controller\Api;

use Acme\Controller\AbstractController;
use Acme\Entity\Movie;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * API controller for movies
 *
 * @package Acme\Controller\Api
 */
class MovieController extends AbstractController
{
    /**
     * GET movie end-point action
     *
     * @param  Request  $req  PSR7 request
     * @param  Response $res  PSR7 response
     * @param  array    $args Route parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(Request $req, Response $res, $args)
    {
        /** @var Movie $movie */
        $movie = $this->container()['movieService']->find((int)$args['id']);
        if ($movie) {
            return $res->withJson($movie->toArray());
        }
    }

    /**
     * GET movie end-point action
     *
     * @param  Request  $req  PSR7 request
     * @param  Response $res  PSR7 response
     * @param  array    $args Route parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     */function post(Request $req, Response $res, $args)
    {
        $data = $req->getParsedBody();
        $movie = $this->container()['movieService']->create(new Movie($data));
        return $res->withJson($movie->toArray());
    }
}

