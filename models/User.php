<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User {

    public $userName;
    public $firstName;
    public $lastName;
    public $genres;
    public $profilePic;

    function __construct($u,  $fn, $ln, $g, $pp) {
        $this->userName = $u;
        $this->firstName = $fn;
        $this->lastName = $ln;
        $this->genres = $g;
        $this->profilePic = $pp;
    }

    public function getuserName() {
        return $this->userName;
    }

    public function getfirstName() {
        return $this->firstName;
    }

    public function getlastName() {
        return $this->lastName;
    }

    public function getgenres() {
        return $this->genres;
    }

    public function getprofilePic() {
        return $this->profilePic;
    }

}
