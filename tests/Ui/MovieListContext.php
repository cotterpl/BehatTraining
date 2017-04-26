<?php

namespace Acme\Tests\Ui;

use Behat\MinkExtension\Context\MinkContext;
use PHPUnit\Framework\Assert;

class MovieListContext extends MinkContext
{
    /**
     * @When Visitor goes to Home Page
     */
    public function visitorGoesToHomePage()
    {
        $this->visitPath(Page\HomePage::PATH);
        $homePage = new Page\HomePage($this->getSession()->getPage());

        Assert::assertTrue($homePage->verify(), "Expected to visit home page but didn't");
    }

    /**
     * @Then He should see :amount latest movies
     */
    public function heShouldSeeLatestMovies(string $amount)
    {
        $homePage = new Page\HomePage($this->getSession()->getPage());
        if (!$homePage->verify()) {
            throw new  \LogicException("Expected to start on home page");
        }
        $shownAmount = $homePage->countLatestMovies();

        Assert::assertEquals((int)$amount, $shownAmount, "Expected to see $amount but found $shownAmount latest movies");
    }
}

