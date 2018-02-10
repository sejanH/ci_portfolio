<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');
class Action extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/action_model');
    }
    
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $data['title'] = ucfirst('admin Login');
            $this->load->view('admin/templates/header_login',$data);
            $this->load->view('admin/pages/login');
            $this->load->view('admin/templates/footer',$data);
        }
        else
        {
            redirect('admin');
        }
    }
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        isLoggedIn();
    }
    
   
    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        $name = ucwords(strtolower($this->input->post('fname')));
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $username = $this->input->post('username');
        $sQA = $this->input->post('securityQA');
        $options = ['cost' => 11];
        $hashedpassword = password_hash($password, PASSWORD_BCRYPT, $options);
        
        $userInfo = array('username'=>$username,'email'=>$email, 'password'=>$hashedpassword, 'name'=> $name,'securityQA'=>$sQA);
        
        $result = $this->action_model->addNewUser($userInfo);
        
        if($result > 0)
        {
            echo 1;
        }
        else
        {
            echo "Failed to register! Please try again";
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if($userId == null)
        {
            redirect('admin');
        }
        $data['username'] = $this->session->userdata ( 'username' );
        if($userId==$data['username'])
        {
            $data['title'] = 'Edit User';
            $data['userInfo'] = $this->action_model->getUserInfo($userId);
            $data['sections'] = $this->getContent->pageSections();
            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/pages/editOld');
            $this->load->view('admin/templates/footer');
        }else{
            $data['title'] = 'Access Denied';
            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/pages/editOld');
            $this->load->view('admin/templates/footer');
        }
       
    }
    
    function editUser($userId=NULL)
    {

        $data['id'] = $this->session->userdata ( 'id' );

        $name = ucwords(strtolower($this->input->post('fname')));
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $username = $this->input->post('username');
        $sQA = $this->input->post('sQA');
        $options = ['cost' => 11];
        $hashedpassword = password_hash($password, PASSWORD_BCRYPT, $options);

        $userInfo = array();
        
        if(empty($password))
        {
            $userInfo = array('email'=>$email, 'username'=>$username, 'name'=>$name,'securityQA'=>$sQA);
        }
        else
        {
            $userInfo = array('email'=>$email, 'password'=>$hashedpassword, 'username'=>$username,
                'name'=>ucwords($name), 'securityQA'=>$sQA);
        }
        if($userId==$data['id'])
        {
             $result = $this->action_model->editUser($userInfo, $userId);
           
            if($result == true)
            {
                $this->session->set_flashdata('success', 'User updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'User update failed');
            } 
        }

        $redirect = $this->db->select("username")
                            ->from("admin")
                            ->where("id",$userId)
                            ->get()
                            ->result();
        $uname = $redirect[0]->username;
        if($uname==$this->session->userdata ( 'username' )){
             redirect('admin/edit/'.$uname);
        }else{
            redirect('admin/logout');
        }
    }
    
    function section_order(){
        
    }

    function site(){
        $this->global['title'] = 'Site analytics';
        
        $this->loadViews("admin/pages/site-analytics", $this->global, NULL , NULL);
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }    
}
 