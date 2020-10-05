<?php

include 'Contact.php';

class ContactModel extends CI_Model {

    public function contactRegister($contactDetails) {
        $this->load->database();
        $responce = $this->db->insert('contact', $contactDetails);
        return $responce;
    }

    public function searchContact($searchValue) {
        $contactdata = $this->db->get('contact');
        $ContactFound = array();
        foreach ($contactdata->result() as $row) {//           
            $ContactFound[] = new Contact($row->firstName, $row->lastName, $row->contactNo, $row->email, $row->profilePic, $row->tag, $row->Id);                                                 
        }
        return $ContactFound;
    }

    public function deleteContact($id) {
        $this->db->where('Id', $id);
        $this->db->delete('contact');
    }

    public function updateContact($contactDetails) {
        $this->db->replace('contact', $contactDetails);
    }

}
