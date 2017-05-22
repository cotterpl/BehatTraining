<?php

namespace Acme\Tests\Ui\Element;

use Behat\Mink\Element\NodeElement;

/**
 * Base class for all page objects
 *
 * @package Acme\Tests\Ui\Page
 */
abstract class AbstractElement
{
    /** @var NodeElement */
    private $pageNode;

    /**
     * AbstractElement constructor.
     *
     * @param NodeElement $node Node pointing to page
     */
    public function __construct(NodeElement $node)
    {
        $this->pageNode = $node;
    }

    /**
     * Main node of the page
     *
     * @return NodeElement
     */
    protected function getNode(): NodeElement
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
