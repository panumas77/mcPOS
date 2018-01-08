<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {



function product_list(){

        $sort_order = 'desc';
        $sort_colums = array('product_name');
        $sort_by = 'product_name';

        // results query
         $query = $this->db->select('*')
                ->from('product')
                ->join('product_cat','product_cat_id_ref=product_cat_id','left')
                ->order_by($sort_by, $sort_order);
               
            $ret['rows'] = $query->get()->result();


            return $ret;
} 
public function showAllCat(){

        $sort_order = 'desc';
        $sort_colums = array('product_cat_name');
        $sort_by = 'product_cat_name';

        // results query
         $query = $this->db->order_by($sort_by, $sort_order)->get('product_cat');

          if($query->num_rows() > 0) {
              return $query->result();
          } else {
                return false;
          }  
} 
function cat_list(){

        $sort_order = 'desc';
        $sort_colums = array('product_cat_name');
        $sort_by = 'product_cat_name';

        // results query
         $query = $this->db->select('*')
                ->from('product_cat')
                ->order_by($sort_by, $sort_order);
               
            $ret['rows'] = $query->get()->result();


            return $ret;
    }   

public function addCat(){
        $dataInsert = array(
            'product_cat_name' => $this->input->post('txtCatName')
        );
        $this->db->insert("product_cat",$dataInsert);
        if($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }
    
////////////////////////////   function ทำงานซ้ำต่างๆ  ///////////////////////////



////////////////////////////   Combo Option List ////////////////////////////////

 function product_cat_list_options(){    

        $query = $this->db->order_by('product_cat_name','asc')->get('product_cat');

            $product_cat_list_options = array('' => '-- เลือก --');
            foreach ($query->result() as $row) {

                    $product_cat_list_options[$row->product_cat_id] = $row->product_cat_name;
              }


        return $product_cat_list_options;

    }  

}