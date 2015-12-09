<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Site extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->is_logged_in();
    }
    public function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('logged_in');
        if ($is_logged_in !== 'true' || !isset($is_logged_in)) {
            redirect(base_url().'index.php/login', 'refresh');
        } //$is_logged_in !== 'true' || !isset( $is_logged_in )
    }
    public function checkaccess($access)
    {
        $accesslevel = $this->session->userdata('accesslevel');
        if (!in_array($accesslevel, $access)) {
            redirect(base_url().'index.php/site?alerterror=You do not have access to this page. ', 'refresh');
        }
    }
    public function getOrderingDone()
    {
        $orderby = $this->input->get('orderby');
        $ids = $this->input->get('ids');
        $ids = explode(',', $ids);
        $tablename = $this->input->get('tablename');
        $where = $this->input->get('where');
        if ($where == '' || $where == 'undefined') {
            $where = 1;
        }
        $access = array(
            '1',
        );
        $this->checkAccess($access);
        $i = 1;
        foreach ($ids as $id) {
            //echo "UPDATE `$tablename` SET `$orderby` = '$i' WHERE `id` = `$id` AND $where";
            $this->db->query("UPDATE `$tablename` SET `$orderby` = '$i' WHERE `id` = '$id' AND $where");
            ++$i;
            //echo "/n";
        }
        $data['message'] = true;
        $this->load->view('json', $data);
    }
    public function index()
    {
        $access = array('1','2');
        $this->checkaccess($access);
        $data[ 'page' ] = 'dashboard';
        $data[ 'title' ] = 'Welcome';
        $this->load->view('template', $data);
    }
    public function createuser()
    {
        $access = array('1');
        $this->checkaccess($access);
        $data['accesslevel'] = $this->user_model->getaccesslevels();
        $data[ 'status' ] = $this->user_model->getstatusdropdown();
        $data[ 'logintype' ] = $this->user_model->getlogintypedropdown();
//        $data['category']=$this->category_model->getcategorydropdown();
        $data[ 'page' ] = 'createuser';
        $data[ 'title' ] = 'Create User';
        $this->load->view('template', $data);
    }
    public function createusersubmit()
    {
        $access = array('1');
        $this->checkaccess($access);
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[30]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('accessslevel', 'Accessslevel', 'trim');
        $this->form_validation->set_rules('status', 'status', 'trim|');
        $this->form_validation->set_rules('socialid', 'Socialid', 'trim');
        $this->form_validation->set_rules('logintype', 'logintype', 'trim');
        $this->form_validation->set_rules('json', 'json', 'trim');
        if ($this->form_validation->run() == false) {
            $data['alerterror'] = validation_errors();
            $data['accesslevel'] = $this->user_model->getaccesslevels();
            $data[ 'status' ] = $this->user_model->getstatusdropdown();
            $data[ 'logintype' ] = $this->user_model->getlogintypedropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view('template', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $accesslevel = $this->input->post('accesslevel');
            $status = $this->input->post('status');
            $socialid = $this->input->post('socialid');
            $logintype = $this->input->post('logintype');
            $json = $this->input->post('json');
//            $category=$this->input->post('category');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            $filename = 'image';
            $image = '';
            if ($this->upload->do_upload($filename)) {
                $uploaddata = $this->upload->data();
                $image = $uploaddata['file_name'];

                $config_r['source_image'] = './uploads/'.$uploaddata['file_name'];
                $config_r['maintain_ratio'] = true;
                $config_t['create_thumb'] = false;///add this
                $config_r['width'] = 800;
                $config_r['height'] = 800;
                $config_r['quality'] = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if (!$this->image_lib->resize()) {
                    echo 'Failed.'.$this->image_lib->display_errors();
                    //return false;
                } else {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image = $this->image_lib->dest_image;
                    //return false;
                }
            }

            if ($this->user_model->create($name, $email, $password, $accesslevel, $status, $socialid, $logintype, $image, $json) == 0) {
                $data['alerterror'] = 'New user could not be created.';
            } else {
                $data['alertsuccess'] = 'User created Successfully.';
            }
            $data['redirect'] = 'site/viewusers';
            $this->load->view('redirect', $data);
        }
    }
    public function viewusers()
    {
        $access = array('1');
        $this->checkaccess($access);
        $data['page'] = 'viewusers';
        $data['base_url'] = site_url('site/viewusersjson');

        $data['title'] = 'View Users';
        $this->load->view('template', $data);
    }
    public function viewusersjson()
    {
        $access = array('1');
        $this->checkaccess($access);

        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = '`user`.`id`';
        $elements[0]->sort = '1';
        $elements[0]->header = 'ID';
        $elements[0]->alias = 'id';

        $elements[1] = new stdClass();
        $elements[1]->field = '`user`.`name`';
        $elements[1]->sort = '1';
        $elements[1]->header = 'Name';
        $elements[1]->alias = 'name';

        $elements[2] = new stdClass();
        $elements[2]->field = '`user`.`email`';
        $elements[2]->sort = '1';
        $elements[2]->header = 'Email';
        $elements[2]->alias = 'email';

        $elements[3] = new stdClass();
        $elements[3]->field = '`user`.`socialid`';
        $elements[3]->sort = '1';
        $elements[3]->header = 'SocialId';
        $elements[3]->alias = 'socialid';

        $elements[4] = new stdClass();
        $elements[4]->field = '`logintype`.`name`';
        $elements[4]->sort = '1';
        $elements[4]->header = 'Logintype';
        $elements[4]->alias = 'logintype';

        $elements[5] = new stdClass();
        $elements[5]->field = '`user`.`json`';
        $elements[5]->sort = '1';
        $elements[5]->header = 'Json';
        $elements[5]->alias = 'json';

        $elements[6] = new stdClass();
        $elements[6]->field = '`accesslevel`.`name`';
        $elements[6]->sort = '1';
        $elements[6]->header = 'Accesslevel';
        $elements[6]->alias = 'accesslevelname';

        $elements[7] = new stdClass();
        $elements[7]->field = '`statuses`.`name`';
        $elements[7]->sort = '1';
        $elements[7]->header = 'Status';
        $elements[7]->alias = 'status';

        $search = $this->input->get_post('search');
        $pageno = $this->input->get_post('pageno');
        $orderby = $this->input->get_post('orderby');
        $orderorder = $this->input->get_post('orderorder');
        $maxrow = $this->input->get_post('maxrow');
        if ($maxrow == '') {
            $maxrow = 20;
        }

        if ($orderby == '') {
            $orderby = 'id';
            $orderorder = 'ASC';
        }

        $data['message'] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, 'FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`');

        $this->load->view('json', $data);
    }

    public function edituser()
    {
        $access = array('1');
        $this->checkaccess($access);
        $data[ 'status' ] = $this->user_model->getstatusdropdown();
        $data['accesslevel'] = $this->user_model->getaccesslevels();
        $data[ 'logintype' ] = $this->user_model->getlogintypedropdown();
        $data['before'] = $this->user_model->beforeedit($this->input->get('id'));
        $data['page'] = 'edituser';
        $data['page2'] = 'block/userblock';
        $data['title'] = 'Edit User';
        $this->load->view('templatewith2', $data);
    }
    public function editusersubmit()
    {
        $access = array('1');
        $this->checkaccess($access);

        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|max_length[30]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|matches[password]');
        $this->form_validation->set_rules('accessslevel', 'Accessslevel', 'trim');
        $this->form_validation->set_rules('status', 'status', 'trim|');
        $this->form_validation->set_rules('socialid', 'Socialid', 'trim');
        $this->form_validation->set_rules('logintype', 'logintype', 'trim');
        $this->form_validation->set_rules('json', 'json', 'trim');
        if ($this->form_validation->run() == false) {
            $data['alerterror'] = validation_errors();
            $data[ 'status' ] = $this->user_model->getstatusdropdown();
            $data['accesslevel'] = $this->user_model->getaccesslevels();
            $data[ 'logintype' ] = $this->user_model->getlogintypedropdown();
            $data['before'] = $this->user_model->beforeedit($this->input->post('id'));
            $data['page'] = 'edituser';
//			$data['page2']='block/userblock';
            $data['title'] = 'Edit User';
            $this->load->view('template', $data);
        } else {
            $id = $this->input->get_post('id');
            $name = $this->input->get_post('name');
            $email = $this->input->get_post('email');
            $password = $this->input->get_post('password');
            $accesslevel = $this->input->get_post('accesslevel');
            $status = $this->input->get_post('status');
            $socialid = $this->input->get_post('socialid');
            $logintype = $this->input->get_post('logintype');
            $json = $this->input->get_post('json');
//            $category=$this->input->get_post('category');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            $filename = 'image';
            $image = '';
            if ($this->upload->do_upload($filename)) {
                $uploaddata = $this->upload->data();
                $image = $uploaddata['file_name'];

                $config_r['source_image'] = './uploads/'.$uploaddata['file_name'];
                $config_r['maintain_ratio'] = true;
                $config_t['create_thumb'] = false;///add this
                $config_r['width'] = 800;
                $config_r['height'] = 800;
                $config_r['quality'] = 100;
                //end of configs

                $this->load->library('image_lib', $config_r);
                $this->image_lib->initialize($config_r);
                if (!$this->image_lib->resize()) {
                    echo 'Failed.'.$this->image_lib->display_errors();
                    //return false;
                } else {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image = $this->image_lib->dest_image;
                    //return false;
                }
            }

            if ($image == '') {
                $image = $this->user_model->getuserimagebyid($id);
               // print_r($image);
                $image = $image->image;
            }

            if ($this->user_model->edit($id, $name, $email, $password, $accesslevel, $status, $socialid, $logintype, $image, $json) == 0) {
                $data['alerterror'] = 'User Editing was unsuccesful';
            } else {
                $data['alertsuccess'] = 'User edited Successfully.';
            }

            $data['redirect'] = 'site/viewusers';
            //$data['other']="template=$template";
            $this->load->view('redirect', $data);
        }
    }

    public function deleteuser()
    {
        $access = array('1');
        $this->checkaccess($access);
        $this->user_model->deleteuser($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
        $data['alertsuccess'] = 'User Deleted Successfully';
        $data['redirect'] = 'site/viewusers';
            //$data['other']="template=$template";
        $this->load->view('redirect', $data);
    }
    public function changeuserstatus()
    {
        $access = array('1');
        $this->checkaccess($access);
        $this->user_model->changestatus($this->input->get('id'));
        $data['table'] = $this->user_model->viewusers();
        $data['alertsuccess'] = 'Status Changed Successfully';
        $data['redirect'] = 'site/viewusers';
        $data['other'] = "template=$template";
        $this->load->view('redirect', $data);
    }

    public function viewproject()
    {
        $access = array('1');
        $this->checkaccess($access);
        $data['page'] = 'viewproject';
        $data['base_url'] = site_url('site/viewprojectjson');
        $data['title'] = 'View project';
        $this->load->view('template', $data);
    }
    public function viewprojectjson()
    {
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = '`realestate_project`.`id`';
        $elements[0]->sort = '1';
        $elements[0]->header = 'ID';
        $elements[0]->alias = 'id';
        $elements[1] = new stdClass();
        $elements[1]->field = '`realestate_project`.`order`';
        $elements[1]->sort = '1';
        $elements[1]->header = 'Order';
        $elements[1]->alias = 'order';
        $elements[2] = new stdClass();
        $elements[2]->field = '`realestate_project`.`status`';
        $elements[2]->sort = '1';
        $elements[2]->header = 'Status';
        $elements[2]->alias = 'status';
        $elements[3] = new stdClass();
        $elements[3]->field = '`realestate_project`.`name`';
        $elements[3]->sort = '1';
        $elements[3]->header = 'Name';
        $elements[3]->alias = 'name';
        $search = $this->input->get_post('search');
        $pageno = $this->input->get_post('pageno');
        $orderby = $this->input->get_post('orderby');
        $orderorder = $this->input->get_post('orderorder');
        $maxrow = $this->input->get_post('maxrow');
        if ($maxrow == '') {
            $maxrow = 20;
        }
        if ($orderby == '') {
            $orderby = 'id';
            $orderorder = 'ASC';
        }
        $data['message'] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, 'FROM `realestate_project`');
        $this->load->view('json', $data);
    }

    public function createproject()
    {
        $access = array('1');
        $this->checkaccess($access);
        $data['page'] = 'createproject';
        $data[ 'status' ] = $this->user_model->getstatusdropdown();
        $data['title'] = 'Create project';
        $this->load->view('template', $data);
    }
    public function createprojectsubmit()
    {
        $access = array('1');
        $this->checkaccess($access);
        $this->form_validation->set_rules('order', 'Order', 'trim');
        $this->form_validation->set_rules('status', 'Status', 'trim');
        $this->form_validation->set_rules('name', 'Name', 'trim');
          $this->form_validation->set_rules('icon', 'Icon', 'trim');
              $this->form_validation->set_rules('desc', 'Desc', 'trim');
        if ($this->form_validation->run() == false) {
            $data['alerterror'] = validation_errors();
            $data['page'] = 'createproject';
            $data[ 'status' ] = $this->user_model->getstatusdropdown();
            $data['title'] = 'Create project';
            $this->load->view('template', $data);
        } else {
            $order = $this->input->get_post('order');
            $status = $this->input->get_post('status');
            $name = $this->input->get_post('name');
            $icon = $this->input->get_post('icon');
              $desc = $this->input->get_post('desc');
            if ($this->project_model->create($order, $status, $name, $icon , $desc) == 0) {
                $data['alerterror'] = 'New project could not be created.';
            } else {
                $data['alertsuccess'] = 'project created Successfully.';
            }
            $data['redirect'] = 'site/viewproject';
            $this->load->view('redirect', $data);
        }
    }
    public function editproject()
    {
        $access = array('1');
        $this->checkaccess($access);
        $data['page'] = 'editproject';
        $data['page2'] = 'block/imageblock';
        $data[ 'status' ] = $this->user_model->getstatusdropdown();
        $data[ 'before1' ] = $this->input->get('id');
        $data['title'] = 'Edit project';
        $data['before'] = $this->project_model->beforeedit($this->input->get('id'));
        $this->load->view('templatewith2', $data);
    }
    public function editprojectsubmit()
    {
        $access = array('1');
        $this->checkaccess($access);
        $this->form_validation->set_rules('id', 'ID', 'trim');
        $this->form_validation->set_rules('order', 'Order', 'trim');
        $this->form_validation->set_rules('status', 'Status', 'trim');
        $this->form_validation->set_rules('name', 'Name', 'trim');
            $this->form_validation->set_rules('icon', 'Icon', 'trim');
                $this->form_validation->set_rules('desc', 'Desc', 'trim');
        if ($this->form_validation->run() == false) {
            $data['alerterror'] = validation_errors();
            $data['page'] = 'editproject';
            $data[ 'status' ] = $this->user_model->getstatusdropdown();
            $data['title'] = 'Edit project';
            $data['before'] = $this->project_model->beforeedit($this->input->get('id'));
            $this->load->view('template', $data);
        } else {
            $id = $this->input->get_post('id');
            $order = $this->input->get_post('order');
            $status = $this->input->get_post('status');
            $name = $this->input->get_post('name');
              $icon = $this->input->get_post('icon');
                $desc = $this->input->get_post('desc');
            if ($this->project_model->edit($id, $order, $status, $name,$icon,$desc) == 0) {
                $data['alerterror'] = 'New project could not be Updated.';
            } else {
                $data['alertsuccess'] = 'project Updated Successfully.';
            }
            $data['redirect'] = 'site/viewproject';
            $this->load->view('redirect', $data);
        }
    }
    public function deleteproject()
    {
        $access = array('1');
        $this->checkaccess($access);
        $this->project_model->delete($this->input->get('id'));
        $data['redirect'] = 'site/viewproject';
        $this->load->view('redirect', $data);
    }
    public function viewprojectimages()
    {
        $access = array('1');
        $this->checkaccess($access);
        $data['page'] = 'viewprojectimages';
        $data['page2'] = 'block/imageblock';
        $data[ 'before1' ] = $this->input->get('id');
        $data['base_url'] = site_url('site/viewprojectimagesjson');
        $data['title'] = 'View projectimages';
        $this->load->view('templatewith2', $data);
    }
    public function viewprojectimagesjson()
    {
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = '`realestate_projectimages`.`id`';
        $elements[0]->sort = '1';
        $elements[0]->header = 'ID';
        $elements[0]->alias = 'id';
        $elements[1] = new stdClass();
        $elements[1]->field = '`realestate_projectimages`.`project`';
        $elements[1]->sort = '1';
        $elements[1]->header = 'Project';
        $elements[1]->alias = 'project';
        $elements[2] = new stdClass();
        $elements[2]->field = '`realestate_projectimages`.`image`';
        $elements[2]->sort = '1';
        $elements[2]->header = 'Image';
        $elements[2]->alias = 'image';
        $search = $this->input->get_post('search');
        $pageno = $this->input->get_post('pageno');
        $orderby = $this->input->get_post('orderby');
        $orderorder = $this->input->get_post('orderorder');
        $maxrow = $this->input->get_post('maxrow');
        if ($maxrow == '') {
            $maxrow = 20;
        }
        if ($orderby == '') {
            $orderby = 'id';
            $orderorder = 'ASC';
        }
        $data['message'] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, 'FROM `realestate_projectimages`');
        $this->load->view('json', $data);
    }

    public function createprojectimages()
    {
        $access = array('1');
        $this->checkaccess($access);
        $data['page'] = 'createprojectimages';
        $data['title'] = 'Create projectimages';
$data[ 'project' ] = $this->projectimages_model->getprojectdropdown();
        $this->load->view('template', $data);
    }
    public function createprojectimagessubmit()
    {
        $access = array('1');
        $this->checkaccess($access);
        $this->form_validation->set_rules('project', 'Project', 'trim');
        $this->form_validation->set_rules('image', 'Image', 'trim');
			$data[ 'project' ] = $this->projectimages_model->getprojectdropdown();
        if ($this->form_validation->run() == false) {
            $data['alerterror'] = validation_errors();
            $data['page'] = 'createprojectimages';
            $data['title'] = 'Create projectimages';
            $this->load->view('template', $data);
        } else {
            $project = $this->input->get_post('project');
            $image = $this->input->get_post('image');
            if ($this->projectimages_model->create($project, $image) == 0) {
                $data['alerterror'] = 'New projectimages could not be created.';
            } else {
                $data['alertsuccess'] = 'projectimages created Successfully.';
            }
            $data['redirect'] = 'site/viewprojectimages';
            $this->load->view('redirect', $data);
        }
    }
    public function editprojectimages()
    {
        $access = array('1');
        $this->checkaccess($access);
        $data['page'] = 'editprojectimages';
        $data['title'] = 'Edit projectimages';
        $data['project']=$this->projectimages_model->getprojectdropdown();
      $data["before"]=$this->projectimages_model->beforeedit($this->input->get("id"));
        $this->load->view('template', $data);
    }
    public function editprojectimagessubmit()
    {
        $access = array('1');
        $this->checkaccess($access);
        $this->form_validation->set_rules('id', 'ID', 'trim');
        $this->form_validation->set_rules('project', 'Project', 'trim');
        $data['project']=$this->projectimages_model->getprojectdropdown();
        $this->form_validation->set_rules('image', 'Image', 'trim');
        if ($this->form_validation->run() == false) {
            $data['alerterror'] = validation_errors();
            $data['page'] = 'editprojectimages';
$data['project']=$this->projectimages_model->getprojectdropdown();
            $data['title'] = 'Edit projectimages';
            $data['before'] = $this->projectimages_model->beforeedit($this->input->get('id'));
            $this->load->view('template', $data);
        } else {
            $id = $this->input->get_post('id');
            $project = $this->input->get_post('project');

            $config['upload_path'] = './uploads/';
           						$config['allowed_types'] = 'gif|jpg|png|jpeg';
           						$this->load->library('upload', $config);
           						$filename="image";
           						$image="";
           						if (  $this->upload->do_upload($filename))
           						{
           							$uploaddata = $this->upload->data();
           							$image=$uploaddata['file_name'];
           						}

           						if($image=="")
           						{
           						$image=$this->projectimages_model->getimagebyid($id);
           						   print_r($image);
           							$image=$image->image;
           						}

            if ($this->projectimages_model->edit($id, $project, $image) == 0) {
                $data['alerterror'] = 'New projectimages could not be Updated.';
            } else {
                $data['alertsuccess'] = 'projectimages Updated Successfully.';
            }
            $data['redirect'] = 'site/viewprojectimages';
            $this->load->view('redirect', $data);
        }
    }
    public function deleteprojectimages()
    {
        $access = array('1');
        $this->checkaccess($access);
        $this->projectimages_model->delete($this->input->get('id'));
        $data['redirect'] = 'site/viewprojectimages';
        $this->load->view('redirect', $data);
    }
    public function viewdetailproject()
    {
        $access = array('1');
        $this->checkaccess($access);
        $data['page'] = 'viewdetailproject';
        $data['base_url'] = site_url('site/viewdetailprojectjson');
        $data['title'] = 'View detailproject';
        $this->load->view('template', $data);
    }
    public function viewdetailprojectjson()
    {
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = '`realestate_detailproject`.`id`';
        $elements[0]->sort = '1';
        $elements[0]->header = 'ID';
        $elements[0]->alias = 'id';
        $elements[1] = new stdClass();
        $elements[1]->field = '`realestate_detailproject`.`projectimages`';
        $elements[1]->sort = '1';
        $elements[1]->header = 'Project Image';
        $elements[1]->alias = 'projectimages';
        $elements[2] = new stdClass();
        $elements[2]->field = '`realestate_detailproject`.`name`';
        $elements[2]->sort = '1';
        $elements[2]->header = 'Name';
        $elements[2]->alias = 'name';
        $elements[3] = new stdClass();
        $elements[3]->field = '`realestate_detailproject`.`image`';
        $elements[3]->sort = '1';
        $elements[3]->header = 'Image';
        $elements[3]->alias = 'image';
        $elements[4] = new stdClass();
        $elements[4]->field = '`realestate_detailproject`.`content`';
        $elements[4]->sort = '1';
        $elements[4]->header = 'Content';
        $elements[4]->alias = 'content';
        $elements[5] = new stdClass();
        $elements[5]->field = '`realestate_detailproject`.`text`';
        $elements[5]->sort = '1';
        $elements[5]->header = 'Text';
        $elements[5]->alias = 'text';
        $search = $this->input->get_post('search');
        $pageno = $this->input->get_post('pageno');
        $orderby = $this->input->get_post('orderby');
        $orderorder = $this->input->get_post('orderorder');
        $maxrow = $this->input->get_post('maxrow');
        if ($maxrow == '') {
            $maxrow = 20;
        }
        if ($orderby == '') {
            $orderby = 'id';
            $orderorder = 'ASC';
        }
        $data['message'] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, 'FROM `realestate_detailproject`');
        $this->load->view('json', $data);
    }

    public function createdetailproject()
    {
        $access = array('1');
        $this->checkaccess($access);
        $data['page'] = 'createdetailproject';
        $data['title'] = 'Create detailproject';
        $this->load->view('template', $data);
    }
    public function createdetailprojectsubmit()
    {
        $access = array('1');
        $this->checkaccess($access);
        $this->form_validation->set_rules('projectimages', 'Project Image', 'trim');
        $this->form_validation->set_rules('name', 'Name', 'trim');
        $this->form_validation->set_rules('image', 'Image', 'trim');
        $this->form_validation->set_rules('content', 'Content', 'trim');
        $this->form_validation->set_rules('text', 'Text', 'trim');
        if ($this->form_validation->run() == false) {
            $data['alerterror'] = validation_errors();
            $data['page'] = 'createdetailproject';
            $data['title'] = 'Create detailproject';
            $this->load->view('template', $data);
        } else {
            $projectimages = $this->input->get_post('projectimages');
            $name = $this->input->get_post('name');
            $image = $this->input->get_post('image');
            $content = $this->input->get_post('content');
            $text = $this->input->get_post('text');
            if ($this->detailproject_model->create($projectimages, $name, $image, $content, $text) == 0) {
                $data['alerterror'] = 'New detailproject could not be created.';
            } else {
                $data['alertsuccess'] = 'detailproject created Successfully.';
            }
            $data['redirect'] = 'site/viewdetailproject';
            $this->load->view('redirect', $data);
        }
    }
    public function editdetailproject()
    {
        $access = array('1');
        $this->checkaccess($access);
        $data['page'] = 'editdetailproject';
        $data['title'] = 'Edit detailproject';
        $data['before'] = $this->detailproject_model->beforeedit($this->input->get('id'));
        $this->load->view('template', $data);
    }
    public function editdetailprojectsubmit()
    {
        $access = array('1');
        $this->checkaccess($access);
        $this->form_validation->set_rules('id', 'ID', 'trim');
        $this->form_validation->set_rules('projectimages', 'Project Image', 'trim');
        $this->form_validation->set_rules('name', 'Name', 'trim');
        $this->form_validation->set_rules('image', 'Image', 'trim');
        $this->form_validation->set_rules('content', 'Content', 'trim');
        $this->form_validation->set_rules('text', 'Text', 'trim');
        if ($this->form_validation->run() == false) {
            $data['alerterror'] = validation_errors();
            $data['page'] = 'editdetailproject';
            $data['title'] = 'Edit detailproject';
            $data['before'] = $this->detailproject_model->beforeedit($this->input->get('id'));
            $this->load->view('template', $data);
        } else {
            $id = $this->input->get_post('id');
            $projectimages = $this->input->get_post('projectimages');
            $name = $this->input->get_post('name');
            $image = $this->input->get_post('image');
            $content = $this->input->get_post('content');
            $text = $this->input->get_post('text');
            if ($this->detailproject_model->edit($id, $projectimages, $name, $image, $content, $text) == 0) {
                $data['alerterror'] = 'New detailproject could not be Updated.';
            } else {
                $data['alertsuccess'] = 'detailproject Updated Successfully.';
            }
            $data['redirect'] = 'site/viewdetailproject';
            $this->load->view('redirect', $data);
        }
    }
    public function deletedetailproject()
    {
        $access = array('1');
        $this->checkaccess($access);
        $this->detailproject_model->delete($this->input->get('id'));
        $data['redirect'] = 'site/viewdetailproject';
        $this->load->view('redirect', $data);
    }




        public function viewcontact()
        {
            $access = array('1');
            $this->checkaccess($access);
            $data['page'] = 'viewcontact';
            $data['base_url'] = site_url('site/viewcontactjson');
            $data['title'] = 'View Contact';
            $this->load->view('template', $data);
        }
        public function viewcontactjson()
        {
            $elements = array();
            $elements[0] = new stdClass();
            $elements[0]->field = '`realestate_contact`.`id`';
            $elements[0]->sort = '1';
            $elements[0]->header = 'ID';
            $elements[0]->alias = 'id';
            $elements[1] = new stdClass();
            $elements[1]->field = '`realestate_contact`.`message`';
            $elements[1]->sort = '1';
            $elements[1]->header = 'Message';
            $elements[1]->alias = 'message';
            $elements[2] = new stdClass();
            $elements[2]->field = '`realestate_contact`.`email`';
            $elements[2]->sort = '1';
            $elements[2]->header = 'Email';
            $elements[2]->alias = 'email';
            $elements[3] = new stdClass();
            $elements[3]->field = '`realestate_contact`.`name`';
            $elements[3]->sort = '1';
            $elements[3]->header = 'Name';
            $elements[3]->alias = 'name';
            $search = $this->input->get_post('search');
            $pageno = $this->input->get_post('pageno');
            $orderby = $this->input->get_post('orderby');
            $orderorder = $this->input->get_post('orderorder');
            $maxrow = $this->input->get_post('maxrow');
            if ($maxrow == '') {
                $maxrow = 20;
            }
            if ($orderby == '') {
                $orderby = 'id';
                $orderorder = 'ASC';
            }
            $data['message'] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, 'FROM `realestate_contact`');
            $this->load->view('json', $data);
        }


        public function createcontact()
        {
            $access = array('1');
            $this->checkaccess($access);
            $data['page'] = 'createcontact';
            $data['title'] = 'Create Contact';
            $this->load->view('template', $data);
        }
        public function createcontactsubmit()
        {
            $access = array('1');
            $this->checkaccess($access);
              $this->form_validation->set_rules('id', 'Id', 'trim');
            $this->form_validation->set_rules('name', 'Name', 'trim');
            $this->form_validation->set_rules('email', 'Email', 'trim');
            $this->form_validation->set_rules('message', 'Message', 'trim');
            if ($this->form_validation->run() == false) {
                $data['alerterror'] = validation_errors();
                $data['page'] = 'createcontact';
                $data['title'] = 'Create Contact';
                $this->load->view('template', $data);
            } else {
                $name = $this->input->get_post('name');
                $email = $this->input->get_post('email');
                $message = $this->input->get_post('message');
                if ($this->contact_model->create($name, $email, $message) == 0) {
                    $data['alerterror'] = 'New project could not be created.';
                } else {
                    $data['alertsuccess'] = 'project created Successfully.';
                }
                $data['redirect'] = 'site/viewcontact';
                $this->load->view('redirect', $data);
            }
        }
        public function editcontact()
        {
            $access = array('1');
            $this->checkaccess($access);
            $data['page'] = 'editcontact';
            $data['page2'] = 'block/imageblock';
            $data[ 'before1' ] = $this->input->get('id');
            $data['title'] = 'Edit Contact';
            $data['before'] = $this->contact_model->beforeedit($this->input->get('id'));
            $this->load->view('templatewith2', $data);
        }
        public function editcontactsubmit()
        {
            $access = array('1');
            $this->checkaccess($access);
            $this->form_validation->set_rules('id', 'ID', 'trim');
            $this->form_validation->set_rules('name', 'Name', 'trim');
            $this->form_validation->set_rules('email', 'Email', 'trim');
            $this->form_validation->set_rules('message', 'Message', 'trim');
            if ($this->form_validation->run() == false) {
                $data['alerterror'] = validation_errors();
                $data['page'] = 'editcontact';
                $data['title'] = 'Edit Contact';
                $data['before'] = $this->contact_model->beforeedit($this->input->get('id'));
                $this->load->view('template', $data);
            } else {
                $id = $this->input->get_post('id');
                $name = $this->input->get_post('name');
                $email = $this->input->get_post('email');
                $message = $this->input->get_post('message');
                if ($this->contact_model->edit($id, $name, $email, $message) == 0) {
                    $data['alerterror'] = 'New project could not be Updated.';
                } else {
                    $data['alertsuccess'] = 'project Updated Successfully.';
                }
                $data['redirect'] = 'site/viewcontact';
                $this->load->view('redirect', $data);
            }
        }
        public function deletecontact()
        {
            $access = array('1');
            $this->checkaccess($access);
            $this->contact_model->delete($this->input->get('id'));
            $data['redirect'] = 'site/viewcontact';
            $this->load->view('redirect', $data);
        }
}
