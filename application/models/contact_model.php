<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class contact_model extends CI_Model
{
    public function create($name, $email, $message)
    {
        $data = array('name' => $name,'email' => $email,'message'=> $message);
        $query = $this->db->insert('realestate_contact', $data);
        $id = $this->db->insert_id();
        if (!$query) {
            return  0;
        } else {
            return  $id;
        }
    }
    public function beforeedit($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('realestate_contact')->row();

        return $query;
    }

    public function edit($id, $name, $email, $message)
    {
        $data = array('name' => $name,'email' => $email,'message' => $message);
        $this->db->where('id', $id);
        $query = $this->db->update('realestate_contact', $data);

        return 1;
    }
    public function delete($id)
    {
        $query = $this->db->query("DELETE FROM `realestate_contact` WHERE `id`='$id'");

        return $query;
    }
}
