<?php

namespace Acme\Tests\Ui\Page;

use Behat\Mink\Element\DocumentElement;

/**
 * Base class for all page objects
 *
 * @package Acme\Tests\Ui\Page
 */
abstract class AbstractPage
{
    /** @var DocumentElement */
    private $pageNode;

    /**
     * AbstractPage constructor.
     *
     * @param DocumentElement $node Node pointing to page
     */
    public function __construct(DocumentElement $node)
    {
        $this->pageNode = $node;
    }

    /**
     * Main node of the page
     *
     * @return DocumentElement
     */
    protected function getPageNode(): DocumentElement
    {
        return $this->pageNode;
    }

    abstract public function verify(): bool;
}
