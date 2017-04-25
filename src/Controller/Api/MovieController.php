<?php

namespace Acme\Controller\Api;

use Acme\Controller\AbstractController;
use Acme\Entity\Movie;

class MovieController extends AbstractController
{
    /**
     * Index action
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $req  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $res  PSR7 response
     * @param  array                                    $args Route parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($req, $res, $args)
    {
        /** @var Movie $movie */
        $movie = $this->container()->movieService->find((int)$args['id']);
        if ($movie) {
            return $res->withJson($movie->toArray());
        }
    }
}

