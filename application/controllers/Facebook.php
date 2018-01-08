<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        //$this->load->model("account_model");
        
    }
	
public function index()
	{
         $data['main_content'] = 'facebook/index';
         $this->load->view("includes/template",$data);

	}


      
}
