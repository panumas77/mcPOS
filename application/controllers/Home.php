<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        //$this->load->model("account_model");
        
    }
	
public function index()
	{
         $data['main_content'] = 'home/index';
         $this->load->view("includes/template",$data);

	}


      
}
