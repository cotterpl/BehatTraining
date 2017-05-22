<?php

namespace Acme\Tests\Ui\Page;

use Acme\Tests\Ui\Element\SearchForm;

/**
 * Base class for all page objects
 *
 * @package Acme\Tests\Ui\Page
 */
abstract class AbstractAcmePage extends AbstractPage
{
    /**
     * Returns wrapper for search form
     *
     * @return SearchForm
     */
    public function getSearchForm()
    {
        return new SearchForm($this->getNode()->find(...SearchForm::LOCATOR));
    }
}
