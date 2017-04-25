<?php

namespace Acme\Controller;

use Acme\Service\MovieService;
use Interop\Container\ContainerInterface;

class AbstractController
{
    /** @var  ContainerInterface */
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return ContainerInterface
     */
    protected function container()
    {
        return $this->container;
    }
}

