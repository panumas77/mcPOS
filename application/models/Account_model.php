<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

public function list_item(){
		
	$sort_order = 'asc';
	$sort_colums = array('full_name');
	$sort_by = 'full_name';
		
	// results query
	$query = $this->db->select('*')
				->from('account')
				->order_by($sort_by, $sort_order);
					   
			$ret['rows'] = $query->get()->result();
		
		
			return $ret;
}


	function validate()
	{
		$query = $this->db->get_where('account',array('username' => $this->input->post('username'),'password' => md5($this->input->post('password'))));

		if ($query->num_rows() == 1) {
			return TRUE;
		} 
	}

	function create_account($member_number,$lv)
	{
		$dataInsert = array(
			'full_name' => $this->input->post('full_name'),
			'username' => $this->input->post('username'),
			'member_number' => $member_number,
            'password' => md5($this->input->post('password')),
            'line_id' => $this->input->post('line_id'),
			'facebook_link' => $this->input->post('facebook_link'),
			'under_id' => $this->input->post('under_id'),
			'lv' => $lv,
			'reg_date' => date("Y-m-d")

		);
        $ret = $this->db->insert('account',$dataInsert);
        return $ret;
        
	}

	function check_if_user_exits($username)
	{
		$result = $this->db->get_where('account',array('username' => $username));

		if ($result->num_rows() > 0){
			return FALSE; // username taken 
		} else {
			return TRUE; // username can be register	
		} 
	}
	
	function check_if_email_exits($email)
	{
		$result = $this->db->get_where('users',array('email' => $email));

		if ($result->num_rows() > 0){
			return FALSE; // email taken 
		} else {
			return TRUE; // email can be register	
		}
	}

	public function query_item($table)
	{
		$query = $this->db->get($table);
        $ret['rows'] = $query->result();
        
        return $ret;
        
	}


	public function get_new_mem_number()
	{
		$query = $this->db->order_by('account_id','desc')->get('account',1,0);
			$row = $query->row();
				if(isset($row)) {
					$first_id = $row->account_id + 1;
				} 
				
		if($this->input->post('under_id') == "") {
			$ret['member_number'] = $first_id."-A-0";
			$ret['lv'] = "A";		
			return $ret;
//จบ การสร้าง Member number สำหรับสมาชิก ระดับ A
		} else {

			$arrUder_id = explode("-", $this->input->post('under_id'));
			if ($arrUder_id[1] == "A"){
				$second_id = "B";
				$ret['lv'] = "B";
					$query = $this->db->order_by('account_id','desc')->like('member_number' ,$arrUder_id[0]."-B-")->get('account',0,1);
					$row = $query->row();
						if(isset($row)) {
						$arrMem_number = explode('-', $row->member_number);
						$third_id = intval($arrMem_number[2])+1;
						} else {
							$third_id = "Err";
						}
			//จบการกำหนดค่า Member number สำหรับสมาชิก ระดับ B
			
			} else if ($arrUder_id[1] == "B"){
				$second_id = "C";
				$ret['lv'] = "C";

				$query = $this->db->order_by('account_id','desc')->like('member_number' ,$arrUder_id[0]."-C-")->get('account',0,1);
					$row = $query->row();
						if(isset($row)) {
						$arrMem_number = explode('-', $row->member_number);
						$third_id = intval($arrMem_number[2])+1;
						} else {
							$third_id = 0;
						}
			//จบการกำหนดค่า Member number สำหรับสมาชิก ระดับ C	
				
				}
			
			//การสร้าง Member number สำหรับสมาชิก ระดับ B และ C
			//$third_id = $arrUder_id[2] = $arrUder_id[2]+1;
				$ret['member_number'] = $arrUder_id[0]."-".$second_id."-".$third_id;

			return $ret; 
		}

	}  
	function under_id($full_name)
	{
		$this->db->like('full_name',$full_name,'both');
		return $this->db->get('account')->result(); 

	}

}