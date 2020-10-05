<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use chriskacerguis\Restserver;

require BASEPATH . 'libraries/chriskacerguis/Restserver/RestController.php';
require BASEPATH . 'libraries/chriskacerguis/Restserver/Format.php';

class ContactBookController extends \chriskacerguis\RestServer\RestController {

    public function __construct() {
        parent::__construct();
    }

    public function index_get() {
        $this->load->view('AddContacts');
    }

    public function contact_post() {
        $firstname = $this->post('firstName');
        $lastName = $this->post('lastName');
        $contactNo = $this->post('contactNo');
        $email = $this->post('email');
        $profilePic = $this->post('profilePic');
        $tag = $this->post('tag');
        $Id = uniqid();

        $registrationContact = array(
            'firstname' => $firstname,
            'lastName' => $lastName,
            'contactNo' => $contactNo,
            'email' => $email,
            'profilePic' => $profilePic,
            'tag' => $tag,
            'Id' => $Id
        );

        $this->load->model('ContactModel', 'addContact');
        $results = $this->addContact->contactRegister($registrationContact);

        header('content-Type:text/json; charset=UTF-8');
        echo json_encode($results);
    }

    public function contact_get() {
        $Search = $this->get('Search');
        $this->load->model('ContactModel', 'searchContact');
        $results = $this->searchContact->searchContact($Search);
        header('content-Type:text/json; charset=UTF-8');
        echo json_encode($results);
    }

    public function contact_delete() {
        $Id = $this->delete('Id');
        $this->load->model('ContactModel', 'deleteContact');
        $results = $this->deleteContact->deleteContact($Id);
        header('content-Type:text/json; charset=UTF-8');
        echo json_encode($results);
    }

    public function contact_put() {
        $firstname = $this->put('firstName');
        $lastName = $this->put('lastName');
        $contactNo = $this->put('contactNo');
        $email = $this->put('email');
        $profilePic = $this->put('profilePic');
        $tag = $this->put('tag');
        $Id = $this->put('Id');

        $registrationContact = array(
            'firstname' => $firstname,
            'lastName' => $lastName,
            'contactNo' => $contactNo,
            'email' => $email,
            'profilePic' => $profilePic,
            'tag' => $tag,
            'Id' => $Id
        );

        $this->load->model('ContactModel', 'updateContact');
        $results = $this->updateContact->updateContact($registrationContact);

        header('content-Type:text/json; charset=UTF-8');
        echo json_encode($results);
    }

}
