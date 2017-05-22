<?php
declare(strict_types = 1);

namespace Acme\Tests\Ui\Page;

use Acme\Tests\Ui\Page\AbstractAcmePage;

/**
 * Home (Index) page
 *
 * @package Acme\Tests\Ui\Page
 */
class HomePage extends AbstractAcmePage
{
    const PATH = '/';

    /**
     * Returns amount of latest movies visible on page.
     *
     * @return int
     */
    public function countLatestMovies(): int
    {
        $result = $this->getNode()->findAll('css', '.table-movie-list .tr-movie');
        return count($result);
    }

    /**
     * @inheritdoc
     */
    public function verify(): bool
    {
        return $this->getNode()->has('css', '#tables');
    }
}
