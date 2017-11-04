<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$data['title'] = $this->getContent->getTitle();
		$data['content'] = $this->getContent->pageContent();
		$this->load->view('index',$data);
	}
}
