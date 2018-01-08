<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
public function __construct()
    {
        parent::__construct();
       // $this->load->model("account_model");
        
    }
	
public function index()
	{
         $data['main_content'] = 'pages/login';
         $this->load->view("includes/template",$data);

	}


public function admin()
	{
                $data['main_content'] = 'admin/main';
                $this->load->view("admin/inc/template",$data);
		
    }    
    
public function signup()
	{
                $data['main_content'] = 'pages/signup';
                $this->load->view("includes/template",$data);
		
	}      

public function logout()
	{
                $this->session->sess_destroy();

                $data['main_content'] = 'login_form';
                $this->load->view("includes/template",$data);
		
	}


      
}
