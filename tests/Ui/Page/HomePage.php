<?php
declare(strict_types = 1);

namespace Acme\Tests\Ui\Page;

class HomePage extends AbstractPage
{
    public function countLatestMovies()
    {
        $result = $this->getPageNode()->findAll('css', '.table-movie-list .tr-movie');
        return count($result);
    }

    public function verify(): bool
    {
        return $this->getPageNode()->has('css', '#tables');
    }
}
