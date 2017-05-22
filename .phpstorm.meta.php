<?php
/**
 * This file provides help for PHPStorm to infer the correct type of a return value from a factory.
 *
 * @see https://confluence.jetbrains.com/display/PhpStorm/PhpStorm+Advanced+Metadata
 */

namespace PHPSTORM_META
{

    override(
        \Acme\Controller\AbstractController::container(0),
        map(
            [
                'movieService' => \Acme\Service\MovieService::class,
                'dbService'    => \Acme\Service\DbService::class,
                'view'         => \Slim\Views\Twig::class,
            ]
        )
    );
}
