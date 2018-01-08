<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        $this->load->model("account_model");
        
    }
	

public function index() {

    $data['fields'] = array(
        '#' => '#',
        'member_number' => 'รหัส',
        'full_name' => 'ชื่อ-สกุล',
        'lv' => 'ระดับ',
        'username' => 'อีเมล์ / เบอร์มือถือ',
        'line_id' => 'Line ID',
        'facebook_link' => 'Facebook',
        'role' => 'Role',
        'action' => 'คำสั่ง'
        );

    $results = $this->account_model->list_item();
    $data['rs'] = $results['rows'];

        $data['main_content'] = 'member/list';
        $this->load->view("includes/template",$data);

    }
public function info()
	{
		$data['main_content'] = 'member/info';
		$this->load->view("includes/template",$data);
	}
/* public function showAllMember() {

    $data['fields'] = array(
        'No' => 'No',
        'member_name' => 'Full Name',
        'member_mobile' => 'Mobile',
        'action' => 'Action'
        );

    $results = $this->Member_model->showAllMember();
    $data['rs'] = $results['rows'];

    echo json_encode($results);

        $data['main_content'] = 'member/list2';
        $this->load->view("includes/template",$data);

    } */

public function add(){
   // if ($this->session->userdata('logged_in') == true) {
  $dataInsert = array(
                    'member_mobile' => $this->input->post('mobile'),
                    'full_name' => $this->input->post('full_name')
                );

                $this->db->insert("member",$dataInsert);

                redirect("member","refresh");
                exit();
 //   } else {
 
  //      $data['main_content'] = 'member/manage';
  //      $this->load->view("includes/template",$data);


  // }

}
public function edit($id){
    $dataUpdate = array(                    
                    'full_name' => $this->input->post('full_name'),
                    'line_id' => $this->input->post('line_id'),
                    'facebook_link' => $this->input->post('facebook_link'),
                    'class' => $this->input->post('class'),
                );

         $this->db->where("account_id",$id);
         $this->db->update("account",$dataUpdate);

         redirect("member","refresh");
         exit();
}



public function delete($id){
   
       $this->db->delete('member',array('member_id' => $id));
       redirect("member","refresh");
}

}