<?php

namespace Acme\Entity;

/**
 * Movie entity
 *
 * @package Acme\Entity
 */
class Movie
{
    /** @var int */
    private $id;

    /** @var string */
    private $title;

    /** @var int */
    private $year;

    /** @var string */
    private $description;

    /** @var string */
    private $imdbId;

    public function __construct(array $data)
    {
        $this->id = (int)$data['id'];
        $this->title = $data['title'];
        $this->year = (int)$data['year'];
        $this->description = $data['description'];
        $this->imdbId = $data['imdbId'];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id'          => $this->getId(),
            'title'       => $this->getTitle(),
            'year'        => $this->getYear(),
            'description' => $this->getDescription(),
            'imdbId'      => $this->getId(),
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getImdbId(): string
    {
        return $this->imdbId;
    }
}

