<?php

namespace  App\Models;
use App\Core\Model;

class User extends \App\Core\Model
{

    public function __construct(
        public int $id = 0,
        public ?string $email = null,
        public ?string $password = null,
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'email', 'password'];
    }

    static public function setTableName()
    {
        return "users";
    }

    //je prihlaseny?
    public static function isLogged()
    {
        //vrati true a lebo false, podla toho ci je clovek prihlaseny
        return isset($_SESSION['name']);
    }

    public static function logout()
    {
        //zrusim session a aplikacia sa bdue tvarit, ze nikto nie je prihlaseny
        unset($_SESSION['name']);
        unset($_SESSION['id']);
        session_destroy();
    }

    public static function deactivate()
    {
        //DELETE
        $id = $_SESSION['id'];
        $user = User::getOne($id);
        $user->delete();
        unset($_SESSION['name']);
        unset($_SESSION['id']);
        session_destroy();
        return true;
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

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }
}