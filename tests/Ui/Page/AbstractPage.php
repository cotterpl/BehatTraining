<?php

namespace Acme\Tests\Ui\Page;

use Behat\Mink\Element\DocumentElement;

abstract class AbstractPage {

    private $pageNode;

    public function __construct(DocumentElement $node)
    {
        $this->pageNode = $node;
    }

    protected function getPageNode()
    {
        return $this->pageNode;
    }

    abstract public function verify(): bool;
}
