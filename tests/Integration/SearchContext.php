<?php

namespace Acme\Tests\Integration;

use Acme\Entity\Movie;
use Acme\Service\MovieService;
use Acme\Tests\AppContext;
use Acme\Tests\Fixture\MovieFixture;
use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert;

class SearchContext implements Context
{
    /** @var  MovieService */
    private $movieService;
    /** @var  Movie[] */
    private $searchResult = [];

    /**
     * @Given There are movies titled :movie1, :movie2 and :movie3
     */
    public function thereAreMoviesTitled($movie1, $movie2, $movie3)
    {
        $generatedMovies = MovieFixture::generateFakeMoviesFrom([
            ['title' => $movie1,], ['title' => $movie2,], ['title' => $movie3,],
        ]);
        $this->movieService = AppContext::app()->getContainer()->movieService;
        $this->movieService->importMovies($generatedMovies);
    }

    /**
     * @When A member wants to find a movie containing :name in title
     */
    public function aMemberWantsToFindAMovieContainingInTitle($name)
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
     */
    public function heShouldSeeMovieTitledAsAResult($title)
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
     */
    public function heShouldntSeeTheMovieTitledAsAResult($title)
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

