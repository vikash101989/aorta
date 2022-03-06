<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Admin
 *
 * @author Vikash
 */
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('form_validation');
        $this->load->library('ajax_pagination'); 
        $this->perPage =12; 

    }
    /*load home page*/
    public function index()
    {
        $conditions1 = [ 
            'limit' => 10,
            'search' => [
                'categories' => 'doctor'
            ]
        ]; 
        $conditions2 = [ 
            'limit' => 10,
            'search' => [
                'categories' => 'hospital'
            ]
        ]; 
        $data['doctors'] = $this->admin_model->getRows($conditions1);
        $data['hospital'] = $this->admin_model->getRows($conditions2);
        
        $this->load->view('site/new_header');
        $this->load->view('admin/home',$data);
        $this->load->view('site/new_footer');
    
    }

    /*load registation page*/
    public function registration() {
        if(empty($this->session->userdata('session_data'))){
            $this->load->view('site/new_header');
            $this->load->view('registration');
            $this->load->view('site/new_footer');
        } else {
             redirect('admin/profile');
        }
        
    }
    public function login() 
    {
        $mobile = $this->input->post('mobile');
        $otp = $this->input->post('otp');
        if (!empty($mobile) && !empty($otp)) {
            $where = array('mobile' => $mobile, 'otpnumber' => $otp, 'is_post_list' => 1);
            $response = $this->admin_model->get_data('users','fname, lname, role,id, payment_status, mobile, email, cardnumber, card_type', $where);
            if (!empty($response)) {
                $session_data = array(
                    'role' => $response[0]['role'],
                    'userid' => $response[0]['id'],
                    'fname' => $response[0]['fname'],
                    'lname' => $response[0]['lname'],
                    'payment_status' => $response[0]['payment_status'],
                    'mobile' => $response[0]['mobile'],
                    'email' => $response[0]['email'],
                );
                if($response[0]['role'] == 'customer'){
                    $session_data['cardno'] = $response[0]['cardnumber'];
                    $session_data['card_type'] = $response[0]['card_type'];
                }
                
                $msg = 'Welcome '. ucfirst($session_data['fname']) ."  " . ucfirst($session_data['lname']);
                $this->session->set_flashdata('msg', $msg);
                $this->session->set_userdata('session_data', $session_data);
                redirect('admin/profile');
            } else {
                $this->session->set_flashdata('errmsg', 'Invalid mobile or password');
                redirect('admin/registration');
            }
        } else {
            $this->session->set_flashdata('errmsg', 'All Field are required');
            redirect('admin/registration');
        }
    }
    
    public function modelogin() {
         $mobile = $this->input->post('name');
         $password = $this->input->post('password');
         if (!empty($mobile) && !empty($password)) {
             $md5_password = md5($password);
             $where = array('mobile' => $mobile, 'password' => $md5_password, 'is_post_list' => 1);
             $response = $this->admin_model->get_data('users','fname, lname, role,id, payment_status, mobile, email', $where);
            if (!empty($response)) {
                $session_data = array(
                    'role' => $response[0]['role'],
                    'userid' => $response[0]['id'],
                    'fname' => $response[0]['fname'],
                    'lname' => $response[0]['lname'],
                    'payment_status' => $response[0]['payment_status'],
                    'mobile' => $response[0]['mobile'],
                    'email' => $response[0]['email']
                );
                $this->session->set_userdata('session_data', $session_data);
                $response['status'] =  'success';
                $response['message']= "successfully login";
            } else {
                $response['status'] =  'error';
                $response['message']= "No data found";
            }
        } else {
            $response['status'] = 'error';
          $response['message']= "All field reqired";
        }
        echo json_encode($response);
    }

    public function profile() 
    {
        $p_list_con =  $this->input->get('patient');
        $dashboard_permission = ['employee','admin'];
        $session_data = $this->session->userdata('session_data');
        // $session_data['role'] ='customer';
        // $this->session->set_userdata('session_data', $session_data);
        // print_r($session_data);exit;
        $user_id = $session_data['userid'];
        $response['user_data'] = $this->admin_model->get_data_by_id($user_id)[0];
         
        if (!empty($session_data['role']) && !in_array($session_data['role'], $dashboard_permission )) {
          
            $this->load->view('site/new_header', array('session_data' => $session_data));
            if($session_data['role'] =='customer') {
                $where_condition = 'patient_id = '. $user_id ;
                $lists['patient_lists'] = $this->admin_model->get_booking_slots2($where_condition);
                $this->load->view('site/patient_profile_header', $response);
                $this->load->view('admin/profile', $lists);
            } else {
        
                if(!empty($p_list_con) && $p_list_con =='upcoming_patient' ){
                    $where_condition = 'organization_id = '. $user_id .' And selectedDate > " '. date('Y-m-d'). ' " And status = 1 ';
                } else if(!empty($p_list_con) && $p_list_con =='past_patient'){
                    $where_condition = 'organization_id = '. $user_id .' And selectedDate < " '. date('Y-m-d'). ' " And status = 1 ';
                } else {
                    $where_condition = 'organization_id = '. $user_id .' And selectedDate = " '. date('Y-m-d'). ' " And status = 1 ';
                }
                $lists['patient_lists'] = $this->admin_model->get_booking_slots($where_condition);
                $this->load->view('site/organisation_profile_header', $response);
                $this->load->view('admin/profile_org', $lists);
            }
            $this->load->view('site/new_footer');
        } else if (!empty($session_data['role'])) {
            $response['countResult'] = $this->get_role_count();
            $this->load->view('site/db_header', array('session_data' => $session_data));
            $this->load->view('admin/dashboard', $response);
            $this->load->view('site/db_footer');
        } else {
            if (!empty($session_data)){
                echo "Please connect to support team";exit;
            }
            redirect('admin/registration');
        }
    }

    //save the user data
    public function save() 
    {
        $this->form_validation->set_rules('umobile', 'Mobile', 'required|is_unique[users.mobile]');
        $this->form_validation->set_rules('otp', 'OTP', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->registration();
        } else {
            $reponse = $this->admin_model->get_data('otptable', 'mobile', ['mobile' => $this->input->post('mmobile'), 'otpnumber' => $this->input->post('otp'), "isvalidupto >= "=> strtotime("now")]);
            if(!empty($reponse)) { 
                $data_array = array(
                    'mobile' => $this->input->post('umobile'),
                    'role' =>  'customer',
                    'is_post_list' =>  1 ,
                    'password' =>   md5($this->input->post('umobile')),
                    'created_at' => date("Y-m-d h:i:s")
                );
                $response = $this->insert_user($data_array); 
                $user_sms_data = [
                    'mobile'=> $data_array['mobile']
                ];
                //$this->text_sms($user_sms_data);
                $this->user_email($user_sms_data);
                if (!empty($response)) {
                    $msg = 'login successfully';
                    $this->session->set_flashdata('msg', $msg);
                    $session_data = array(
                        'role'  =>  $data_array['role'],
                        'userid' => $response,
                        'payment_status' => '0',
                        'fname' => "",
                        'lname' => "",
                        'mobile' => $this->input->post('umobile'),
                        'email' => $this->input->post('email'),
                    );
                    $this->session->set_userdata('session_data', $session_data);
                    redirect('admin/profile');
                } 
            } else {
                $this->session->set_flashdata('msg', "OTP number is Not match or valid state.");
                redirect('admin/registration'); 
            }
        }
    }
    /* user registration */
    public function user_register() 
    {
        $data = [];
        $config['upload_path'] = 'assets/images/profile/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 20024;
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        if (!empty($session_data)) {
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|is_unique[users.mobile]');
            $this->form_validation->set_rules('fname', 'Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->add_user();
            } else {
                if(file_exists($_FILES['profile_image']['tmp_name']) || is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('profile_image')){
                            $error =  $this->upload->display_errors();
                            $this->session->set_flashdata( 'errmsg', $error );
                            redirect('admin/add_user');
                    }
                    $data = array('upload_data' => $this->upload->data());
                } 
                
                $data_array = [
                    'fname'  => $this->input->post('fname'),
                    'lname'  => $this->input->post('lname'),
                    'email'  => $this->input->post('email'),
                    'password'  => md5($this->input->post('mobile')),
                    'mobile' => $this->input->post('mobile'),
                    'role'   => !empty($this->input->post('role')) ? $this->input->post('role') : 'customer',
                    'gender' => $this->input->post('gender'),
                    'specialization'  => ($this->input->post('specialization')!= 'Category')? $this->input->post('specialization') :'',
                    'organisation_name'  => $this->input->post('orgname'),
                    'discount'  => $this->input->post('discount'),
                    'experience'  => $this->input->post('experience'),
                    'registrationsvalue'  => $this->input->post('registrationsvalue'),
                    'registrationstext'  => $this->input->post('registrationstext'),
                    'starttime'  => json_encode($this->input->post('fromtime')),
                    'endtime'  => json_encode($this->input->post('endtime')),
                    'services'  => json_encode($this->input->post('services')),
                    'specializations'  => json_encode($this->input->post('specializations')),
                    'awards'  => json_encode($this->input->post('awards')),
                    'educations'  => json_encode($this->input->post('educations')),
                    'memberships'  => json_encode($this->input->post('memberships')),
                    'experiencestext'  => json_encode($this->input->post('experiencetext')),
                    'generalfee'  => $this->input->post('generalfee'),
                    'address'  => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'state'   => $this->input->post('state'),
                    'country' => $this->input->post('country'),
                    'payment_status' => $this->input->post('payment'),
                    'description' =>$this->input->post('description'),
                    'created_at' => date("Y-m-d h:i:s"),
                    'profile_image' => isset($data['upload_data']['file_name']) ? $data['upload_data']['file_name'] :'',
                    'session_id' => $user_id
                ];
                if($data_array){
                    $this->insert_user($data_array);
                    $user_name = explode(" ", $this->input->post('fname'));
                    $user_sms_data = [
                        'e_name' => $this->input->post('fname')." ".$this->input->post('lname'),
                        'name'  => $user_name[0],
                        'mobile' =>(string)$this->input->post('mobile'),
                        'email' => $this->input->post('email')
                    ];
                    //$this->text_sms($user_sms_data);
                    $this->user_email($user_sms_data);
                    $flash_data = [
                        'fname'  => $this->input->post('fname'),
                        'lname'  => $this->input->post('lname'),
                        'mobile' => $this->input->post('mobile'),
                        'cardnumber' => $data_array['cardnumber']
                        ];
                    $this->session->set_flashdata('msg', $flash_data);
                    redirect('admin/add_user');  
                } else {
                    $this->session->set_flashdata('msg', 'No Add User');
                    redirect('admin/add_user');
                }
            }
        } else {
            redirect('admin/registration');
        }
    }
    /* patient registration */
    public function patient_register() 
    {
        $data = [];
        $config['upload_path'] = 'assets/images/profile/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 20024;
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        if (!empty($session_data)) {
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|is_unique[users.mobile]');
            $this->form_validation->set_rules('fname', 'Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->add_patient();
            } else {
                if(file_exists($_FILES['profile_image']['tmp_name']) || is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('profile_image')){
                            $error =  $this->upload->display_errors();
                            $this->session->set_flashdata( 'errmsg', $error );
                            redirect('admin/add_patient');
                    }
                    $data = array('upload_data' => $this->upload->data());
                } 
                
                $data_array = [
                    'fname'  => $this->input->post('fname'),
                    'lname'  => $this->input->post('lname'),
                    'email'  => $this->input->post('email'),
                    'password'  => md5($this->input->post('mobile')),
                    'mobile' => $this->input->post('mobile'),
                    'role'   => 'customer',
                    'gender' => $this->input->post('gender'),
                    'bgroup' => $this->input->post('bgroup'),
                    'dob'   =>  date('Y-m-d',strtotime($this->input->post('dob'))),
                    'fhname' => $this->input->post('fhname'),
                    'adharno' => $this->input->post('adharno'),
                    'address'  => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'state'   => $this->input->post('state'),
                    'zipcode'   => $this->input->post('zcode'),
                    'country' => $this->input->post('country'),
                    'payment_status' => $this->input->post('payment'),
                    'description' =>$this->input->post('description'),
                    'created_at' => date("Y-m-d h:i:s"),
                    'profile_image' => isset($data['upload_data']['file_name']) ? $data['upload_data']['file_name'] :'',
                    'session_id' => $user_id,
                    'cardnumber' => ($this->input->post('payment') > 0) ? "AOR". strtoupper($this->input->post('fname')[0]) . $this->input->post('mobile') : '',
                    'card_type'  => ($this->input->post('payment') > 0) ? (!empty($this->input->post('card_type')) ? $this->input->post('card_type') : 'Free Member') : ""
                ];
                if($data_array){
                    $this->insert_user($data_array);
                    $user_name = explode(" ", $this->input->post('fname'));
                    $user_sms_data = [
                        'e_name' => $this->input->post('fname')." ".$this->input->post('lname'),
                        'name'  => $user_name[0],
                        'mobile' =>(string)$this->input->post('mobile'),
                        'email' => $this->input->post('email')
                    ];
                    //$this->text_sms($user_sms_data);
                    $this->user_email($user_sms_data);
                    $flash_data = [
                        'fname'  => $this->input->post('fname'),
                        'lname'  => $this->input->post('lname'),
                        'mobile' => $this->input->post('mobile')
                        ];
                    $this->session->set_flashdata('msg', $flash_data);
                    redirect('admin/add_patient');  
                } else {
                    $this->session->set_flashdata('msg', 'No data found');
                    redirect('admin/add_patient');
                }
            }
        } else {
            redirect('admin/registration');
        }
    }
    
    public function update_profile() 
    {
        $edite_premission = array('admin','employee');
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        $edit_userid = $this->input->post('edit_userid');
        if (!empty($user_id)) {
            $config['upload_path'] = './assets/images/profile/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 20024;
            $this->form_validation->set_message('required', 'The First %s can not be empty.');
            $this->form_validation->set_rules('fname', 'Name', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                if(in_array($session_data['role'], $edite_premission)){
                    $this->session->set_flashdata( 'errmsg', 'First Name and Mobile not blank' );
                    redirect('admin/edit_user/'.$edit_userid);
                } else {
                    $this->editprofile();
                }
             } else {
                if(file_exists($_FILES['profile_image']['tmp_name']) || is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('profile_image')){
                            $error =  $this->upload->display_errors();
                            $this->session->set_flashdata( 'errmsg', $error );
                            if(in_array($session_data['role'], $edite_premission)){
                                redirect('admin/edit_user/'.$edit_userid);
                            } else {
                                redirect('admin/profile');
                            }
                    }
                    $data = array('upload_data' => $this->upload->data());
                }
                $user_array = array(
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'mobile' => $this->input->post('mobile'),
                    'email' => $this->input->post('email'),
                    'role'   => $this->input->post('role'),
                    'address' => $this->input->post('address'),
                    'description' => $this->input->post('description'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'country' => $this->input->post('country'),
                    'password' => md5($this->input->post('mobile')),
                );
                if($this->input->post('role') =='customer') {
                    $user_array['gender'] = $this->input->post('gender');
                    $user_array['bgroup'] = $this->input->post('bgroup');
                    if (!empty($this->input->post('dob'))) {
                        $user_array['dob'] = date('Y-m-d',strtotime($this->input->post('dob')));
                    } else {
                        $user_array['dob'] = '';
                    }
                    
                    $user_array['fhname'] = $this->input->post('fhname');
                    $user_array['zipcode'] = $this->input->post('zcode');
                    $user_array['adharno'] = $this->input->post('adharno');
                    $user_array['card_type'] = $this->input->post('card_type');
                }
                if($this->input->post('role') !='customer') {
                    $user_array['specialization'] = $this->input->post('specialization');
                    $user_array['experience'] = $this->input->post('experience');
                    $user_array['organisation_name']  = $this->input->post('orgname');
                    $user_array['discount']  = $this->input->post('discount');
                    $user_array['registrationsvalue']  = $this->input->post('registrationsvalue');
                    $user_array['registrationstext']  = $this->input->post('registrationstext');
                    $user_array['starttime']  = json_encode($this->input->post('fromtime'));
                    $user_array['endtime']  = json_encode($this->input->post('endtime'));
                    $user_array['services']  = json_encode($this->input->post('services'));
                    $user_array['specializations']  = json_encode($this->input->post('specializations'));
                    $user_array['awards']  = json_encode($this->input->post('awards'));
                    $user_array['educations']  = json_encode($this->input->post('educations'));
                    $user_array['memberships']  = json_encode($this->input->post('memberships'));
                    $user_array['experiencestext']  =  json_encode($this->input->post('experiencestext'));
                    $user_array['generalfee']  = $this->input->post('generalfee');
                }
                if(!empty($data['upload_data']['file_name'])){
                    $user_array['profile_image'] = $data['upload_data']['file_name'];
                }
                //  echo "<pre>";
                //  print_r(array_filter($user_array));exit;
                $this->admin_model->update_data('users', array_filter($user_array), array('id' => $edit_userid));
                if($this->input->post('role') !='customer'){
                   unset($user_array['password']); 
                   $this->admin_model->update_data('search_table', array_filter($user_array), array('userid' => $edit_userid));
                }
                $msg = 'Your profile has been updated successfully';
                $this->session->set_flashdata('msg', $msg);
                if(in_array($session_data['role'], $edite_premission)){
                    if ($this->input->post('role')!= 'customer') {
                        redirect('admin/edit_organization/'.$edit_userid);
                    } else {
                        redirect('admin/edit_user/'.$edit_userid);
                    }
                    
                } else {
                    redirect('admin/profile');
                }
                
            }
        } else {
            redirect('admin/registration');
        }
    }
    public function add_user() {
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        if (!empty($session_data['role'])) {
            $response['user_data'] = $this->admin_model->get_data_by_id($user_id);
            $this->load->view('site/db_header', array('session_data' => $session_data));
            $this->load->view('admin/add_user', $response);
            $this->load->view('site/db_footer');
        } else {
            redirect('admin/registration');
        }
    }
    public function add_patient() {
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        if (!empty($session_data['role'])) {
            $response['user_data'] = $this->admin_model->get_data_by_id($user_id);
            $this->load->view('site/db_header', array('session_data' => $session_data));
            $this->load->view('admin/add_patient', $response);
            $this->load->view('site/db_footer');
        } else{
            redirect('admin/registration');
        }
    }
    public function add_family() {
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        if (!empty($session_data['role'])) {
            $response['user_data'] = $this->admin_model->get_data_by_id($user_id);
            $where =[
                'role' =>'customer',
                'is_post_list' => 1
                ];
            $response['patient_data'] = $this->admin_model->get_data('users', 'id, mobile, fname, lname', $where);
            $this->load->view('site/db_header', array('session_data' => $session_data));
            $this->load->view('admin/add_family', $response);
            $this->load->view('site/db_footer');
        } else{
            redirect('admin/registration');
        }
    }
    public function all_user() {
        $session_data = $this->session->userdata('session_data');
        $edite_premission = array('admin','employee');
        if (!empty($session_data['role']) && in_array($session_data['role'], $edite_premission)) {
            $role = $this->input->get('user');
            if ((!empty($role)) ) {
                $where = array('role' => $role,'session_id' => $session_data['userid']);
                if($session_data['mobile'] == '9871833414'){
                    unset($where['session_id']);
                }
                if($role == 'customer'){
                    $reslut['all_lists'] = $this->admin_model->get_data_where_id('', $where);
                } else {
                    $reslut['all_lists'] = $this->admin_model->get_data('search_table', 'id,userid,fname,lname,role,specialization,experience,email,city,state,country,address,description,profile_image,is_post_list, organisation_name', $where, '');
                }
               if (!empty($reslut)) {
                    $this->load->view('site/db_header', array('session_data' => $session_data));
                    if($role == 'customer'){
                        $this->load->view('admin/list_patient', $reslut);
                    } else {
                        $this->load->view('admin/list_users', $reslut);
                    }
                    
                    $this->load->view('site/db_footer');
                }
            } else {
                echo 'Result not found';
            }
        } else {
            redirect('admin/registration');
        }
    }
    
    public function edit_user() {
        $edite_premission = array('admin','employee');
        $session_data = $this->session->userdata('session_data');
        if (in_array($session_data['role'],$edite_premission)) {
            $response =[];
            if(!empty($this->uri->segment(3))){
                $response['user_data'] = $this->admin_model->get_data_by_id($this->uri->segment(3))[0];
            }
            $this->load->view('site/db_header', array('session_data' => $session_data));
            $this->load->view('admin/edit_user', $response);
            $this->load->view('site/db_footer');
        } else{
            redirect('admin/registration');
        }
    }
    public function edit_organization() {
        $edite_premission = array('admin','employee');
        $session_data = $this->session->userdata('session_data');
        if (in_array($session_data['role'],$edite_premission)) {
            $response =[];
            if(!empty($this->uri->segment(3))){
                $response['user_data'] = $this->admin_model->get_organization_data_by_id($this->uri->segment(3))[0];
            }
            $this->load->view('site/db_header', array('session_data' => $session_data));
            $this->load->view('admin/edit_organization', $response);
            $this->load->view('site/db_footer');
        } else{
            redirect('admin/registration');
        }
    }
    public function reset_pass(){
        $session_data = $this->session->userdata('session_data');
        if (!empty($session_data['role'])) {
            $this->load->view('site/new_header');
            if($session_data['role'] != 'customer'){
                $response['user_data'] = $this->admin_model->get_organization_data_by_id($session_data['userid'])[0];
                $this->load->view('site/organisation_profile_header', $response);
                $this->load->view('admin/orgnisation_edit_profile');
            } else {
                $response['user_data'] = $this->admin_model->get_data_by_id($session_data['userid'])[0];
                $this->load->view('site/patient_profile_header', $response);
                $this->load->view('admin/patient_edit_profile');
            }
            $this->load->view('admin/resetpass');
            $this->load->view('site/new_footer');
        } else{
            redirect('admin/registration');
        }
    }
    public function update_pass(){
        $session_data = $this->session->userdata('session_data');
        if (!empty($session_data['role'])) {
            $this->form_validation->set_rules('userid', 'UserId', 'required');
            $this->form_validation->set_rules('pass1', 'Password', 'required');
            $this->form_validation->set_rules('pass2', 'Re-Password', 'required|matches[pass1]');
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
            } else {
                $userdata = [
                    'password' => md5($this->input->post('pass1')),
                ];
                $response = $this->admin_model->update_data('users', $userdata , array('id' => $this->input->post('userid')));
                if($response){
                    echo "Password updated successfully !!!";
                }
            }
        }
    }
    public function detail(){
        $date = date('Y-m-d');
        $session_data = $this->session->userdata('session_data');
        $response['datas'] = $orgdatas= $this->admin_model->get_data('search_table','id, userid, fname, lname, role, specialization, experience, email, address, city, state, country, description, profile_image, start_time, end_time, mobile,cut_off_time, no_repeat, created_at, organisation_name, discount, registrationsvalue, registrationstext, starttime, endtime, services, specializations, awards, educations, memberships, experiencestext, generalfee', ['is_post_list'=>1,'id'=> $this->uri->segment(3)]);
        $feeamount = round($orgdatas[0]['generalfee'], 2) - round(($orgdatas[0]['generalfee']* $orgdatas[0]['discount']/100),2);
        $response['datas'][0]['netamount'] = $feeamount;
        $startTimeArray = json_decode($orgdatas[0]['starttime']);
        $endTimeArray = json_decode($orgdatas[0]['endtime']);
        $timeprepare = [];
        // echo "<pre>";
        // print_r($orgdatas);
        $finalTimeSolts = [];
        foreach($startTimeArray as $key=>$value){
            if(!empty($value && $endTimeArray[$key]) && $value !='00:00') {
                $timeprepare[$date][$key]['starttime'] = $value;
                $timeprepare[$date][$key]['endtime'] = $endTimeArray[$key];
            }
        }
        if(!empty($timeprepare[$date])){
            foreach($timeprepare[$date] as $key => $values){
                $timeslostt = $this->caculateslota($values['starttime'], $values['endtime']);
                $finalTimeSolts = array_merge($finalTimeSolts , $timeslostt);
            }
        }
        
        $response['timeslots'] = $finalTimeSolts;
        // echo "<pre>";
        // print_r($response['timeslots']);exit;
        if(!empty($response)){
            $response['user_members'] =[];
            if(isset($session_data['role']) && $session_data['role']=='customer') {
               $response['user_members'] = $this->admin_model->get_data("users",'id, fname, lname, mobile, cardnumber, profile_image, card_valid_upto, card_type, created_at',['mobile'=>$session_data['mobile']]);  
            }

            $this->load->view('site/new_header');
            $this->load->view('admin/detail_page',$response);
            $this->load->view('site/new_footer'); 
        } else {
            echo "Details is not active state";
        }
         
    }
    /* start logou for all users */
    public function logout(){
        $this->session->set_flashdata('msg', 'Successfully Logout');
        $this->session->sess_destroy();
        redirect("admin/registration");
    }
    public function book_slots(){
        $result = [];
        $session_data = $this->session->userdata('session_data');
        if (empty($session_data)) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|is_unique[users.mobile]',['is_unique' => 'You mobile no is already register please fist signin']);
            $this->form_validation->set_rules('date', 'Date', 'required');
            if ($this->form_validation->run() == FALSE) {
                $result['error'] = validation_errors();
                echo json_encode($result);
            } else {
                
                $slots_array = [ 
                    'name' => $this->input->post('name'),
                    'mobile' => $this->input->post('mobile'),
                    'booking_date' => $this->input->post('date'),
                    'organization_id' => $this->input->post('organization_id')
                ];
                
                $response = $this->booking($slots_array);
                if(!empty($response['success'])){
                    $result['success'] = "successfully booked slots";
                } else {
                    $result['error'] = $response['error'];
                }
                echo json_encode($response);
            }
        } else {
            $result['success'] = "successfully booked slots";
            $slots_array = [ 
                'name' => $this->input->post('name'),
                'mobile' => $this->input->post('mobile'),
                'booking_date' => $this->input->post('date'),
                'organization_id' => $this->input->post('organization_id'),
                'userid' => $this->input->post('userid')
            ];
            $response = $this->booking($slots_array);
            if(!empty($response['success'])){
                $result['success'] = "successfully booked slots";
            } else {
                $result['error'] = $response['error'];
            }
            echo json_encode($response);
        }
    }
    function booking($data = []){
        $result = [];
        
        $session_data = $this->session->userdata('session_data');
        if (!empty($session_data['role'])) {
            $order_data =[
                'organization_id' => $data['organization_id'],
                'patient_id' => $data['userid'],
                'status' => '1',
                'selectedDate' => date("Y-m-d", strtotime($data['booking_date']))
            ];
            $result['success'] = $this->admin_model->insert_entry('ordertable',$order_data);
        } else {
            $fullname = explode(" ",$data['name']);
            $user_data =[
               'fname' => $fullname[0],
               'lname' => $fullname[1],
               'email' => '',
               'mobile' => $data['mobile'],
               'role'   => 'customer',
               'is_post_list'   => '1',
               'password' => md5($data['mobile']),
               'created_at' => date("Y-m-d h:i:s")
                
            ];
            
            $insertid = $this->insert_user($user_data);
            $user_sms_data = [
                'e_name' => $data['name'],
                'name'  => $user_data['fname'],
                'mobile' =>(string)$data['mobile'],
                'email' => $data['email']
            ];
           // $this->text_sms($user_sms_data);
            $this->user_email($user_sms_data);
            $order_data =[
                'organization_id' => $data['organization_id'],
                'patient_id' => $insertid,
                'status' => '1',
                'selectedDate' => date("Y-m-d", strtotime($data['booking_date']))
            ];
            $result['success'] = $this->admin_model->insert_entry('ordertable', $order_data);
            $session_data = array(
                'role'  =>  'customer',
                'userid' => $insertid,
                'fname' => $fullname[0],
                'lname' => $fullname[1],
                'payment_status' => '0',
                'mobile' => $data['mobile'],
                'email' => $data['email'],
            );
            $this->session->set_userdata('session_data', $session_data);
        }
        $cardno = !empty($session_data['cardno']) ? $session_data['cardno'] : "Free MemberShip";
        $org_info = $this->admin_model->get_data('search_table', 'fname, lname, organisation_name, email, mobile', ['userid' => $data['organization_id']]);
        //echo json_encode($org_info);
        $org_name = !empty($org_info[0]['organisation_name']) ? substr($org_info[0]['organisation_name'],0,25) : substr($org_info[0]['fname'] . " " . $org_info[0]['lname'],0,25);
        
        $message1 = "Hi ".$data['name'].",%nYour booking is confirmed%nDate : ".date("Y-m-d", strtotime($data['booking_date']))."%nOrg/Doctor Name : ".$org_name."%nCard No : ".$session_data['cardno']."%nAny help to call my support team%nphone : 9525510009%nwebsite link : https://aortadhc.com";
        $request_array1 = [
            'phones' => (array) $data['mobile'],
            'message' => $message1
        ];
        //$this->send_sms($request_array1);
        
        $message2 = "Hi ".$org_name.", %nOne appointment book on%nDate: ".date("Y-m-d", strtotime($data['booking_date']))."%nName of patient: ".$data['name']."%nMobile : ".$data['mobile']."%nThanks to work aorta digital health care card.%website: aortadhc.com";
        $data['mobile'] = [$org_info[0]['mobile'],'9330046523','7970991179'];
        $request_array2 = [
            'phones' => $data['mobile'],
            'message' => $message2
        ];
        //$this->send_sms($request_array2);
        
        return $result;
    }
    function booking_cancel(){
        $result = 0;
        $session_data = $this->session->userdata('session_data');
        if (!empty($session_data)) {
            $where = [
                'patient_id' => $this->input->post('paitent_id'),
                'organization_id' => $this->input->post('organization_id'),
                'created_at' => $this->input->post('created_at'),
                'selectedDate' => $this->input->post('selecteddate'),
                ];
            $this->admin_model->update_data('ordertable', array('status' => '2' ), $where );
            $result = 1;
        }
        echo $result;
    }

    // insert data in user table as customer role
    function insert_user($user_data = []) 
    {
        $status = 0;
        if (!empty($user_data)) {
            if(!empty($user_data['cardnumber'])) {
                $user_data['last_payment_date'] = date("Y-m-d");
                $user_data['card_valid_upto'] =  date('Y-m-d', strtotime('+1 years'));
            }
            $status = $response = $this->admin_model->insert_entry('users', array_filter($user_data));
            if($response){
                // check users refral
                $linkurl = $this->input->post('refralValue');
                if(!empty($linkurl) && $linkurl != 'registration') {
                    $urlsegment2 =  base64_decode($linkurl);
                    $arrayUrl = explode("/",$urlsegment2);
        	        $upsarray = [
        	            'created_usersID' => $response,
            	        'submited_date' => date("Y-m-d H:i:s"),
            	        'status' => 1,
            	        'registation_status' => 1
        	        ];
        	        $this->admin_model->update_data('user_referral', $upsarray,  ['id' => $arrayUrl[0], 'userid' => $arrayUrl[1]]); 
                }
            }
            // data insert on serach table incase not customer and employee
            if($user_data['role'] != 'customer'  && $user_data['role'] != 'employee'){
                $user_data['userid'] = $response;
                unset($user_data['password'],$user_data['gender'],$user_data['payment_status'], $user_data['cardnumber'], $user_data['last_payment_date'], $user_data['card_valid_upto'],  $user_data['termcondition']);
                $this->admin_model->insert_entry('search_table', array_filter($user_data));
            }
        }
        return $status;
    }
    
    public function approve(){
        $result = 0;
        $dashboard_permission = ['employee','admin'];
        $session_data = $this->session->userdata('session_data');
        if (!empty($session_data['userid']) && in_array( $session_data['role'], $dashboard_permission)) {
            $this->admin_model->update_data('search_table', array('is_post_list' => $this->input->post('apprvalue')) , array('userid' => $this->input->post('apprid')));
            $this->admin_model->update_data('users', array('is_post_list' => $this->input->post('apprvalue')) , array('id' => $this->input->post('apprid')));
            $result = 1;
        }
        echo $result;
    }
    public function status_change(){
        $result = 0;
        $dashboard_permission = ['employee','admin'];
        $session_data = $this->session->userdata('session_data');
        if (!empty($session_data['userid']) && in_array( $session_data['role'], $dashboard_permission)) {
            $this->admin_model->update_data('users', array('is_post_list' => $this->input->post('is_post_list')) , array('id' => $this->input->post('apprid')));
            $result = 1;
        }
        echo $result;
    }
    public function getall_result() {
        $inputtext = $this->input->post('inputtext');
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $specialization = $this->input->post('specialization');
        $datas = $this->admin_model->get_data_db_search($inputtext, $limit, $start, $specialization);
        $output ='';
        if (!empty($datas)) {
            $count_result = count($datas);
            foreach ($datas as $data) {
                $id = !empty($data['id']) ? $data['id'] : '';
                $lname = !empty($data['lname']) ? $data['lname'] : '';
                $title = ($data['role'] == 'doctor') ? "Dr. " : '';
                $name = !empty($data['fname']) ? $title . " " . $data['fname'] . " " . $lname : '';
                $specialization = !empty($data['specialization']) ? $data['specialization'] : '';
                if(!empty($data['profile_image'])){
                        $img_ulr = base_url('assets/images/profile/').$data['profile_image'];
                } else{
                        $img_ulr = base_url('assets/images/faces/doctors/1.jpg'); 
                }
                $output .= '<div class="col-lg-6 col-md-12 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="item-card9-imgs">
                            <a href=" '. base_url().'admin/detail/'. $id .' "></a>
                            <img src=" '.$img_ulr. '" alt="img" class="w-100">
                        </div>
                        <div class="card-body">
                            <div class="item-card2">
                                <div class="item-card2-desc text-center">
                                    <div class="item-card2-text">
                                        <a href="'. base_url().'admin/detail/'. $id .'" class="text-dark"><h4 class="font-weight-bold mb-1">'. $name .'"</h4></a>
                                    </div>
                                    <p class="fs-16">'. $specialization. '"</p>
                                    <a class="btn btn-primary" href="'. base_url().'admin/detail/'. $id .' ">Book Appointment</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="product-filter-desc">
                                <div class="product-filter-icons text-center">
                                    <a href="#" class="border text-primary p-0"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="border text-primary p-0"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="border text-primary p-0"><i class="fa fa-google"></i></a>
                                    <a href="#" class="border text-primary p-0"><i class="fa fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="textcount" value="'.$count_result.'" >';
            }
        } else {
             $output .= '<button type="button" id = "get-data" class="btn btn-primary btn-block">No More Data Found</button>';
        }
        echo $output;
    }
    
    function editprofile(){
        $session_data = $this->session->userdata('session_data');
        if (!empty($session_data['role'])) {
            $this->load->view('site/new_header');
            if($session_data['role'] != 'customer'){
                $response['user_data'] = $this->admin_model->get_organization_data_by_id($session_data['userid'])[0];
                $this->load->view('site/organisation_profile_header', $response);
                $this->load->view('admin/orgnisation_edit_profile');
            } else {
                $response['user_data'] = $this->admin_model->get_data_by_id($session_data['userid'])[0];
                $this->load->view('site/patient_profile_header', $response);
                $this->load->view('admin/patient_edit_profile');
            }
            $this->load->view('site/new_footer');
        } else {
            redirect('admin/registration');
        }
    }

	Public function user_email( $use_data = []) 
    	{
            if($use_data['email']){
        	    $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'iso-8859-1';
                $config['mailtype'] ='html';
                $config['wordwrap'] = TRUE;
                
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
        		$this->email->from('info@aortadhc.com', 'AORTA DHC');
        		$this->email->to($use_data['email']);
        		$this->email->subject('WELCOME TO AORTA HEALTH CARE CARD !!');
        		$text_add = '';
        		if(isset($use_data['text_message']) && $use_data['text_message'] == "join") {
        		    $add_message = '<td style="padding:0px 0px 0px 40px" valign="top" align="left">
									<div style="font-size:18px;font-weight:normal;font-size:34px;color:#111;line-height:40px;margin:0px 0px 10px 0px">Dear Customer,</div>
									<div style="font-size:18px;font-weight:normal;font-size:22px;font-style:italic;color:#111;line-height:40px;margin:0px 0px 18px 0px">
										Thank you for join us <span class="il">Aorta DHC</span> health care you are becoming a faimly member of <span style="font-family:arial;font-size:30px;font-weight:bold;margin-left:8px;font-style:normal"> <span class="il">Aorta</span> DHC Pvt Ltd</span> 
										
									</div>
									<div style="font-size:22px;font-style:italic;font-weight:normal;color:#111;line-height:40px;margin:0px 0px 20px 0px">Once again thank you to join us <span class="il">Aorta DHC</span> health care</div>
								    </td>';
        		} else {
        		   $add_message = '<td style="padding:0px 0px 0px 40px" valign="top" align="left">
                        										<div style="font-size:18px;font-weight:normal;font-size:34px;color:#111;line-height:40px;margin:0px 0px 10px 0px">Dear Customer,</div>
                        										<div style="font-size:18px;font-weight:normal;font-size:22px;font-style:italic;color:#111;line-height:40px;margin:0px 0px 18px 0px">
                        											Thank you for purchasing <span>Aorta DHC</span> health care Card from <span style="font-family:arial;font-size:28px;"> <span>Aorta</span> DHC Pvt Ltd</span> 
                        											this card hepls you to bring more medical facilities.
                        										</div>
                        										<div style="color:#111;font-size:17px;font-weight:normal">
                             										<div style="margin:0px 0px 4px 0px"><span class="il">UserID :  </span>' . $use_data['mobile'] . '</div>
                             										<div style="margin:0px 0px 4px 0px"><span class="il">Password :  </span>' . $use_data['mobile'] . '</div>
                            										<div style="margin:0px 0px 4px 0px"><span class="il">Website Link :  </span><a href="https://aortadhc.com" target="_blank">Aorta DHC</a></div>
                            									</div>
                        										<div style="font-size:22px;font-style:italic;font-weight:normal;color:#111;line-height:40px;margin:0px 0px 20px 0px">Once again thank you for purchasing <span>Aorta</span> health care Card</div>
                        									</td>';
        		}
        	    $message = '<table style="background-color:#dddddd" width="100%" cellspacing="0" cellpadding="0">
                         	<tbody>
                         		<tr>
                         			<td style="padding:15px 0px" valign="top" align="center">
                         				<table style="font-family:Arial,Helvetica,sans-serif;font-size:13px" width="1026" cellspacing="0" cellpadding="0" border="0" align="center">
                         					<tbody>
                         					<tr>
                         						<td style="background:#ffffff;padding:17px 18px 18px 18px" valign="top" align="left">
                         							<table width="100%" cellspacing="0" cellpadding="0">
                         								<tbody>
                         								<tr>
                         									<td valign="top" align="right">
                         										<img src="' .base_url('assets/images/healthcard-aorta.png'). '" class="CToWUd a6T" style="width: 18%;margin-top: 20px; margin-right: 20px;"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 659.2px; top: 283.2px;"><div id=":ql" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div><div dir="ltr" style="opacity:1"><div id="m_-4154918808974184749:qv" role="button" aria-label="Download attachment "><div></div></div></div>
                         									</td>
                         								</tr>
                        								<tr>
                        								' .$add_message .'
                        								</tr>
                        								<tr>
                         									<td style="padding:0px 0px 0px 40px;color:#111;font-size:26px;font-weight:normal">
                         										<div style="margin:0px 0px 3px 0px"><span>Aorta </span>DHC PVT Ltd.</div>
                         										<div style="margin:0px 0px 3px 0px">Phone: +91-9525510009</div>
                         										<div style="margin:0px 0px 3px 0px">Office Hours:</div>
                         										<div style="margin:0px 0px 3px 0px"><span><span>Monday</span></span> to <span><span>Friday</span></span> <span><span>10:00 AM (EST) 6:00 PM (EST)</span></span></div>
                         										<div style="margin:0px 0px 3px 0px">Email: <a style="color:#170676;text-decoration:none">ino@aortalab.co.in</a></div> 
                         									</td>
                         								</tr>
                         							</tbody>
                         							</table>
                         						</td>
                         					</tr>
                         					</tbody>
                         				</table>
                        			</td>
                         		</tr>
                         	</tbody>
                         </table>';
            $this->email->message($message);
            $this->email->send();
            }
    	}
    	
    	
    	function welcome_doctore_email($use_data = [] ) {
    	    $use_data['user_info'] = [
                    'e_name' => "vikash",
                    'role' => "doctor",
                    'mobile' => "9871833414",
                ];
    	    if(!empty($use_data)){
    	        $data = $this->load->view('email_template/welcome_doctor', $use_data, true);
    	        $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'iso-8859-1';
                $config['mailtype'] ='html';
                $config['wordwrap'] = TRUE;
                
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
        		$this->email->from('info@aortadhc.com', 'AORTA DHC');
        		$this->email->to('vikashks101989@gmail.com');
        		$this->email->subject('WELCOME TO AORTA HEALTH CARE CARD !!');
        		$this->email->message($data);
                $this->email->send();
    	    }
    	    
    	}
    	    	/* send text sms vai local text api*/

	function text_sms($user_data = array()) {
	    $sender = 'AORDHC';
	    $number = $user_data['mobile'];
	    if(!empty($number)){
    	    $header =[
                'apikey'  => 'kZJLuJiHF6E-9CcZ8d83UP1ufTADEKiT2gs30qBDLK',
                'sender'  => $sender,
                'numbers' => $number,
                'name'    => $user_data['name'],
                'user_id' => $number,
                'password'=> $number,
            ];
            $url = "https://api.textlocal.in/send/?apikey=".$header['apikey']. "&sender=AORDHC&numbers=" .$header['numbers']."&message=Hi%20". $header['name'] .",%n%20%nWelcome%20to%20Aorta%20Digital%20Health%20Care%20Card.%n%20user%20id%3A%20". $header['user_id'] ."%20and%20password%3A%20". $header['password']. ".%nThanks%20to%20join%20us.%n%20https://aortadhc.com";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);  
	        }
    	return true;
                
        }
        public function edit_profile() {
            $dashboard_permission = ['employee','admin'];
            $session_data = $this->session->userdata('session_data');
            $user_id = $session_data['userid'];
            $response['user_data'] = $this->admin_model->get_data_by_id($user_id)[0];
            if (!empty($session_data['role']) && !in_array($session_data['role'], $dashboard_permission )) {
                $this->load->view('site/header', array('session_data' => $session_data));
                $this->load->view('site/profile_header', $response);
                $this->load->view('admin/edit_profile');
                $this->load->view('site/footer');
            } else if (!empty($session_data['role'])) {
                $this->load->view('site/db_header', array('session_data' => $session_data));
                $this->load->view('admin/dashboard', $response);
                $this->load->view('site/db_footer');
            } else {
                redirect('admin/registration');
            }
        }

    	
    	function ajaxPaginationData(){ 
            $page = $this->input->post('page'); 
            if (!$page) { 
                $offset = 0; 
            } else { 
                $offset = $page; 
            } 
            // Get record count 
            $conditions = [ 
                    'returnType' => 'count',
                    'search' => [
                        'keywords' => $this->input->post('search_text'),
                        'categories' => $this->input->post('categories'),
                        'specialization' => $this->input->post('specialization')
                        ]
                ]; 
            $totalRec = $this->admin_model->getRows($conditions);
            
            // Set conditions for search and filter 
            $keywords = $this->input->post('keywords'); 
            $sortBy = $this->input->post('sortBy'); 
            $categories = $this->input->post('categories'); 
            if(!empty($keywords)){ 
                $conditions['search']['keywords'] = $keywords; 
            } 
            if(!empty($sortBy)){ 
                $conditions['search']['sortBy'] = $sortBy; 
            } 
            if(!empty($categories)){ 
                $conditions['search']['categories'] = $categories; 
            }  
            // Pagination configuration 
            $config['target']      = '#dataList'; 
            $config['base_url']    = base_url('admin/ajaxPaginationData'); 
            $config['total_rows']  = $totalRec; 
            $config['per_page']    = $this->perPage; 
            $config['link_func']   = 'searchFilter';
             
            // Initialize pagination library 
            $this->ajax_pagination->initialize($config); 
             
            // Get records 
            $conditions['start'] = $offset; 
            $conditions['limit'] = $this->perPage; 
            unset($conditions['returnType']); 
            if($conditions['search']['keywords'] == 'undefined' || $conditions['search']['keywords'] == ''){
                unset($conditions['search']['keywords']); 
            }
            $data['users'] = $this->admin_model->getRows($conditions); 
            $this->load->view('data', $data, false); 
       } 
    public function getdata(){
        $where['search']['keywords'] = $this->input->post('textsearch');
        $where['search']['categories'] = $this->input->post('categories');
        $data = $this->admin_model->getRows($where);
        echo json_encode($data);
    }
    public function getResult(){
        $data = array(); 
        $where = [ 
            'returnType' => 'count',
            'search' => [
                'keywords' => $_GET['search_text'],
                'categories' => $this->input->get('categories'),
                'specialization' => $this->input->get('specialization'),
                'location' => $this->input->get('location'),
                ]
        ]; 
        $totalRec = $this->admin_model->getRows($where); 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url('admin/ajaxPaginationData'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 
         
        $this->ajax_pagination->initialize($config); 
        $where = [ 
            'limit' => $this->perPage,
            'search' => [
                'keywords' => $this->input->get('search_text'),
                'categories' => $this->input->get('categories'),
                'specialization' => $this->input->get('specialization'),
                'location' => $this->input->get('location'),
                'sortby' => $this->input->get('sortBy')
                ]
        ]; 
        $data['users'] = $this->admin_model->getRows($where); 
        $this->load->view('site/new_header');
        $this->load->view('search_page', $data ); 
        $this->load->view('site/new_footer');
        
    }
    
    function dd($response =[]){
       echo json_encode($response);exit;
    }
    public function admin_reset_pass(){
        $session_data = $this->session->userdata('session_data');
        if (!empty($session_data['role'])) {
           $response['user_data'] = $this->admin_model->get_data_by_id( $session_data['userid'] );
            $this->load->view('site/db_header', array('session_data' => $session_data));
            $this->load->view('admin/admin_repass',$response);
            $this->load->view('site/db_footer');
        } else {
            redirect('admin/profile');
        }
    }
    public function user_setting($id = 0)
    {
        $dashboard_permission = ['employee','admin'];
        
        $session_data = $this->session->userdata('session_data');
        if (in_array($session_data['role'],$dashboard_permission)) {
            // $this->load->library('Pdf');
            // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // $pdf->AddPage();
            $reslut['all_lists'] = $this->admin_model->get_data_where_id($id);
            $this->load->view('admin/patient_details', $reslut);
            // $pdf->writeHTML($message);
            // $pdf->lastPage();
            // ob_end_clean();
            // $pdf->Output('example_006.pdf', 'I');
        } else {
            redirect('admin/index');
        }
    }
    
    function check_card(){
        $session_data = $this->session->userdata('session_data');
        $response['user_data'] = $this->admin_model->get_data_by_id($session_data['userid'])[0];
        if (!empty($session_data['role'])) {
            $this->load->view('site/new_header');
            $this->load->view('site/profile_header', $response);
            $this->load->view('admin/check_card');
            $this->load->view('site/new_footer');
        } else{
            redirect('admin/registration');
        }
    }
    function card_search(){
        $cardno = $this->input->post('cardno');
        $where = array('cardnumber' => $cardno);
        $response = $this->admin_model->get_data2('users','fname, lname, payment_status, last_payment_date, cardnumber, card_valid_upto', $where);
        echo json_encode($response);
    }
    
    function send_sms($request_array = []) {
        $flag = FALSE;
        if(!empty($request_array['phones'] && $request_array['message'])) {
            $numbers = $request_array['phones'] ;//['9871833414','7970991179'];
            $message = $request_array['message']; //$message = "Hi vikash,%nYour booking is confirmed%nDate : 22-04-2020%nOrg/Doctor Name : Bhuneswar clininc%nCard No : 9876543210%nAny help to call my support team%nphone : 9876543210%nwebsite link : https://aortadhc.com";
            $sender = 'AORDHC';
            $params = array(
    			'message'       => rawurlencode($message),
    			'numbers'       => implode(',', $numbers),
    			'sender'        => rawurlencode($sender),
    			'apiKey'        => 'kZJLuJiHF6E-9CcZ8d83UP1ufTADEKiT2gs30qBDLK'
    		);
    		
    		$url = 'https://api.textlocal.in/send/';
            $ch = curl_init($url);
    		curl_setopt_array($ch, array(
    			CURLOPT_POST           => true,
    			CURLOPT_POSTFIELDS     => $params,
    			CURLOPT_RETURNTRANSFER => true,
    			CURLOPT_SSL_VERIFYPEER => false
    		));
    
    		$rawResponse = curl_exec($ch);
    		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    		$error = curl_error($ch);
    		echo "<pre>";
    		print_r($httpCode);exit;
    		curl_close($ch);
    		$flag = TRUE;
        }
        return $flag;
    }
    
    public function myads(){
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        $response['user_data'] = $this->admin_model->get_data_by_id($user_id)[0];
        if (!empty($session_data['role'] )) {
            
            $this->load->view('site/new_header', array('session_data' => $session_data));
            $this->load->view('site/profile_header', $response);
            $this->load->view('admin/myads');
            $this->load->view('site/new_footer');
        }
    }
   
    public function mymembership(){
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        $response['user_data'] = $this->admin_model->get_data_by_id($user_id)[0];
        $response['user_members'] = $this->admin_model->get_data("users",'id, fname, lname, mobile, cardnumber, profile_image, card_valid_upto, card_type, created_at',['mobile'=>$session_data['mobile']]);
        if (!empty($session_data['role'] )) {
            $this->load->view('site/new_header', array('session_data' => $session_data));
            $this->load->view('site/patient_profile_header', $response);
            $this->load->view('admin/myfavorite');
            $this->load->view('site/new_footer');
        }
    }
    
    public function manged() {
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        $response['user_data'] = $this->admin_model->get_data_by_id($user_id)[0];
        if (!empty($session_data['role'] )) {
            
            $this->load->view('site/new_header', array('session_data' => $session_data));
            $this->load->view('site/patient_profile_header', $response);
            $this->load->view('admin/manged');
            $this->load->view('site/new_footer');
        }
    }
    
    public function payments() {
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        $response['user_data'] = $this->admin_model->get_data_by_id($user_id)[0];
        if (!empty($session_data['role'] )) {
            
            $this->load->view('site/new_header', array('session_data' => $session_data));
            $this->load->view('site/patient_profile_header', $response);
            $this->load->view('admin/payments');
            $this->load->view('site/new_footer');
        }
    }
    public function orders() {
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        $response['user_data'] = $this->admin_model->get_data_by_id($user_id)[0];
        if (!empty($session_data['role'] )) {
            $response2['order_list'] = $this->admin_model->get_data('paymenttable', 'cardnumber, amount, payfor, orderno, created_at', ['user_id' => $user_id]);
            $this->load->view('site/new_header', array('session_data' => $session_data));
            $this->load->view('site/patient_profile_header', $response);
            $this->load->view('admin/orders',$response2);
            $this->load->view('site/new_footer');
        }
    }
    
    public function tips() {
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        $response['user_data'] = $this->admin_model->get_data_by_id($user_id)[0];
        if (!empty($session_data['role'] )) {
            
            $this->load->view('site/new_header', array('session_data' => $session_data));
            $this->load->view('site/patient_profile_header', $response);
            $this->load->view('admin/tips');
            $this->load->view('site/new_footer');
        }
    }
    public function settings() {
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        $response['user_data'] = $this->admin_model->get_data_by_id($user_id)[0];
        if (!empty($session_data['role'] )) {
            
            $this->load->view('site/new_header', array('session_data' => $session_data));
            $this->load->view('site/patient_profile_header', $response);
            $this->load->view('admin/settings');
            $this->load->view('site/new_footer');
        }
    }
    
    public function offers(){
        $this->load->view('site/new_header');
        $this->load->view('static/offers');
        $this->load->view('site/new_footer');
    }
    /*
    public function about(){
        $this->load->view('site/new_header');
        $this->load->view('static/about');
        $this->load->view('site/new_footer');
    }
		*/
    
    public function get_card(){
        $this->load->view('site/new_header');
        $this->load->view('static/get-card');
        $this->load->view('site/new_footer');
    }
    public function fact_sheet(){
        $this->load->view('site/new_header');
        $this->load->view('static/fact-sheet');
        $this->load->view('site/new_footer');
    }
    public function service(){
        $this->load->view('site/new_header');
        $this->load->view('static/service');
        $this->load->view('site/new_footer');
    }
		/*
    public function career(){
        $this->load->view('site/new_header');
        $this->load->view('static/career');
        $this->load->view('site/new_footer');
    }
    */		
    public function order_pay(){
        $data['cardinfo'][] = $this->input->post('cardname');
        $data['cardinfo'][] = $this->input->post('cardamount');
        $session_data = $this->session->userdata('session_data');
        if (!empty($session_data['role'] ) && $session_data['role'] == 'customer') {
            $response['user_data'] = $this->admin_model->get_data_by_id($session_data['userid'])[0];
            if($session_data['payment_status'] && $response['user_data']['card_valid_upto'] > date('Y-m-d')){
                $this->session->set_flashdata('msg', 'You already purches membership!');
                redirect('admin/profile');
            }
            if($response['user_data']['card_type'] == $this->input->post('cardname')){
                $this->session->set_flashdata('msg', 'You already purche '. $this->input->post('cardname'));
                redirect('admin/profile');
            } else {
                $this->load->view('site/new_header', array('session_data' => $session_data));
                $this->load->view('site/patient_profile_header', $response);
                $this->load->view('admin/order_payment',$data);
                $this->load->view('site/new_footer');
            }
        } else {
            if(!empty($session_data['role'] )){
                $this->session->set_flashdata('msg', 'You do not have permission');
                redirect('admin/profile');
            } else {
                $this->session->set_flashdata('msg', 'First register your account or sign in your account');
                redirect('admin/registration?action=registration');
            }
            redirect('admin/registration');
        }
    }
    function payment_proceed(){
        
        $this->load->library('ccavenue_crypto');
    	$working_key=CCWOEKINGKEY;
    	$access_code= ACCESSCODE;
    	$merchant_data='';
    	$type = $this->input->get('action');
        if($type =='membership' || $type =='generalfee'){
            $trasationCall = true;
            if($type == 'membership' && CARDMEMBERSHIP[$_POST['merchant_param1']] != $_POST['amount']){
                echo "Amount not match to Card Member selection";
                $trasationCall = false;
            }
            if($type == 'generalfee'){
                $amountTable = $this->admin_model->get_fee_and_price($this->input->post('customer_identifier'));
                $feeamount = round($amountTable['generalfee'], 2) - round(($amountTable['generalfee']* $amountTable['discount']/100),2);
                echo $_POST['amount'];
                echo "<br> database fee <br>";
                echo $feeamount;exit;
                if($feeamount != $_POST['amount']){
                    echo "Amount mismatch";
                    $trasationCall = false; 
                }
            }
            if($trasationCall){
                foreach ($_POST as $key => $value){  
        	        $merchant_data.=$key.'='.$value.'&';
            	}
                $encrypted_data = $this->ccavenue_crypto->encrypt($merchant_data,$working_key);
               ?>
               <form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
                   <input type=hidden name=encRequest value="<?php echo $encrypted_data; ?>">
                   <input type=hidden name=access_code value="<?php echo $access_code; ?>">
                </form>
                <script language='javascript'>document.redirect.submit();</script>
                <?php
            }
            
        } else {
            echo "Payment type not defiend";exit;
        }
    }
    
    function ccavResponseHandler(){
        $this->load->library('ccavenue_crypto'); 
        $workingKey= CCWOEKINGKEY;		//Working Key should be provided here.
    	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
    	$rcvdString = $this->ccavenue_crypto->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		$decryptValues= explode('&', $rcvdString);
    	$dataSize=sizeof($decryptValues);
    	$decryptdata = [];
        for($i = 0; $i < $dataSize; $i++){
    		$information = explode('=',$decryptValues[$i]);
    	    $decryptdata[$information[0]] = $information[1];
    	}
    	$session_data = $this->session->userdata('session_data');
    	if (!empty($session_data['role'] )) {
    	    $order_status="";
            $invoicedata['invoicedata'] = $decryptdata;
            $response['user_data'] = $this->admin_model->get_data_by_id($session_data['userid'])[0];
            //===========================
            
            $session_data['payment_status'] = 1;
			$this->session->set_userdata('session_data', $session_data);
			$insert =[
			    'payment_status' => ($decryptdata['merchant_param1'] == 'Free Member') ? 0 : 1,
			    'last_payment_date' => date("Y-m-d"),
                'card_valid_upto' =>  date('Y-m-d', strtotime('+1 years')),
                'last_payment_token' => $decryptdata['order_id'],
                'card_type' => $decryptdata['merchant_param1'],
              ];
			if(empty($response['user_data']['cardnumber'])){
			    $insert['cardnumber'] = "AOR". strtoupper($response['user_data']['fname'][0]). $response['user_data']['mobile'];
                $insert['last_payment_date'] = date("Y-m-d");
                $insert['card_valid_upto'] =  date('Y-m-d', strtotime('+1 years'));
			}
			
			$this->admin_model->update_data('users', array_filter($insert), ['id' => $session_data['userid']]);
			$data_array =[
			   'user_id' => $session_data['userid'],
			   'amount' => $decryptdata['amount'],
			   'payfor' => $decryptdata['merchant_param1'],
			   'orderno' => $decryptdata['order_id'],
			   'tracking_id' => $decryptdata['tracking_id'],
			   'bank_ref_no' => $decryptdata['bank_ref_no'],
			   'paymentresponse' => json_encode($decryptdata)
			];
			
			$this->admin_model->insert_entry('paymenttable', array_filter($data_array));
			$userCreditarray = $this->admin_model->get_data('user_referral' , 'id, userid, registation_status, purchase_status' , ['created_usersID'=> $session_data['userid'], 'status'=>1, 'registation_status' => 1, 'purchase_status' => 0 ]);
			if($userCreditarray){
			    	$this->admin_model->update_data('user_referral', ['purchase_status'=> 1], ['id' => $userCreditarray['id']]);
			}
			//========================
			
            $this->load->view('site/new_header', array('session_data' => $session_data));
            $this->load->view('site/patient_profile_header', $response);
            $this->load->view('admin/thankyou', $invoicedata);
            $this->load->view('site/new_footer');
    	}
  
    }
    function orderResponseHandler(){
        $this->load->library('ccavenue_crypto'); 
        $workingKey= CCWOEKINGKEY;	
    	$encResponse=$_POST["encResp"];		
    	$rcvdString = $this->ccavenue_crypto->decrypt($encResponse,$workingKey);	
		$decryptValues= explode('&', $rcvdString);
    	$dataSize=sizeof($decryptValues);
    	$decryptdata = [];
        for($i = 0; $i < $dataSize; $i++){
    		$information = explode('=',$decryptValues[$i]);
    	    $decryptdata[$information[0]] = $information[1];
    	}
    	$session_data = $this->session->userdata('session_data');
    	if (!empty($session_data['role'] )) {
    	    $order_status="";
            $invoicedata['invoicedata'] = $decryptdata;
            $response['user_data'] = $this->admin_model->get_data_by_id($session_data['userid'])[0];
            //===========================
            $data_array =[
			   'user_id' => $session_data['userid'],
			   'amount' => $decryptdata['amount'],
			   'payfor' => $decryptdata['merchant_param1'],
			   'orderno' => $decryptdata['order_id'],
			   'tracking_id' => $decryptdata['tracking_id'],
			   'bank_ref_no' => $decryptdata['bank_ref_no'],
			   'paymentresponse' => json_encode($decryptdata)
			];
			
			$this->admin_model->insert_entry('paymenttable', array_filter($data_array));
			//========================
			
            $this->load->view('site/new_header', array('session_data' => $session_data));
            $this->load->view('site/patient_profile_header', $response);
            $this->load->view('admin/thankyou', $invoicedata);
            $this->load->view('site/new_footer');
    	}
  
    }
    function  payment_proceed_stripe(){

		$token_id = $this->input->post('token_id');
		$amount = $this->input->post('price');
		$orderno = $this->input->post('orderno');
		$cardaction = $this->input->post('cardaction');
		$card_type = $this->input->post('card_type');
		$session_data = $this->session->userdata('session_data');
		if( $token_id &&  $session_data && $session_data['payment_status'] == 0 ){
			$session_data['payment_status'] = 1;
			$this->session->set_userdata('session_data', $session_data);
			$insert =[
			    'payment_status' => ($card_type == 'Free Card') ? 0 : 1,
			    'last_payment_date' => date("Y-m-d"),
                'card_valid_upto' =>  date('Y-m-d', strtotime('+1 years')),
                'last_payment_token' => $token_id,
                'card_type' => $card_type
			 ];
			if($cardaction != 'renewcard'){
			    $insert['cardnumber'] = "IBR".substr(microtime(true)*10, 0,10);
			}
			$this->admin_model->update_data('users', array_filter($insert), ['id' => $session_data['userid']]);
			$data_array =[
			   'user_id' => $session_data['userid'],
			   'amount' => $amount,
			   'orderno' => $orderno,
			   'payment_token_id' => $token_id
			];
			if($cardaction != 'renewcard'){
			    $data_array['cardnumber'] = "IBR".substr(microtime(true)*10, 0,10);
			}
			$this->admin_model->insert_entry('paymenttable', array_filter($data_array));
			echo $token_id;
		}else {
            echo "Payment has NOT Done";
		}
		
	  }
		/*
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
		*/
	  function forgotpass() {
	        $this->load->view('site/new_header');
            $this->load->view('static/forgotpass');
            $this->load->view('site/new_footer');
	  }
	  function resetpassword() {
	      	$mobile = $this->input->post('mobile');
	      	$this->form_validation->set_rules('mobile','Mobile','is_unique[users.mobile]');
	      	if(!$this->form_validation->run()) {
	      	    $number = substr(microtime(true)*10000, 8);
	      	    $user_array =[
	      	        'otpnumber' => $number,
	      	        'used' => 0
	      	        ];
	      	    $this->admin_model->update_data('users', $user_array, array('mobile' => $mobile));
	      	    $message = "Do not share it with anyone. Your OTP : ".$number.". %nThanks to join US.";
	      	   
                $request_array = [
                    'phones' => (array) $mobile,
                    'message' => $message
                ];
            //     $flag = $this->send_sms($request_array);
	      	    // if(!$flag){
	      	    //     echo "went wrong";exit;
	      	    // }
	      	    $this->load->view('site/new_header');
                $this->load->view('static/resetpassword', ['data' => $mobile]);
                $this->load->view('site/new_footer');
	      	} else {
	      	    $this->session->set_flashdata('errmsg', 'Mobile Number is not Registered');
                redirect('admin/forgotpass'); 
	      	}
	        
	  }
	  
	  function updatepassword(){
	      $array_data =[
    	       'mobile' => $this->input->post('mobile'),
    	       'otpnumber' => $this->input->post('otpnumber')
    	  ];
    	  $update_data = [
    	      'password' => md5($this->input->post('pwsrd')),
    	      'otpnumber' => "Null",
    	      'used'=> 1
    	  ];
    	  $this->form_validation->set_rules('pwsrd', 'Password', 'required|matches[cpwsrd]');
    	  if(!$this->form_validation->run()) 
    	  {
    	      if ($this->input->post('mobile') ) {
        	    $response = $this->admin_model->update_data('users', $update_data, $array_data);
        	    if($response){
                    $this->session->set_flashdata('msg', 'Password change successfully');
                }
               } else {
        	      $this->session->set_flashdata('errmsg', 'Server Error');
                }
        	   redirect('admin/registration');
    	  } else {
    	        $this->session->set_flashdata('errmsg', 'Password do not match');
    	        $this->load->view('site/new_header');
                $this->load->view('static/resetpassword', ['data'=> $this->input->post('mobile')]);
                $this->load->view('site/new_footer');
    	  }
    	  
    	  
	  }
	  function save_message(){
	       $array_data =[
    	       'name' => $this->input->post('contactname'),
    	       'phone' => $this->input->post('phone'),
    	       'email' => $this->input->post('contactemail'),
    	       'message' => $this->input->post('contactmessage')
    	  ];
    	  $this->admin_model->insert_entry('contact_us', array_filter($data_array));
    	  echo $this->db->last_query();
	  }
	  
	  function location_data(){
	      $where = [
	          'city_name' => $this->input->post('location')
	        ];
	      $response = $this->admin_model->get_city_list('city_list','city_name', $where);
	      echo json_encode($response);
	  }
	  function call_otp() {
	     $message =[];
	     $this->form_validation->set_rules('mobile','Mobile','is_unique[users.mobile]');
	     
    	 if($this->form_validation->run()) {
    	     if(!empty($this->input->post('mobile'))){
    	        $number = mt_rand(1000, 9999);
    	        $array_data = [
        	       'otpnumber' => $number,
        	       'mobile' => $this->input->post('mobile'),
                   'isvalidupto'=>strtotime("+10 minutes")
        	    ];
        	    $this->admin_model->insert_entry('otptable', $array_data);
                $this->hspsmsopt($this->input->post('mobile'),"");
                $message =[
                         'statuscode' => TRUE,
                         'message' => "OTP number send successfuly."
                     ];
                // $flag = $this->send_sms($request_array);
                // if($flag){
                //     $message =[
                //         'statuscode' => TRUE,
                //         'message' => "OTP number send successfuly."
                //     ];
                // } else {
                //     $message =[
                //         'statuscode' => FALSE,
                //         'message' => "Invalid Request."
                //     ];
                // }
    	    }
	     } else {
	         $message =[
                'statuscode' => FALSE,
                'message' => "Your mobile number is already registered."
            ];
	     }
	     echo json_encode($message);
	 }
	 
	  function test(){
	      $session_data = $this->session->userdata('session_data');
	      $response['user_data'] = $this->admin_model->get_data_by_id($session_data['userid'])[0];
	        $rcvdString =  [];
	        $this->load->view('site/new_header', array('session_data' => $session_data));
            $this->load->view('site/patient_profile_header', $response);
            $this->load->view('admin/thankyou', $rcvdString);
            $this->load->view('site/new_footer');
	  }
	  
	  function delete_value(){
	      $idvalue =  $this->input->post('idvalue');
    	  $tablename = $this->input->post('tablename');
    	 // echo json_encode(['id'=> $idvalue, 'table'=> $tablename]);
    	  if(!empty($idvalue && $tablename)){
    	     $this->admin_model->deleterow($idvalue , $tablename);
    	     echo json_encode(['status'=>200,'message'=>'succesfully deleted']);
    	     
    	  }
	  }
	  
	  function dpaymment(){
	    $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        $response['user_data'] = $this->admin_model->get_data_by_id($user_id)[0];
        if (!empty($session_data['role'] )) {
            $orgnizationPrice = $this->admin_model->get_fee_and_price($this->input->get('id'));
            if(!empty($orgnizationPrice)){
                $feeamount = '';
                if(isset($orgnizationPrice['generalfee'])){
                    $feeamount = round($orgnizationPrice['generalfee'], 2) - round(($orgnizationPrice['generalfee']* $orgnizationPrice['discount']/100),2);
                    if($response['user_data']['payment_status']){
                        $feeamount = round($orgnizationPrice['generalfee'], 2) - round(($orgnizationPrice['generalfee']* $orgnizationPrice['discount']/100),2);
                    }
                }
                $data['orgdata'] =[
                    'orgid' => $this->input->post('organization_id'),
                    'orgname' => $this->input->post('organization_name'),
                    'gfee' => $feeamount,
                    'id' => $orgnizationPrice['id']
                    ];
                $this->load->view('site/new_header', array('session_data' => $session_data));
                $this->load->view('site/patient_profile_header', $response);
                $this->load->view('admin/dpayment',$data );
                $this->load->view('site/new_footer');
            } else {
                $orgnizationPrice = $this->admin_model->get_fee_and_price_from_searchTable($this->input->get('id'));
                $feeamount = '';
                if(isset($orgnizationPrice['generalfee'])){
                    $feeamount = round($orgnizationPrice['generalfee'], 2);
                    if($response['user_data']['payment_status']){
                        $feeamount = round($orgnizationPrice['generalfee'], 2) - round(($orgnizationPrice['generalfee']* $orgnizationPrice['discount']/100),2);
                    }
                }
                $data['orgdata'] =[
                    'orgid' => $this->input->post('organization_id'),
                    'orgname' => $this->input->post('organization_name'),
                    'gfee' => $feeamount,
                    'id' => $orgnizationPrice['id']
                    ];
                $this->load->view('site/new_header', array('session_data' => $session_data));
                $this->load->view('site/patient_profile_header', $response);
                $this->load->view('admin/dpayment',$data );
                $this->load->view('site/new_footer');
            }
        } else {
            redirect('admin/registration');
        }
	  }
	function uniqueurl($user_id)
	 {
	     $date   =  date('Y-m-d');
	     $url = base64_encode($user_id ."/" . $date);
	     
	     return [
	            'date' => $date,
	            'uniqueurl' => $url,
	            ''
	         ];
	     
	 }
	 function urldecode()
	 {
	     $urlsegment = $this->uri->segment(3);
	     echo base64_decode($urlsegment);
	 }
	 function referal(){
	    $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        if (!empty($session_data['role'] )) {
            $response['user_data'] = $this->admin_model->get_data_by_id($user_id)[0];
            $userCreditarray = $this->admin_model->get_data('user_referral' , 'id, userid, registation_status, purchase_status' , ['userid'=> $user_id, 'status'=>1]);
            if(!empty($userCreditarray)){
                $purchaseCount = $registationCount = 0;
                
                foreach($userCreditarray as $credit){
                    if(!empty($credit['purchase_status'])){
                        $purchaseCount++;
                    } else {
                        $registationCount++;
                    }
                }
               $totalAmount =  $registationCount*2 + $purchaseCount*50;
               $response['acountCredit'] =$totalAmount;
            }
            
            $this->load->view('site/new_header', array('session_data' => $session_data));
            $this->load->view('site/patient_profile_header', $response);
            $this->load->view('admin/refer' );
            $this->load->view('site/new_footer');
        } else {
            redirect('admin');
        }
	}
	
	function refered()
	{
	    $session_data = $this->session->userdata('session_data');
        if (!empty($session_data && $session_data['role'] )) {
            $satrtsvalue = $insetid = 0;
            if($this->input->post('guestemail') || $this->input->post('guestmobile')){
                $user_id = $session_data['userid'];
                $guestemail  =  $this->input->post('guestemail');
                $guestmobile  =  $this->input->post('guestmobile');
                $date   =  date("Y-m-d H:i:s");
    	        
                $satrtsvalue = 1;
                $insarray = [
                    'userid' => $user_id,
                    'to_email'  => $guestemail,
                    'to_mobile' => $guestmobile,
                    'shared_date' => $date,
                    'sharetimes' => 1,
                    'status' => '0'
                ];
                
                $response = $this->admin_model->is_exites('user_referral', array_filter(['to_email' => $guestemail, 'to_mobile' => $guestmobile,'userid' => $user_id]));
                if(empty($response)){
                   $insetid = $this->admin_model->insert_entry('user_referral', $insarray);
                } else {
                   $insarray['sharetimes'] = $response['sharetimes'] + 1 ;
                   $this->admin_model->update_data('user_referral', $insarray,  ['id' => $response['id']]); 
                   $insetid = $response['id'];
                }
            } else  {
                $this->session->set_flashdata('errmsg', 'Email and Mobile both empty!');
                redirect('admin/referal');
            }
	        if(!empty($guestemail) && $satrtsvalue > 0) {
	            $url = base64_encode($insetid ."/" .$user_id ."/" . $date);
                $createlink = base_url(). "admin/linksubmit/". $url;
	            $insarray['link'] = $createlink;
	            
	            $body = $this->load->view('email_template/share_link' , $insarray,  true );
	            $arraydata = [
	                'body' => $body,
	                'useremail' => $guestemail
	            ];
	            $this->send_email($arraydata);
                $this->session->set_flashdata('msg', 'Email send successfuly');
                redirect('admin/referal');
            }
            if(!empty($guestmobile) && $satrtsvalue > 0){
               
            }
        }
	}
	
	function send_email($arraydata = []){
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['mailtype'] ='html';
        $config['wordwrap'] = TRUE;
        
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
		$this->email->from('info@aortadhc.com', 'AORTA DHC');
		$this->email->to($arraydata['useremail']);
		$this->email->subject('WELCOME TO AORTA HEALTH CARE CARD !!');
		$this->email->message($arraydata['body']);
        $this->email->send();
	}
	function linksubmit(){
	    $urlsegment = $this->uri->segment(3);
	    if($urlsegment){
	        redirect('admin/registration?action='.$urlsegment);
	    } else {
	        redirect('admin/registration');
	    }
    }
	function cardprint($id =  0){
	    $session_data = $this->session->userdata('session_data');
	    if (!empty($session_data['role']  && $id)) {
            $this->load->library('ciqrcode');
            $response['user_data'] = $this->admin_model->get_data_by_id($id)[0];
            $qr_image=$id.rand().'.png';
			$params['data'] = $response['user_data']['fname'] . " " . $response['user_data']['lname'] . ", https://aortadhc.com/";
			$params['level'] = 'H';
			$params['size'] = 2;
			$params['savename'] =FCPATH."uploads/qr_image/".$qr_image;
			if($this->ciqrcode->generate($params))
			{
				$response['user_data']['qr_codes']= $qr_image;	
			}
            $this->load->view('email_template/aortacard' , $response);
         }
        //  else if (!empty($session_data['role'] ) && $session_data['role'] == 'customer') {
        //     $user_id = $session_data['userid'];
        //     $response['user_data'] = $this->admin_model->get_data_by_id($id)[0];
        //     $this->load->view('email_template/aortacard' , $response);
        // } 
        else {
            redirect('admin/registration');
        }
	     
	}
    function oldCardPrint($id =  0){
	    $session_data = $this->session->userdata('session_data');
	    
	    $dashboard_permission = ['employee','admin'];
        if (in_array($session_data['role'],$dashboard_permission) && !empty($id)) {
            
            //$response['user_data'] = $this->admin_model->get_data_by_id($id)[0];
            //$this->load->view('email_template/oldaortacard' , $response);
            
            
            
             $this->load->library('Pdf');
             $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
             $pdf->AddPage();
             $reslut['all_lists'] = $this->admin_model->get_data_by_id($id)[0];
             $this->load->view('email_template/oldcard', $reslut);
             $pdf->writeHTML($message);
             $pdf->lastPage();
             ob_end_clean();
             $pdf->Output('example_006.pdf', 'I');
         } else if (!empty($session_data['role'] ) && $session_data['role'] == 'customer') {
            $user_id = $session_data['userid'];
            $response['user_data'] = $this->admin_model->get_data_by_id($user_id)[0];
            $this->load->view('email_template/oldaortacard' , $response);
        } else {
            redirect('admin/registration');
        }
	     
	}
	function get_role_count(){
	    $result = [];
	    $session_data = $this->session->userdata('session_data');
	    if($session_data['role'] =='admin' || $session_data['mobile'] == '9871833414'){
	        $where = '';
	    } else {
	        $where['session_id'] =  $session_data['userid'];
	    }
	    $response = $this->admin_model->get_count_role($where);
	    if(!empty($response)){
	        foreach($response as $value){
	            $result[$value['role']] = $value['rolecount'];
	        }
	    }
	    return $result;
	}
	
	public function add_fmember() 
    {
        $data = [];
        $config['upload_path'] = 'assets/images/profile/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 20024;
        $session_data = $this->session->userdata('session_data');
        $user_id = $session_data['userid'];
        if (!empty($session_data)) {
            $this->form_validation->set_rules('fname', 'Name', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->add_family();
            } else {
                if(file_exists($_FILES['profile_image']['tmp_name']) || is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('profile_image')){
                            $error =  $this->upload->display_errors();
                            $this->session->set_flashdata( 'errmsg', $error );
                            redirect('admin/add_family');
                    }
                    $data = array('upload_data' => $this->upload->data());
                } 
                $mobile = $parentId = '';
                if($session_data['role'] != 'customer'){
                    $mobileandid = explode("-",$this->input->post('mobile'));
                    $mobile = $mobileandid[0];
                    $parentId = $mobileandid[1];
                } else {
                   $mobile = $session_data['mobile'];
                   $parentId = $session_data['userid'];
                }
                
                $data_array = [
                    'fname'  => $this->input->post('fname'),
                    'lname'  => $this->input->post('lname'),
                    'email'  => $this->input->post('email'),
                    'mobile' => $mobile,
                    'role' => 'customer',
                    'gender' => $this->input->post('gender'),
                    'bgroup' => $this->input->post('bgroup'),
                    'dob'   =>  date('Y-m-d',strtotime($this->input->post('dob'))),
                    'fhname' => $this->input->post('fhname'),
                    'adharno' => $this->input->post('adharno'),
                    'address'  => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'state'   => $this->input->post('state'),
                    'country' => $this->input->post('country'),
                    'payment_status' => $this->input->post('payment'),
                    'description' =>$this->input->post('description'),
                    'created_at' => date("Y-m-d h:i:s"),
                    'profile_image' => isset($data['upload_data']['file_name']) ? $data['upload_data']['file_name'] :'',
                    'session_id' => $user_id,
                    'cardnumber' => ($this->input->post('payment') > 0) ? "AOR". strtoupper($this->input->post('fname')[0]) . $this->input->post('mobile') : '',
                    'card_type'  => ($this->input->post('payment') > 0) ? (!empty($this->input->post('card_type')) ? $this->input->post('card_type') : 'Free Member') : "",
                    'is_login' => '5',
                    'parent_id' => $parentId
                ];
                // echo "<pre>";
                // print_r($data_array);exit;
                if($data_array){
                    $this->insert_user($data_array);
                    $user_name = explode(" ", $this->input->post('fname'));
                    $user_sms_data = [
                        'e_name' => $this->input->post('fname')." ".$this->input->post('lname'),
                        'name'  => $user_name[0],
                        'mobile' =>(string)$this->input->post('mobile'),
                        'email' => $this->input->post('email')
                    ];
                    //$this->text_sms($user_sms_data);
                    $this->user_email($user_sms_data);
                    $flash_data = [
                        'fname'  => $this->input->post('fname'),
                        'lname'  => $this->input->post('lname'),
                        ];
                    $this->session->set_flashdata('msg', $flash_data);
                    redirect('admin/add_family');  
                } else {
                    $this->session->set_flashdata('msg', 'No data found');
                    redirect('admin/add_family');
                }
            }
        } else {
            redirect('admin/registration');
        }
    }
    
    function getValue(){
        $response = [];
        $userid = $this->input->post('userid');
        if(!empty($userid)){
            $response = $this->admin_model->get_data('users', 'id,fname,lname,mobile,email',['id'=> $userid]);
        }
        echo json_encode($response);
    }

    function hspsmsopt($number, $message = ''){
        if($number){
            $otp = mt_rand(1000, 9999);
            $message = rawurlencode("Hello, Your OTP is ".$otp." DVYTRP");
            $url = "http://sms.hspsms.com/sendSMS?username=aortadhc&message=".$message."&sendername=DVYTRP&smstype=TRANS&numbers=". $number. "&apikey=4cbf5c55-b59d-4fb6-8ad4-aebf7beed308";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch); 
        } 
    }

    function login_otp() {
        $message =[];
        $this->form_validation->set_rules('mobile','Mobile','is_unique[users.mobile]');
        
        if(!$this->form_validation->run()) {
            if(!empty($this->input->post('mobile'))){
               $number = mt_rand(1000, 9999);
               $update_data = [
                  'otpnumber' => $number,
                  'isvalidupto'=>strtotime("+10 minutes")
               ];
            $where_data =[
                'mobile' => $this->input->post('mobile')
           ];
           $this->admin_model->update_data('users', $update_data, $where_data);
               //$this->hspsmsopt($this->input->post('mobile'),"");
            $message =[
                    'statuscode' => TRUE,
                    'message' => "OTP number send successfuly."
                ];
           }
        } else {
            $message =[
               'statuscode' => FALSE,
               'message' => "Your mobile number is not exits."
           ];
        }
        echo json_encode($message);
    }

    function roleupdate()
    {
        $resqrole = $this->input->post('selectrole');
        $session_data = $this->session->userdata('session_data');
        if($session_data['role'] != $resqrole){
            
            $update_data = [
                'role' => $resqrole,
             ];
            $where_data =[
                'id' => $session_data['userid']
            ];
            $this->admin_model->update_data('users', $update_data, $where_data);
            $session_data['role'] = $resqrole; 
            $msg = 'Role update successfully.';
            $this->session->set_flashdata('msg', $msg);
            $this->session->set_userdata('session_data', $session_data);
        }
        redirect('admin/profile');
    }
    public function timeslots() {
        $org_id = $this->input->post('org_id');
        $date = $this->input->post('date');
        $finalTimeSolts = $this->gettimesolts($org_id, $date);
        $html = $this->load->view('admin/timeslotsoption' , ['timeslots'=> $finalTimeSolts], true);
        echo json_encode($html);
    }

    function caculateslota($StartTime, $EndTime, $Duration="30"){
        $ReturnArray = array ();// Define output
        $StartTime    = strtotime ($StartTime); //Get Timestamp
        $EndTime      = strtotime ($EndTime); //Get Timestamp
    
        $AddMins  = $Duration * 60;
    
        while ($StartTime <= $EndTime) //Run loop
        {
            $ReturnArray[] = date ("G:i a", $StartTime);
            $StartTime += $AddMins;
        }
        return $ReturnArray;
    }

    function gettimesolts($org_id, $date)
    {
        $finalTimeSolts = [];
        if(!empty($org_id && $date)) {
            $timedata = $this->admin_model->get_data( "users" , 'id,  starttime, endtime', ["id"=> $org_id]);
            $timeprepare = [];
            $startTimeArray = json_decode($timedata[0]['starttime']);
            $endTimeArray = json_decode($timedata[0]['endtime']);
            foreach($startTimeArray as $key=>$value){
                if(!empty($value && $endTimeArray[$key]) && $value !='00:00') {
                    $timeprepare[$date][$key]['starttime'] = $value;
                    $timeprepare[$date][$key]['endtime'] = $endTimeArray[$key];
                }
            }
           
            foreach($timeprepare[$date] as $key => $values){
                $timeslostt = $this->caculateslota($values['starttime'], $values['endtime']);
                $finalTimeSolts = array_merge($finalTimeSolts , $timeslostt);
            }
        }
        return  $finalTimeSolts;
    }
}

