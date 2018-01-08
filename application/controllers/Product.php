<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        
    }

public function index() {

        $data['fields'] = array(
            '#' => '#',
            'photo' => 'Photo',
            'product_id' => 'รหัสชื่อสินค้า',
            'product_name' => 'ชื่อสินค้า',
            'product_cat_name' => 'ประเภท',
            'product_price_by_unit' => 'ราคาต่อหน่วย',
            'action' => 'คำสั่ง'
            );

    $results = $this->product_model->product_list();
    $data['rs'] = $results['rows'];
     //-ส่งค่า Option list--------------------------------------------------
    $data['product_cat_options'] = $this->product_model->product_cat_list_options();

        $data['main_content'] = 'product/list';
        $this->load->view("includes/template",$data);

    }

public function add_form()
{
    //-ส่งค่า Option list--------------------------------------------------
    $data['product_cat_options'] = $this->product_model->product_cat_list_options();

    $data['main_content'] = 'product/product_add_form';
    $this->load->view("includes/template",$data);
		
}
public function add(){

    //validate rule
    $this->form_validation->set_rules('product_name', 'ชื่อสินค้า', 'trim|required');
    $this->form_validation->set_rules('product_cat_list', 'ประเภทสินค้า', 'trim|required');
    $this->form_validation->set_rules('product_price_by_unit', 'ราคาต่อหน่วย', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) //Don't Validate
    {
        //-ส่งค่า Option list--------------------------------------------------
        $data['product_cat_options'] = $this->product_model->product_cat_list_options();
        
        $data['main_content'] = 'product/product_add_form';
        $this->load->view("includes/template",$data);
    }
    else
    { 
        $dataInsert = array(
            'product_name' => $this->input->post('product_name'),
            'product_cat_id_ref' => $this->input->post('product_cat_list'),
            'product_price_by_unit' => $this->input->post('product_price_by_unit')
            );
      
            $this->db->insert("product",$dataInsert);
      
        redirect("product","refresh");
        exit();
    }
 
      
}
      
      
public function edit($id){
    $dataUpdate = array(
            'product_name' => $this->input->post('product_name'),
            'product_cat_id_ref' => $this->input->post('product_cat_list'),
            'product_price_by_unit' => $this->input->post('product_price_by_unit')
            );
      
            $this->db->where("product_id",$id);
            $this->db->update("product",$dataUpdate);
      
        redirect("product","refresh");
        exit();
      }
      
      
      
public function delete($id){
         
        $this->db->delete('product',array('product_id' => $id));
        redirect("product","refresh");
}    

//################# Category ##################################    
public function cat() {
        
        $data['fields'] = array(
            '#' => '#',
            'product_cat_name' => 'ชื่อประเภทสินค้า',
            'action' => 'คำสั่ง'
            );
        
        $results = $this->product_model->cat_list();
        $data['rs'] = $results['rows'];
    //-ส่งค่า Option list--------------------------------------------------
        $data['product_cat_options'] = $this->product_model->product_cat_list_options();
        
        $data['main_content'] = 'product/cat';
        $this->load->view("includes/template",$data);
        
}
public function cat_add_form()
{
       
    $data['main_content'] = 'product/cat_add_form';
    $this->load->view("includes/template",$data);
		
}
public function cat_add(){

    //validate rule
    $this->form_validation->set_rules('product_cat_name', 'ชื่อประเภทสินค้า', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) //Don't Validate
    {
        $data['main_content'] = 'product/cat_add_form';
        $this->load->view("includes/template",$data);
    }
    else
    { 
        $dataInsert = array(
            'product_cat_name' => $this->input->post('product_cat_name')
            );
      
            $this->db->insert("product_cat",$dataInsert);
      
        redirect("product/cat","refresh");
        exit();
    }
    
      
}
      
      
public function cat_edit($id){
    $dataUpdate = array(
            'product_cat_name' => $this->input->post('product_cat_name')
            );
      
            $this->db->where("product_cat_id",$id);
            $this->db->update("product_cat",$dataUpdate);
      
        redirect("product/cat","refresh");
        exit();
      }
      
      
      
public function cat_delete($id){
         
        $this->db->delete('product',array('product_id' => $id));
        redirect("product/cat","refresh");
}   
            
//################# Stock ##################################  
public function stock() {

    $data['fields'] = array(
        'No' => 'No',
        'member_name' => 'Full Name',
        'member_mobile' => 'Mobile',
        'action' => 'Action'
        );

    $results = $this->product_model->product_list();
    $data['rs'] = $results['rows'];

        $data['main_content'] = 'product/stock';
        $this->load->view("includes/template",$data);

    }
public function stock_add(){
    $dataInsert = array(
            'product_name' => $this->input->post('product_name'),
            'product_cat_id_ref' => $this->input->post('product_cat_list'),
            'product_price_by_unit' => $this->input->post('product_price_by_unit')
            );
      
            $this->db->insert("product_stock",$dataInsert);
      
        redirect("product/stock","refresh");
        exit();
      
}
      
      
public function stock_edit($id){
    $dataUpdate = array(
            'product_cat_name' => $this->input->post('cat_name_edit')
            );
      
            $this->db->where("product_cat_id",$id);
            $this->db->update("product_cat",$dataUpdate);
      
        redirect("product/stock","refresh");
        exit();
}
      
      
      
public function stock_delete($id){
         
        $this->db->delete('product',array('product_id' => $id));
        redirect("product/stock","refresh");
}   


}