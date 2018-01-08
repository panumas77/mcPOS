<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        $this->load->model("account_model");
        
    }

function validate_credentials()
        {

            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $query = $this->account_model->validate();

        if ($this->form_validation->run() == FALSE) //Don't Validate
                {
                        $data['main_content'] = 'pages/login';
                        $this->load->view("includes/template",$data);
                }
                else
                {  

                    if($query){
                        $user_query = $this->db->get_where('account',array('username' => $this->input->post('username')));
                        $row = $user_query->row_array();        
                    $sess_data = array(
                            'username' => $this->input->post('username'),
                            'full_name' => $row['full_name'],
                            'under_id' => $row['under_id'],
                            'lv' => $row['lv'],
                            'role' => $row['role'],
                            'is_logged_in' => TRUE                
                    );
                    $this->session->set_userdata($sess_data);
                    
                    redirect('member/info');

                    } else { // incorrect username or password
                    $data['main_content'] = 'pages/login';
                    $this->load->view("includes/template",$data);
                    }
                }

        }
public function logout()
        {
                $this->session->sess_destroy();
                redirect(base_url());
        }        
}
