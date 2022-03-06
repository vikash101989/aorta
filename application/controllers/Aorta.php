<?php

 defined("BASEPATH") or die('Not Allowed');
 /**
  * Description of Aorta
  *
  * @author Jitendra
  */ 
 Class Aorta extends CI_Controller
 {
		function __construct(){
			parent::__construct();
		} 
		
		function index(){
		}
		
		public function about(){
      $this->load->view('site/new_header');
      $this->load->view('static/about');
      $this->load->view('site/new_footer');
    }	
		public function career(){
      $this->load->view('site/new_header');
      $this->load->view('static/career');
      $this->load->view('site/new_footer');
    }  
	  function privacy_policy(){
			$this->load->view('site/new_header');
			$this->load->view('static/privacy_policy');
			$this->load->view('site/new_footer');
	  }
	  function contact_us(){
	    $this->load->view('site/new_header');
      $this->load->view('static/contact-us');
      $this->load->view('site/new_footer');
	  }
	  function term_condition(){
	    $this->load->view('site/new_header');
      $this->load->view('static/terms-of-conditions');
      $this->load->view('site/new_footer');
	  }
	  function refund_cancel(){
	    $this->load->view('site/new_header');
      $this->load->view('static/refund-cancel');
      $this->load->view('site/new_footer');
	  }
	
 }




















?>