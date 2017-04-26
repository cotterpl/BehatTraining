<?php

namespace Acme\Tests\Generator;

use Acme\Entity\Movie;
use Faker;

/**
 * Provides movies for tests
 *
 * @package Acme\Tests\Fixture
 */
class MovieGenerator
{
    /**
     * Generates movies based on the fixed data
     *
     * @param array $fixedData Data to generate from
     *
     * @return Movie[]
     */
    public static function generateFakeMoviesFrom(array $fixedData)
    {
        $movies = [];
        foreach ($fixedData as $row) {
            $movies[] = self::generateFakeMovieFrom($row);
        }
        return $movies;
    }

    /**
     * Generates one movie based on the fixed data
     *
     * @param array $fixedData Data to generate from
     *
     * @return Movie
     */
    public static function generateFakeMovieFrom(array $row)
    {
        $faker = Faker\Factory::create();

        $movie = [
            'id'          => $faker->unique()->numberBetween(1),
            'title'       => $faker->sentence,
            'year'        => $faker->year,
            'description' => $faker->paragraph,
            'imdbId'      => $faker->uuid,
        ];
        $movie = $row + $movie; //merge provided data on top of generated data

        return new Movie($movie);
    }
}

