<?php

namespace App\Models;

use App\Core\DB\Connection;
use App\Core\Model;

class Trainer extends \App\Core\Model
{

    public function __construct(
        public int $id = 0,
        public ?string $name = null,
        public ?string $text = null,
        public int $stars = 0,
        public ?string $photoAddress = null,
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'name', 'text','stars','photoAddress'];
    }

    static public function setTableName()
    {
        return "trainers";
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getStars(): int
    {
        return $this->stars;
    }

    /**
     * @param int $stars
     */
    public function setStars(int $stars): void
    {
        $this->stars = $stars;
    }

    /**
     * @return string|null
     */
    public function getPhotoAddress(): ?string
    {
        return $this->photoAddress;
    }

    /**
     * @param string|null $photoAddress
     */
    public function setPhotoAddress(?string $photoAddress): void
    {
        $this->photoAddress = $photoAddress;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }
}