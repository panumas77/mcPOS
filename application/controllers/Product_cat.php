<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_cat extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        
    }
	

public function index() {

    $data['fields'] = array(
        '#' => '#',
        'product_cat_name' => 'ชื่อประเภทสินค้า',
        'action' => 'คำสั่ง'
        );

    $results = $this->product_model->cat_list_item();
    $data['rs'] = $results['rows'];

        $data['main_content'] = 'product/cat';
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
                    'product_cat_name' => $this->input->post('product_cat_name')
                );

                $this->db->insert("product_cat",$dataInsert);

                redirect("product_cat","refresh");
                exit();
 //   } else {
 
  //      $data['main_content'] = 'member/manage';
  //      $this->load->view("includes/template",$data);


  // }

}
public function edit($id){
    $dataUpdate = array(
                    'product_cat_name' => $this->input->post('prodproduct_cat_nameuct_name')
                );

         $this->db->where("product_cat_id",$id);
         $this->db->update("product_cat",$dataUpdate);

         redirect("product_cat","refresh");
         exit();
}



public function delete($id){
   
       $this->db->delete('product_cat',array('product_cat_id' => $id));
       redirect("product_cat","refresh");
}

}