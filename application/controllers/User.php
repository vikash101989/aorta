<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
            //$this->load->view('site/header');
            $this->load->view('welcome_template');
            //$this->load->view('site/footer');
	}
    
}
