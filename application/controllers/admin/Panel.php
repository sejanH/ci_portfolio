<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');
class Panel extends CI_Controller
{
 
  function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
  }
 
  public function index()
  {
    $isLoggedIn = $this->session->userdata('isLoggedIn');
    if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
          redirect('admin/login');
        }
        else
        {
            $data['title'] = ucfirst('dashboard');
            $data['username'] = $this->session->userdata ( 'username' );
            $data['sections'] = $this->getContent->pageSections();

            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/pages/home');
            $this->load->view('admin/templates/footer');
        }
  }
public function section($section=NULL)
  {$isLoggedIn = $this->session->userdata('isLoggedIn');
    if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
          redirect('admin/login');
        }

    $data['title'] = 'Sections &raquo; '.ucfirst($section);
    $data['username'] = $this->session->userdata ( 'username' );
    $data['sections'] = $this->getContent->pageSections();
    $data['content'] = $this->getContent->pageContent($section);

    $this->load->view('admin/templates/header',$data);
    $this->load->view('admin/pages/section');
    $this->load->view('admin/templates/footer');
  }

  public function addNewSection(){
     $isLoggedIn = $this->session->userdata('isLoggedIn');
    if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
          redirect('admin/login');
        }

   $data['title'] = 'Sections &raquo; '.ucfirst('add new');
   $data['username'] = $this->session->userdata ( 'username' );
    $data['sections'] = $this->getContent->pageSections(); 

    $this->load->view('admin/templates/header',$data);
    $this->load->view('admin/pages/section');
    $this->load->view('admin/templates/footer');
  }

  public function addNewSectionNow(){
     $isLoggedIn = $this->session->userdata('isLoggedIn');
    if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
          redirect('admin/login');
        }

      $sectionInfo = array(
                      'section' => $this->input->post('addSection'),
                      'color'   => $this->input->post('cp9'),
                      'body'    => $this->input->post('sectionaddBody')
                      );
      $this->load->model('admin/action_model');
      $result = $this->action_model->addSection($sectionInfo);
      if($result > 0){
        echo 1;
      }else{
        echo 0;
      }

  }

public function editSection($section=NULL){
  $isLoggedIn = $this->session->userdata('isLoggedIn');
    if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
          redirect('admin/login');
        }

    $this->load->model('admin/action_model');
    $sectionInfo = array(
                      'section' => $this->input->post('editSection'),
                      'body' => $this->input->post('editsectionbody'),
                      'color' => $this->input->post('editcp9')
                      );
    $result = $this->action_model->editSection($section,$sectionInfo);
    if($result==true){
      echo 1;
    }else{
      echo 0;
    }
}

  public function remove($section=NULL){
          $isLoggedIn = $this->session->userdata('isLoggedIn');
          if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
              {
                redirect('admin/login');
              }
      if($section==NULL){
          $data['title'] = 'Sections &raquo; '.ucfirst('remove');
          $data['username'] = $this->session->userdata ( 'username' );
          $data['sections'] = $this->getContent->pageSections(); 


          $this->load->view('admin/templates/header',$data);
          $this->load->view('admin/pages/sectionremove');
          $this->load->view('admin/templates/footer');
      }else{
        $this->load->model('admin/action_model');
        $result = $this->action_model->deleteSection($section);
        $msg['success'] = false;
        if($result){
          $msg['success'] = true;
        }
        echo json_encode($msg);
       }
  }
  public function sectionLoad(){
      $isLoggedIn = $this->session->userdata('isLoggedIn');
      if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
          {
            redirect('admin/login');
          }

      $result = $this->getContent->pageSections();
      echo json_encode($result);
  }

  public function changeTheme(){
    $isLoggedIn = $this->session->userdata('isLoggedIn');
    if(!isset($isLoggedIn) || $isLoggedIn != TRUE){
          redirect('admin/login');
        }

    $val = $this->input->post('theme');
    $this->db->where("username",$this->session->userdata('username'));
    $this->db->update("admin",array('theme'=>$val));
    if($this->db->affected_rows() > 0){
      echo 1;
    }else{
      echo 0;
    }
  }

}


