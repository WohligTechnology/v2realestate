<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller 
{function getallproject()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`realestate_project`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`realestate_project`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`realestate_project`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`realestate_project`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `realestate_project`");
$this->load->view("json",$data);
}
public function getsingleproject()
{
$id=$this->input->get_post("id");
$data["message"]=$this->project_model->getsingleproject($id);
$this->load->view("json",$data);
}
function getallprojectimages()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`realestate_projectimages`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`realestate_projectimages`.`project`";
$elements[1]->sort="1";
$elements[1]->header="Project";
$elements[1]->alias="project";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`realestate_projectimages`.`image`";
$elements[2]->sort="1";
$elements[2]->header="Image";
$elements[2]->alias="image";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `realestate_projectimages`");
$this->load->view("json",$data);
}
public function getsingleprojectimages()
{
$id=$this->input->get_post("id");
$data["message"]=$this->projectimages_model->getsingleprojectimages($id);
$this->load->view("json",$data);
}
function getalldetailproject()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`realestate_detailproject`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`realestate_detailproject`.`projectimages`";
$elements[1]->sort="1";
$elements[1]->header="Project Image";
$elements[1]->alias="projectimages";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`realestate_detailproject`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`realestate_detailproject`.`image`";
$elements[3]->sort="1";
$elements[3]->header="Image";
$elements[3]->alias="image";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`realestate_detailproject`.`content`";
$elements[4]->sort="1";
$elements[4]->header="Content";
$elements[4]->alias="content";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`realestate_detailproject`.`text`";
$elements[5]->sort="1";
$elements[5]->header="Text";
$elements[5]->alias="text";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `realestate_detailproject`");
$this->load->view("json",$data);
}
public function getsingledetailproject()
{
$id=$this->input->get_post("id");
$data["message"]=$this->detailproject_model->getsingledetailproject($id);
$this->load->view("json",$data);
}
} ?>