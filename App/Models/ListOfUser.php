<?php

namespace App\Models;

use App\Core\DB\Connection;
use App\Core\Model;

class ListOfUser extends \App\Core\Model
{
    public function __construct(
        public ?string $user = null,
        public int $idKurzu = 0,
        public int $id = 0,
    )
    {
    }

    static public function setDbColumns()
    {
        return ['user', 'idKurzu','id'];
    }

    static public function setTableName()
    {
        return "list";
    }

    /**
     * @return string|null
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @param string|null $user
     */
    public function setUser(?string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getIdKurzu(): int
    {
        return $this->idKurzu;
    }

    /**
     * @param int $idKurzu
     */
    public function setIdKurzu(int $idKurzu): void
    {
        $this->idKurzu = $idKurzu;
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
}