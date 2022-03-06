<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_send extends CI_Controller {
	
	public function __construct() {
			parent::__construct();
			$this->load->model('email_model');
			$this->load->library('form_validation');
	}

	public function index()
	{
		// $this->load->view('email_send');
	}
	
	public function subscribe_send()
	{ 		
		$this->form_validation->set_rules('from','Email','trim|required|valid_email');
				
		// Validation
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('msg_error',"Please enter valid emailID");
			redirect(base_url());
		}
		else
		{ 
	    $f=0;
	    $to =  $this->input->post('from');  // User email
			
			// Database						
			$em = $this->input->post('from');	
			if(!empty($em)){				
				if($this->email_model->check_subscribe($em)){ // Allready Subscribe
					$this->session->set_flashdata('msg_error',"Allready Subscribe!");
					redirect(base_url());
				}else if($this->email_model->check_subscribe_false($em)){ // Unsubscribe / Update
					$f=1; 
				}else if($this->email_model->add_subscribe($em)){ // New Subscribe
					$f=1;
				}
			}
			
			if($f == 1){			
				$subject = 'Welcome To Aorta Digital Health Card | A group company of Aorta Laboratories Pvt. Ltd.';

				$from = 'info@aortalab.co.in';  // Pass here your mail id

				$emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#f6f7fb;padding-left:3%"><img src="https://aortadhc.com/assets/images/brand/logo1.png" width="300px" vspace=10 /></td></tr>';
				$emailContent .='<tr><td style="height:20px"></td></tr>';
				
				// Post message 
				$emailContent .= "<tr><td>
													<h2>Thanks for subscibing to our newsletter.</h2>
													<p>Subscribe to our email newsletter today to receive updates on the Doctors, Hospitals and Membership discount!</p>
													<p></p>
													</td></tr>";
				$emailContent .='<tr><td style="height:20px"></td></tr>';
				$emailContent .= "<tr><td style='background:#f6f7fb;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='https://aortadhc.com/' target='_blank' style='text-decoration:none;color: #60d2ff;'>Aorta Digital Health Card | A group company of Aorta Laboratories Pvt. Ltd.</a></p></td></tr></table></body></html>";
				
				$emailContent .="<p>&nbsp;&nbsp;</p><p>&nbsp;&nbsp;</p><p><font size='3' face='Calibri'>Regards,<br />Aorta Digital Health Card</font></p><p><font size='3' face='Calibri'>***This is an Auto Generated email. Please do not reply***</font></p>";
										
				$config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.gmail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '60';

				$config['smtp_user']    = 'jitendrakr51@gmail.com';    //Important
				$config['smtp_pass']    = '1155pooja';  //Important

				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'html'; // or html
				$config['validation'] = TRUE; // bool whether to validate email or not 

				$this->email->initialize($config);
				$this->email->set_mailtype("html");
				$this->email->from($from);
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($emailContent);
				$this->email->send();

				$this->session->set_flashdata('msg',"Mail has been sent successfully");			
				redirect(base_url());
				// return redirect('admin/');
			}
		}
	}
	
	

}





?>