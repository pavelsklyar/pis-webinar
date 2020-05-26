<?php


namespace app\model;


use base\model\Model;

class User extends Model
{
    public $id;
    public $email;
    public $password;
    public $salt;
    public $name;
    public $surname;
    public $fathername;
    public $status_id;

    /**
     * User constructor.
     * @param $email
     * @param $password
     * @param $salt
     * @param $name
     * @param $surname
     * @param $fathername
     * @param $status_id
     */
    public function __construct($email, $password, $salt, $surname, $name, $fathername, $status_id)
    {
        $this->email = $email;
        $this->password = $password;
        $this->salt = $salt;
        $this->name = $name;
        $this->surname = $surname;
        $this->fathername = $fathername;
        $this->status_id = $status_id;

        $this->auto_increment = ['id'];
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}