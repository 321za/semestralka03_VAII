<?php

class Reviews extends \App\Core\Model
{

    public function __construct(
        public int $id_recenzie = 0,
        public ?string $text_recenzie = null,
        public ?string $autor = null,
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id_recenzie', 'text_recenzie','autor'];
    }

    static public function setTableName()
    {
        return "reviews";
    }

    /**
     * @return int
     */
    public function getIdRecenzie(): int
    {
        return $this->id_recenzie;
    }

    /**
     * @param int $id_recenzie
     */
    public function setIdRecenzie(int $id_recenzie): void
    {
        $this->id_recenzie = $id_recenzie;
    }

    /**
     * @return string|null
     */
    public function getTextRecenzie(): ?string
    {
        return $this->text_recenzie;
    }

    /**
     * @param string|null $text_recenzie
     */
    public function setTextRecenzie(?string $text_recenzie): void
    {
        $this->text_recenzie = $text_recenzie;
    }

    /**
     * @return string|null
     */
    public function getAutor(): ?string
    {
        return $this->autor;
    }

    /**
     * @param string|null $autor
     */
    public function setAutor(?string $autor): void
    {
        $this->autor = $autor;
    }
}