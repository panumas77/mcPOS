<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        $this->load->model("account_model");
        
    }

    public function index()
	{
       
        $data['main_content'] = 'pages/signup';
        $this->load->view("includes/template",$data);
		
	}
    public function create_account()
    {
        //validate rule
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_if_user_exits');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) //Don't Validate
                {
                        $data['main_content'] = 'pages/signup';
                        $this->load->view("includes/template",$data);
                }
                else
                {   
                    $results = $this->account_model->get_new_mem_number();
                        if($query = $this->account_model->create_account($results['member_number'],$results['lv'])){

                            $data['result_message'] = "<h1>Your account has been created.</h1></br> <p>You may now ".anchor(base_url(), 'login')."</p>";
                            
                            $data['main_content'] = 'pages/result';
                            $this->load->view("includes/template",$data);       


                        } else {

                        $data['result_message'] = "<h1>Your account created fial.</h1></br> <p>Please sign up again!".anchor(base_url()."/index.php/signup/", 'Click here')."</p>";

                        $data['main_content'] = 'pages/result';
                        $this->load->view("includes/template",$data);
                        }                             
                }
    }
    function check_if_user_exits($requested_username) // custum callback function
    {
        $username_available = $this->account_model->check_if_user_exits($requested_username);
        if ($username_available) {
                return TRUE;
            } else {
                return FALSE;
                    }
            }  

public function under_id()
    {
        if(isset($_GET['item'])){
            $under_id = strtolower($_GET['itme']);
            $result = $this->account->under_id($under_id,'both');
            if(count($result)>0) {
                foreach ($result as $rs)
                $list_under_id[] = $rs->name;
                echo json_encode($list_under_id); 
            }
        }


        $data['main_content'] = 'pages/signup';
        $this->load->view("includes/template",$data);
                
    }

public function fetch()
    {
        $query = $this->db->like('full_name',"%".$_POST["query"]."%")->get('account');

            foreach ($query->result() as $row)
            {
                $data[] = $row->full_name;
            }
            echo json_encode($data);
                }    
         
}
