<?php

namespace App\Models;

use App\Core\DB\Connection;
use App\Core\Model;


class Review extends \App\Core\Model
{

    public function __construct(
        public int     $id = 0,
        public ?string $text = null,
        public ?string $author = null,
        public ?string $email = null,
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'text','author','email'];
    }

    static public function setTableName()
    {
        return "reviews";
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

    /**
     * @return string|null
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string|null $author
     */
    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
}