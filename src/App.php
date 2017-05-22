<?php

namespace Acme;

use Acme\Controller\Api\AuthController;
use Acme\Controller\Web\IndexController;
use Acme\Controller\Web\SearchController;
use Acme\Middleware\AuthMiddleware; //do not delete this entry, it is needed for one behat training lesson

class App extends \Slim\App
{
    public function __construct(array $config = null)
    {

        if ($config === null) {
            include('config.php');
        }

        $container = new \Slim\Container(
            [
                'settings' => $config,
            ]
        );
        parent::__construct($container);

        $this->registerServices();

        $this->defineWebPageRoutes();
        $this->defineApiRoutes();
    }

    protected function registerServices() {
        $container = $this->getContainer();
        $config = $container->settings;

        //register search service
        $container['dbService'] = function ($container) use ($config) {
            $c = $config['db'];
            return new \Acme\Service\DbService($c['host'], $c['dbName'], $c['username'], $c['password'], $config['ACME_ROOT'] . '/data');
        };
        //register search service
        $container['movieService'] = function ($container) {
            return new \Acme\Service\MovieService($container->dbService);
        };

        $container['view'] = function ($container) use ($config) {
            $view = new \Slim\Views\Twig($config['ACME_ROOT'] . "/src/view/", [
                'cache' => false,
            ]);
            $view->addExtension(new \Slim\Views\TwigExtension(
                $container->router,
                $container->request->getUri()
            ));
            return $view;
        };
    }

    protected function defineWebPageRoutes()
    {
        //web page routes
        $this->get('/', IndexController::class . ':index');
        $this->get('/search', SearchController::class . ':search');
        $this->get('/movie/{id}', \Acme\Controller\Web\MovieController::class . ':get');
    }

    protected function defineApiRoutes()
    {
        //all API routes should start with /api/

        $this->post('/api/tokens', AuthController::class . ':post');
        $this->get('/api/tokens', AuthController::class . ':post'); //get is here only to make behat training simpler for you

        $this->get('/api/tokens/delete', AuthController::class . ':delete'); //get is here only to make behat training simpler for you
        $this->delete('/api/tokens', AuthController::class . ':delete');

        $group = $this->group(
            '', function () {
            $this->get('/api/movies/{id}', \Acme\Controller\Api\MovieController::class . ':get');
            $this->post('/api/movies', \Acme\Controller\Api\MovieController::class . ':post');
        }
        );

        //uncomment this to turn on authentication
        //$group->add(new AuthMiddleware());

    }

    public function run($silent = false)
    {
        session_start();
        parent::run($silent);
    }
}

