<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class contact_model extends CI_Model
{
    public function create($name, $email, $message)
    {
        $toemail = "v2re.contact@gmail.com";
//        $toemail = "pooja.wohlig@gmail.com";
        $message2 = "<html>
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

        $message3 = "Name: $name
        Email: $email
        Message: $message
        ";

        $data = array('name' => $name,'email' => $email,'message'=> $message);
        $query = $this->db->insert('realestate_contact', $data);
        $id = $this->db->insert_id();

       $todaysdate=date("Y-m-d");
      try {
            $mandrill = new Mandrill('_7wCuzojxAi47Odc0qb3xg');
            $message = array(
        'html' => $message2,
        'text' => $message3
                ,
        'subject' => 'Enquiry: V2 Real Estate Pvt. Ltd.',
        'from_email' => 'info@v2realestate.co',
        'from_name' => 'V2 Real Estate',
        'to' => array(
            array(
                'email' => $toemail,
                'name' => "V2 Real Estate Pvt. Ltd.",
                'type' => 'to',
            ),
        ),
        'headers' => array('Reply-To' => $email),
        'important' => false,
        'track_opens' => null,
        'track_clicks' => null,
        'auto_text' => null,
        'auto_html' => null,
        'inline_css' => null,
        'url_strip_qs' => null,
        'preserve_recipients' => null,
        'view_content_link' => null,
        'tracking_domain' => null,
        'signing_domain' => null,
        'return_path_domain' => null,
        'merge' => true,
        'merge_language' => 'mailchimp',
        'global_merge_vars' => array(
            array(
                'name' => 'merge1',
                'content' => 'merge1 content',
            ),
        ),
        'merge_vars' => array(
            array(
                'rcpt' => 'recipient.email@example.com',
                'vars' => array(
                    array(
                        'name' => 'merge2',
                        'content' => 'merge2 content',
                    ),
                ),
            ),
        ),
    );
            $async = false;
            $result = $mandrill->messages->send($message, $async, $ip_pool);
            print_r($result);
    /*
    Array
    (
        [0] => Array
            (
                [email] => recipient.email@example.com
                [status] => sent
                [reject_reason] => hard-bounce
                [_id] => abc123abc123abc123abc123abc123
            )

    )
    */
        } catch (Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: '.get_class($e).' - '.$e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
        }

//    if($id){
//        /////////////////////////EMAIL
////        $senderemail="v2re.contact@gmail.com";
//        $senderemail="pooja.wohlig@gmail.com";
//        $this->load->library('email');
//        $this->email->from('v2re.contact@gmail.com', 'V2 REAL ESTATE PRIVATE LIMITED ');
//        $this->email->to($senderemail);
//        $this->email->subject('Enquiry for V2 REAL ESTATE PRIVATE LIMITED');
//        $message = "<html>
//      <p><span style='font-size:14px;font-weight:bold;padding:10px 0;'>Name: </span>
//      <span>$name</span>
//      </p>
//      <p>
//      <span style='font-size:14px;font-weight:bold;padding:10px 0;'>Email: </span>
//      <span>$email</span>
//      </p>
//      <p>
//      <span style='font-size:14px;font-weight:bold;padding:10px 0;'>Message: </span>
//      <span>$message</span>
//      </p>
//</html>";
//        $this->email->message($message);
//        $this->email->send();
//        $data["message"] = $this->email->print_debugger();
//        print_r( $data["message"]);
//        echo $data["message"];
//        if (!$query) {
//            return  0;
//        } else {
//            return  $id;
//        }
//}

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
