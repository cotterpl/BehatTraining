<?php

namespace Acme\Controller\Web;

use Acme\Controller\AbstractController;
use Acme\Service\MovieService;
use Interop\Container\ContainerInterface;

class MovieController extends AbstractController
{
    /**
     * Search action
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

