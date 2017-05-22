<?php

namespace Acme\Service;

use Acme\Entity\Movie;

/**
 * Handles movies storage
 *
 * @package Acme\Service
 */
class MovieService
{

    /** @var DbService */
    private $db;

    /**
     * MovieService constructor.
     *
     * @param DbService $db
     */
    public function __construct(DbService $db)
    {
        $this->db = $db;
    }

    /**
     * Returns movie or null if it can't find one.
     *
     * @param int $movieId Id of movie
     *
     * @return Movie|null Movie if found. Null otherwise
     */
    public function find(int $movieId)
    {
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM movie WHERE id=?");
        $stmt->execute([(int) $movieId]);
        if ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            return new Movie($row);
        }
        return null;
    }

    /**
     * Creates movie.
     *
     * @param Movie $movie The movie data to create
     *
     * @return Movie Newly created movie
     */
    public function create(Movie $movie)
    {
        $m = $movie->toArray();
        $stmt = $this->db->getPDO()->prepare(
            "
            INSERT INTO movie (id, title, `year`, description, imdbId) 
            VALUES(?, ?, ?, ?, ?)
      "
        );

        $stmt->execute(
            [
                $movie->getId(),
                $movie->getTitle(),
                $movie->getYear(),
                $movie->getDescription(),
                $movie->getImdbId(),
            ]
        );

        $id = $this->db->getPDO()->lastInsertId();

        return $this->find($id);
    }

    /**
     * Finds a movies that contain $query in their title
     *
     * @param string $query Searched title
     *
     * @return Movie[]
     */
    public function search(string $query): array
    {
        $query = '%' . $query . '%';
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM `movie` WHERE `title` LIKE ?");
        $stmt->execute([$query]);
        return $this->arrayToMovies($stmt->fetchAll(\PDO::FETCH_ASSOC));
    }

    /**
     * Returns up to $amount of newest movies.
     *
     * @param int $amount Amount of movies to return
     *
     * @return Movie[]
     */
    public function latestMovies(int $amount): array
    {
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM `movie` ORDER BY `year` DESC, `id` DESC LIMIT 0,?");
        $stmt->bindValue(1, $amount, \PDO::PARAM_INT);
        $stmt->execute();

        return $this->arrayToMovies($stmt->fetchAll(\PDO::FETCH_ASSOC));
    }

    /**
     * Returns all movies
     *
     * @return array Of Movie objects
     */
    public function all(): array
    {
        $return = [];
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM `movie`");
        $stmt->execute();
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $return[] = new Movie($row);
        }
        return $return;
    }

    private function arrayToMovies(array $arr): array
    {
        $result = [];
        foreach ($arr as $row) {
            $result[] = new Movie($row);
        }
        return $result;
    }

    /**
     * Imports movies to DB
     *
     * @param Movie[] $movies
     */
    public function importMovies(array $movies)
    {
        foreach ($movies as $id => $movie) {
            $this->create($movie);
        }
    }
}

