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
     * AbstractElement constructor.
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
    protected function getNode(): DocumentElement
    {
        return $this->pageNode;
    }

    /**
     * Check provided node is proper
     *
     * @return bool
     */
    abstract public function verify(): bool;
}
