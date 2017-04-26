<?php
declare(strict_types = 1);

namespace Acme\Tests\Ui\Page;

/**
 * Home (Index) page
 *
 * @package Acme\Tests\Ui\Page
 */
class HomePage extends AbstractPage
{
    const PATH = '/';

    /**
     * Returns amount of latest movies visible on page.
     *
     * @return int
     */
    public function countLatestMovies()
    {
        $result = $this->getPageNode()->findAll('css', '.table-movie-list .tr-movie');
        return count($result);
    }

    /**
     * @inheritdoc
     */
    public function verify(): bool
    {
        return $this->getPageNode()->has('css', '#tables');
    }
}
