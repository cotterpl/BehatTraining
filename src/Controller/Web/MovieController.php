<?php

namespace Acme\Controller\Web;

use Acme\Controller\AbstractController;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Controller for movie related pages
 *
 * @package Acme\Controller\Web
 */
class MovieController extends AbstractController
{
    /**
     * Single movie page
     *
     * @param  Request  $req  PSR7 request
     * @param  Response $res  PSR7 response
     * @param  array    $args Route parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(Request $req, Response $res, $args)
    {
        $id = $args['id'];
        $movie = $this->container()['movieService']->find($id);
        if (!$movie) {
            return $res->withStatus(404);
        }
        return $this->container()->view->render($res, 'movie.twig', [
            'movie' => $movie,
        ]);
    }
}

