<?php

namespace App\Models;

use App\Core\DB\Connection;
use App\Core\Model;

class ListOfUser extends \App\Core\Model
{
    public function __construct(
        public ?string $user = null,
        public int $typKurzu = 0,
    )
    {
    }

    static public function setDbColumns()
    {
        return ['user', 'typKurzu'];
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
}