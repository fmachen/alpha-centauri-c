<?php

class User {

    private $id;
    private $name;
    private $canonical;
    private $salt;
    private $email;
    private $password;
    private $created;
    private $lastLogin;
    private $enabled;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCanonical() {
        return $this->canonical;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCreated() {
        return $this->created;
    }

    public function getLastLogin() {
        return $this->lastLogin;
    }

    public function getEnabled() {
        return $this->enabled;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setCanonical($canonical) {
        $this->canonical = $canonical;
        return $this;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
        return $this;
    }

}