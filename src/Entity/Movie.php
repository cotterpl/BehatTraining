<?php

namespace Acme\Entity;

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

    /**
     * @param int $id
     *
     * @return Movie
     */
    public function setId(int $id): Movie
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $title
     *
     * @return Movie
     */
    public function setTitle($title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param int $year
     *
     * @return Movie
     */
    public function setYear(int $year): Movie
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @param string $description
     *
     * @return Movie
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string $imdbId
     *
     * @return Movie
     */
    public function setImdbId(string $imdbId): self
    {
        $this->imdbId = $imdbId;
        return $this;
    }


}

