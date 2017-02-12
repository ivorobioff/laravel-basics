<?php
namespace ImmediateSolutions\Core\User\Entities;

use DateTime;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
abstract class User
{
    /**
     * @var
     */
    private $id;
    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    /**
     * @var string
     */
    private $password;
    public function setPassword($password) { $this->password = $password; }
    public function getPassword() { return $this->password; }

    /**
     * @var string
     */
    private $username;
    public function setUsername($username) { $this->username = $username; }
    public function getUsername() { return $this->username; }

    /**
     * @var DateTime
     */
    private $createdAt;
    public function setCreatedAt(DateTime $datetime){ $this->createdAt = $datetime; }
    public function getCreatedAt() { return $this->createdAt; }

    public function __construct()
    {
        $this->setCreatedAt(new DateTime());
    }
}