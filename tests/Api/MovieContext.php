<?php

namespace Acme\Tests\Api;

use Acme\Entity\Movie;
use Acme\Tests\AppContext;
use Acme\Tests\Fixture\MovieFixture;
use Behat\Behat\Context\Context;

class MovieContext implements Context
{
    /**
     * @Given There is a movie :title with id :id
     */
    public function thereIsAMovieWithId($title, $id)
    {
        $movie = MovieFixture::generateFakeMovieFrom(['id'=>$id, 'title' => $title]);
        AppContext::app()->getContainer()->movieService->create(new Movie($movie));
    }
}

