<?php

namespace Acme\Controller\Web;

use Acme\Controller\AbstractController;
use Acme\Service\MovieService;
use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Controller handling movie searching.
 *
 * @package Acme\Controller\Web
 */
class SearchController extends AbstractController
{
    /**
     * Search page
     *
     * @param  Request  $req  PSR7 request
     * @param  Response $res  PSR7 response
     * @param  array    $args Route parameters
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function search($req, $res, $args)
    {
        $query = $req->getQueryParam('s', null);
        $results = $this->container()['movieService']->search($query);
        return $this->container()->view->render(
            $res,
            'search.twig',
            [
                'searchQuery' => $query,
                'movieList'   => $results,
            ]
        );
    }
}

