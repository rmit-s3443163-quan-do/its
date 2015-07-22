<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 12/07/15
 * Time: 9:08 AM
 */

class User {

    private $id = -1;
    private $username = '';
    private $password = '';
    private $type = -1;

    function __construct($username, $password)
    {
        $this->username = strip_tags($username);
        $this->password = strip_tags(md5($password));
    }

    /**
     * @return User
     */
    function withType($username, $password, $type)
    {
        $tmp = new self($username, $password);
        $tmp->setType(strip_tags($type));

        return $tmp;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = strip_tags($id);
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = strip_tags($password);
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getTypeString()
    {
        switch ($this->type) {
            case 1:
                return 'Student';
                break;
            case 2:
                return 'Teacher';
                break;
            case 1903:
                return 'Admin';
                break;
        }
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = strip_tags($type);
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = strip_tags($username);
    }




}