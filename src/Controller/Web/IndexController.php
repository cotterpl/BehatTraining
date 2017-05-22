<?php

namespace Acme\Controller\Web;

use Acme\Controller\AbstractController;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Home page controller
 *
 * @package Acme\Controller\Web
 */
class IndexController extends AbstractController
{
    /**
     * Index action
     *
     * @param  Request  $req  PSR7 request
     * @param  Response $res  PSR7 response
     * @param  array    $args Route parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(Request $req, Response $res, $args)
    {
        $results = $this->container()['movieService']->latestMovies(3);
        return $this->container()['view']->render(
            $res,
            'index.twig',
            [
                'movieList' => $results,
            ]
        );
    }
}

