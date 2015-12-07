<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class project_model extends CI_Model
{
    public function create($order, $status, $name,$icon,$desc)
    {
        $data = array('order' => $order,'status' => $status,'name' => $name,'icon' => $icon,'desc' => $desc);
        $query = $this->db->insert('realestate_project', $data);
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
        $query = $this->db->get('realestate_project')->row();

        return $query;
    }

    public function edit($id, $order, $status, $name,$icon,$desc)
    {
        $data = array('order' => $order,'status' => $status,'name' => $name,'icon' => $icon,'desc' => $desc);
        $this->db->where('id', $id);
        $query = $this->db->update('realestate_project', $data);

        return 1;
    }
    public function delete($id)
    {
        $query = $this->db->query("DELETE FROM `realestate_project` WHERE `id`='$id'");

        return $query;
    }

    public function getAllProjects() {
        $query= $this->db->query("SELECT * FROM `realestate_project`")->result();
        foreach($query as $row)
        {
          $row->images = $this->db->query("SELECT `image` FROM `realestate_projectimages` WHERE `realestate_projectimages`.`project` = '$row->id' ORDER BY `realestate_projectimages`.`id`")->result();
        }
        return $query;
    }

    public function getAllProjectsOnly3() {
        $query= $this->db->query("SELECT * FROM `realestate_project`")->result();
        foreach($query as $row)
        {
          $row->images = $this->db->query("SELECT `image` FROM `realestate_projectimages` WHERE `realestate_projectimages`.`project` = '$row->id' ORDER BY `realestate_projectimages`.`id` LIMIT 0,3")->result();
        }
        return $query;
    }

    public function getSingleProject($id) {
        $query= $this->db->query("SELECT * FROM `realestate_project`  WHERE `realestate_project`.`id` = '$id'")->row();
        $query->images = $this->db->query("SELECT `image` FROM `realestate_projectimages` WHERE `realestate_projectimages`.`project` = '$id'")->result();
        return $query;
    }
}
