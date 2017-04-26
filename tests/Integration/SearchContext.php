<?php

namespace Acme\Tests\Integration;

use Acme\Entity\Movie;
use Acme\Service\MovieService;
use Acme\Tests\AppContext;
use Acme\Tests\Generator\MovieGenerator;
use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert;

/**
 * Context handling movie search related functionality
 *
 * @package Acme\Tests\Integration
 */
class SearchContext implements Context
{
    /** @var  MovieService */
    private $movieService;
    /** @var  Movie[] */
    private $searchResult = [];

    /**
     * @Given There are movies titled :movie1, :movie2 and :movie3
     *
     * @param string $movie1
     * @param string $movie2
     * @param string $movie3
     */
    public function thereAreMoviesTitled(string $movie1, string $movie2, string $movie3)
    {
        $generatedMovies = MovieGenerator::generateFakeMoviesFrom([
            ['title' => $movie1,], ['title' => $movie2,], ['title' => $movie3,],
        ]);
        $this->movieService = AppContext::app()->getContainer()->movieService;
        $this->movieService->importMovies($generatedMovies);
    }

    /**
     * @When A member wants to find a movie containing :name in title
     *
     * @param string $name
     */
    public function aMemberWantsToFindAMovieContainingInTitle(string $name)
    {
        if (!$this->movieService) {
            throw new \LogicException("Expected movie service to be instantiated first.");
        }
        $this->searchResult = $this->movieService->search($name);
        Assert::assertTrue(is_array($this->searchResult), "Expected search results to be in array.");
        foreach ($this->searchResult as $result) {
            Assert::assertTrue($result instanceof Movie, "Expected movies only");
        }
    }

    /**
     * @Then He should see the movie titled :title as a result
     *
     * @param string $title
     */
    public function heShouldSeeMovieTitledAsAResult(string $title)
    {
        $found = false;
        foreach ($this->searchResult as $movie) {
            if ($movie->getTitle() == $title) {
                $found = true;
            }
        }
        Assert::assertTrue($found, "Expected to find movie titled '$title'");
    }

    /**
     * @Then He shouldn't see the movie titled :title as a result
     *
     * @param string $title
     */
    public function heShouldntSeeTheMovieTitledAsAResult(string $title)
    {
        $found = false;
        foreach ($this->searchResult as $movie) {
            if ($movie->getTitle() == $title) {
                $found = true;
            }
        }
        Assert::assertFalse($found, "Expected NOT to find movie titled '$title'");
    }
}

