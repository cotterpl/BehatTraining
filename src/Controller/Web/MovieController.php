<?php

namespace Acme\Controller\Web;

use Acme\Controller\AbstractController;

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
     * @param  \Psr\Http\Message\ServerRequestInterface $req  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $res  PSR7 response
     * @param  array                                    $args Route parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($req, $res, $args)
    {
        $id = $args['id'];
        $movie = $this->container()->movieService->find($id);
        if (!$movie) {
            return $res->withStatus(404);
        }
        return $this->container()->view->render($res, 'movie.twig', [
            'movie' => $movie,
        ]);
    }
}

