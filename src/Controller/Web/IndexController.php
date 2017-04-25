<?php

namespace Acme\Controller\Web;

use Acme\Controller\AbstractController;

class IndexController extends AbstractController
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
    public function index($req, $res, $args)
    {
        $results = $this->container()->movieService->latestMovies(3);
        return $this->container()->view->render(
            $res, 'index.twig', [
                'movieList' => $results,
            ]
        );
    }
}

