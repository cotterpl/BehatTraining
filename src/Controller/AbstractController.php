<?php

namespace Acme\Controller;

use Acme\Service\MovieService;
use Interop\Container\ContainerInterface;

/**
 * Base class for controllers
 *
 * @package Acme\Controller
 */
abstract class AbstractController
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

