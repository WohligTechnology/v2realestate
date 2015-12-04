<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class projectimages_model extends CI_Model
{
public function create($project,$image)
{
$data=array("project" => $project,"image" => $image);
$query=$this->db->insert( "realestate_projectimages", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("realestate_projectimages")->row();
return $query;
}
function getsingleprojectimages($id){
$this->db->where("id",$id);
$query=$this->db->get("realestate_projectimages")->row();
return $query;
}
public function edit($id,$project,$image)
{
$data=array("project" => $project,"image" => $image);
$this->db->where( "id", $id );
$query=$this->db->update( "realestate_projectimages", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `realestate_projectimages` WHERE `id`='$id'");
return $query;
}
public function getprojectdropdown()
{
$query=$this->db->query("SELECT * FROM `realestate_project`  ORDER BY `id` ASC")->result();
$return=array(
"" => ""
);
foreach($query as $row)
{
  $return[$row->id]=$row->name;
}

return $return;
}
}

?>
