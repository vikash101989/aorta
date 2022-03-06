<?php 

defined("BASEPATH") or die("Not Allowed");

class Email_model extends CI_Model 
{
	function __construct(){
		parent::__construct();
	}
	
	function add_subscribe($email){
		$name ='';
		$mobile ='';
		$message ='';
		$status = 1;
		return $this->db->insert('email_subscribe',['name'=>$name,'email'=>$email,'mobile'=>$mobile,'message'=>$message,'status'=>$status]);
	}
	
	function check_subscribe($email){	
    $status = 1;	
		$sel = $this->db->get_where('email_subscribe',['email'=>$email,'status'=>$status]);
		return $sel->row();		
	}
	
	function check_subscribe_false($email){	
    $status = 0;	
		$sel = $this->db->get_where('email_subscribe',['email'=>$email,'status'=>$status]);
		$this->db->where('email',$email);
		$this->db->update('email_subscribe',['status'=>1]);
		return $sel->row();		
	}
	
	
}	

?>