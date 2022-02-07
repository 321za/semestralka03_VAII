<?php

namespace App\Models;

use App\Core\Model;

class User extends \App\Core\Model
{

    public function __construct(
        public int     $id = 0,
        public ?string $email = null,
        public ?string $password = null,
        public ?string $name = null,
        public int     $type = 0,
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'email', 'password', 'name', 'type'];
    }

    static public function setTableName()
    {
        return "users";
    }

    //je prihlaseny?
    public static function isLogged()
    {
        //vrati true a lebo false, podla toho ci je clovek prihlaseny
        return isset($_SESSION['login']);
    }

    public static function logout()
    {
        //zrusim session a aplikacia sa bdue tvarit, ze nikto nie je prihlaseny
        unset($_SESSION['login']);
        unset($_SESSION['id']);
        unset($_SESSION['type']);
        session_destroy();
    }

    public static function deactivate()
    {
        //DELETE
        $id = $_SESSION['id'];
        $user = User::getOne($id);
        $user->delete();
        unset($_SESSION['login']);
        unset($_SESSION['id']);
        unset($_SESSION['type']);
        session_destroy();
        return true;
    }

    public static function isUser()
    {
        if ($_SESSION['type'] == 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function isTrainer()
    {
        if ($_SESSION['type'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAdministrator()
    {
        if ($_SESSION['type'] == 2) {
            return true;
        } else {
            return false;
        }
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
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }
}