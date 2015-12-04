<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class detailproject_model extends CI_Model
{
public function create($projectimages,$name,$image,$content,$text)
{
$data=array("projectimages" => $projectimages,"name" => $name,"image" => $image,"content" => $content,"text" => $text);
$query=$this->db->insert( "realestate_detailproject", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("realestate_detailproject")->row();
return $query;
}
function getsingledetailproject($id){
$this->db->where("id",$id);
$query=$this->db->get("realestate_detailproject")->row();
return $query;
}
public function edit($id,$projectimages,$name,$image,$content,$text)
{
$data=array("projectimages" => $projectimages,"name" => $name,"image" => $image,"content" => $content,"text" => $text);
$this->db->where( "id", $id );
$query=$this->db->update( "realestate_detailproject", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `realestate_detailproject` WHERE `id`='$id'");
return $query;
}
}
?>
