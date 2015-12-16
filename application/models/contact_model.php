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
      
       $todaysdate=date("Y-m-d");
     
    if($id){
        /////////////////////////EMAIL
//        $senderemail="v2re.contact@gmail.com";
        $senderemail="pooja.wohlig@gmail.com";
        $this->load->library('email');
        $this->email->from('vigwohlig@gmail.com', 'V2 REAL ESTATE PRIVATE LIMITED ');
        $this->email->to($senderemail);
        $this->email->subject('Enquiry for V2 REAL ESTATE PRIVATE LIMITED');
        $message = "<html>
      <p><span style='font-size:14px;font-weight:bold;padding:10px 0;'>Name: </span>
      <span>$name</span>
      </p> 
      <p>
      <span style='font-size:14px;font-weight:bold;padding:10px 0;'>Email: </span>
      <span>$email</span>
      </p> 
      <p>
      <span style='font-size:14px;font-weight:bold;padding:10px 0;'>Message: </span>
      <span>$message</span>
      </p>
</html>";
        $this->email->message($message);
        $this->email->send();
        $data["message"] = $this->email->print_debugger();
        print_r( $data["message"]);
        echo $data["message"];
        if (!$query) {
            return  0;
        } else {
            return  $id;
        }
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
