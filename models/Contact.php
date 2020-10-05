<?php


class Contact {

    public $firstName;
    public $lastName;
    public $contactNo;
    public $email;
    public $profilePic;
    public $tag;
    public $Id;

    function __construct($fn, $ln, $cn, $email, $pp, $tag, $id) {

        $this->firstName = $fn;
        $this->lastName = $ln;
        $this->contactNo = $cn;
        $this->email = $email;
        $this->profilePic = $pp;
        $this->tag = $tag;
        $this->Id = $id;
    }

    public function getfirstName() {
        return $this->firstName;
    }

    public function getlastName() {
        return $this->lastName;
    }

    public function getcontactNo() {
        return $this->contactNo;
    }

    public function getemail() {
        return $this->email;
    }

    public function getprofilePic() {
        return $this->profilePic;
    }

    public function gettag() {
        return $this->tag;
    }

    public function getId() {
        return $this->Id;
    }

}
