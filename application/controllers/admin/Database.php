<?php 
date_default_timezone_set('Asia/Dhaka');
require APPPATH . '/libraries/BaseController.php';
class Database extends CI_Controller
{
 
  function __construct()
  {
    parent::__construct();
    $isLoggedIn = $this->session->userdata('isLoggedIn');
    if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
          redirect('admin/login');
        }
  }

    function index(){
    $data['title'] = ucfirst('database');
      $data['username'] = $this->session->userdata ( 'username' );
      $data['tables'] = $tables = $this->db->list_tables();


      $mysql = array('server' => $this->db->hostname,
                      'user' => $this->db->username,
                      'password' => $this->db->password,
                      'database' => $this->db->database
                      );
      
      $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/pages/database',$mysql);
      $this->load->view('admin/templates/footer');
    }
function phpmyadmin(){
      $data['server'] = $this->db->hostname;
      $data['user'] = $this->db->username;
      $data['password'] = $this->db->password;
      $data['database'] = $this->db->database;

      $this->load->view('admin/pages/phpmyadmin',$data);
}

 }