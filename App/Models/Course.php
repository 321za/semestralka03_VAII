<?php

namespace App\Models;

use App\Core\DB\Connection;
use App\Core\Model;

class Course extends \App\Core\Model
{
    public function __construct(
        public int     $id = 0,
        public ?string $caption = null,
        public int     $capacity = 0,
        public ?string $time = null,
        public ?string $info = null,
        public int     $typKurzu = 0,
        public int     $idTrener = 0,
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'caption', 'capacity', 'time', 'info', 'typKurzu','idTrener'];
    }

    static public function setTableName()
    {
        return "courses";
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
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     */
    public function setCaption(?string $caption): void
    {
        $this->caption = $caption;
    }

    /**
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }

    /**
     * @param int $capacity
     */
    public function setCapacity(int $capacity): void
    {
        $this->capacity = $capacity;
    }

    /**
     * @return string|null
     */
    public function getTime(): ?string
    {
        return $this->time;
    }

    /**
     * @param string|null $time
     */
    public function setTime(?string $time): void
    {
        $this->time = $time;
    }

    /**
     * @return string|null
     */
    public function getInfo(): ?string
    {
        return $this->info;
    }

    /**
     * @param string|null $info
     */
    public function setInfo(?string $info): void
    {
        $this->info = $info;
    }

    /**
     * @param int $typKurzu
     */
    public function setTypKurzu(int $typKurzu): void
    {
        $this->typKurzu = $typKurzu;
    }

    public function getNazovTypu(): ?string
    {
        if ($this->getTypKurzu() == 1) {
            return "Pole dance";
        } else if ($this->getTypKurzu() == 2) {
            return "Aerial hoop";
        } else if ($this->getTypKurzu() == 3) {
            return "Aerial silk";
        } else {
            return "Flexi joga";
        }
    }

    /**
     * @return int
     */
    public function getTypKurzu(): int
    {
        return $this->typKurzu;
    }

    /**
     * @return int
     */
    public function getIdTrener(): int
    {
        return $this->idTrener;
    }

    /**
     * @param int $idTrener
     */
    public function setIdTrener(int $idTrener): void
    {
        $this->idTrener = $idTrener;
    }

}