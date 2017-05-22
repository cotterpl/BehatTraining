<?php
declare(strict_types = 1);

namespace Acme\Tests\Ui\Element;

class SearchForm extends AbstractElement
{
    /** var Locator for search form node */
    const LOCATOR = ['css', 'form.search-form'];

    /**
     * @inheritdoc
     */
    public function verify(): bool
    {
        return $this->getNode()->getTagName() === 'form' && $this->getNode()->getAttribute('role') === 'search';
    }
}
