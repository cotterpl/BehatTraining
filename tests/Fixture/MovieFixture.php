<?php

namespace Acme\Tests\Fixture;

use Faker;

class MovieFixture
{
    /**
     * Generates movies (associative array representation) based on the fixed data
     *
     * @param array $fixedData Data to generate from
     *
     * @return array Movies data with each row containing movie as an assoc array
     */
    public static function generateFakeMoviesFrom(array $fixedData)
    {
        $faker = Faker\Factory::create();

        $movieData = [];
        foreach ($fixedData as $row) {
            $movieData[] = self::generateFakeMovieFrom($row);
        }
        return $movieData;
    }

    /**
     * Generates one movie (associative array representation) based on the fixed data
     *
     * @param array $fixedData Data to generate from
     *
     * @return array
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

        return $movie;
    }
}

