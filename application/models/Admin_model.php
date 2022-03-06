
<?php 

class Admin_model extends CI_Model {

    public function insert_entry($table ='', $data = array() ){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    /* get data from table
     * reqired parameter table name, select field value, condition
     * response array
    */ 
    public function get_data( $table = '' , $field_value = '', $where = array(), $where_in = array(), $other= '' ){
        $this->db->select($field_value);
          $this->db->from($table);
          if(!empty( $where)){
              $this->db->where($where);
          }
          if(!empty($where_in)){
              $this->db->where($where_in);
          }
          $query = $this->db->get();
        // print_r($this->db->last_query());    exit;
        return $query->result_array();
		
    }
    public function get_data2( $table = '' , $field_value = '', $like = [] ){
        $this->db->select($field_value);
          $this->db->from($table);
          if(!empty( $like)){
              $this->db->like($like);
          }
          $this->db->where('is_post_list', '1');
          $query = $this->db->get();
         return $query->result_array();
	}
    function get_data_db_search($likein = '', $limit = 0, $offset = 0 ,$where_in = array()){
        $likearray = array(
            'fname'=>trim($likein),
            'role'=>trim($likein),
            'specialization'=>trim($likein),
            'mobile' =>trim($likein),
            'city' =>trim($likein)
        );
        $this->db->select('id, userid, fname, lname, role, specialization, profile_image');
        $this->db->from('search_table');

        if(!empty($likein)){
            $this->db->or_like($likearray);
        }
        
        $this->db->where('is_post_list','1');
        
        if(!empty($where_in)){
           $this->db->where('specialization',$where_in); 
        }
        $this->db->limit($limit, $offset);
        return $this->db->get()->result_array();

    }
    function get_data_by_id($id =''){
            $this->db->select('id, fname, lname, role, email, gender, mobile, cardnumber, address, city, state, country, description, specialization, profile_image, experience, payment_status,organisation_name,discount, created_at, card_valid_upto, card_type, bgroup, dob ');
            $this->db->from('users');
            $this->db->where('users.id',$id);
            return  $this->db->get()->result_array();
		
    }
    function get_organization_data_by_id($id =''){
            $this->db->select('id, fname, lname, role, email, gender, mobile, cardnumber, address, city, state, country, description, specialization, profile_image, experience,organisation_name, discount, created_at, card_valid_upto, starttime, endtime, registrationsvalue, registrationstext, services, specializations, awards, educations, 	memberships, experiencestext, generalfee');
            $this->db->from('users');
            $this->db->where('users.id',$id);
            return  $this->db->get()->result_array();
		
    }
    function update_data($table ='', $data = array(), $where = array()){
        $this->db->where($where);
        return $this->db->update($table, $data);
       
    }
    function get_count(){
            $this->db->where('is_post_list','1');
        return $this->db->count_all('search_table');
    }
    function get_customerinfo($userid){
        $this->db->select(' userid, selectedDate');
        $this->db->from('ordertable');
        $this->db->where('orgid', $userid);
        return $this->db->get()->result_array();        
    }
    function get_data_where_id($id = '', $role = []){
        $this->db->select('id, fname, lname, role, email, mobile, address, city, state, country, profile_image, specialization, payment_status, is_post_list, gender, created_at,cardnumber, card_type');
        $this->db->from('users');
        if(!empty($role)){
            $this->db->where($role);
        }
        if(!empty($id)){
            $this->db->where_in('users.id', $id);
        }
        $this->db->order_by("created_at","desc");
        return  $this->db->get()->result_array();
    
    }
    
    function getRows($params = array()){ 
        $this->db->select('id, userid, fname, lname, role, specialization, experience, email, address, city, state, country, description, profile_image, start_time, end_time, mobile,cut_off_time, no_repeat, created_at, organisation_name, discount, registrationsvalue, registrationstext, starttime, endtime, services, specializations, awards, educations, memberships, experiencestext, generalfee'); 
        $this->db->from('search_table'); 
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
        
        if(array_key_exists("search", $params)){ 
            if(!empty($params['search']['keywords'])){ 
                $this->db->group_start();
                $this->db->like('fname',$params['search']['keywords']);
                $this->db->or_like('lname',$params['search']['keywords']);
                $this->db->or_like('specialization',$params['search']['keywords']);
                $this->db->or_like('organisation_name',$params['search']['keywords']);
                $this->db->group_end();
            } 
            if(!empty($params['search']['location'])){
                 $this->db->group_start();
                    $this->db->or_like('city',$params['search']['location']);
                    $this->db->or_like('state',$params['search']['location']);
                 $this->db->group_end();
            }
            if(!empty($params['search']['categories']) && $params['search']['categories'] !="allcategories"){ 
                 $this->db->where('role',$params['search']['categories']);
            }
            if(!empty($params['search']['specialization'])){ 
                $specialization_array = explode(",",$params['search']['specialization']);
                $this->db->where_in('specialization',$specialization_array);
            }
        } 
        $this->db->where('is_post_list',1);
        if(!empty($params['search']['sortby'])){ 
            $this->db->order_by('created_at', $params['search']['sortby']); 
        }else { 
            $this->db->order_by('id', 'DESC'); 
        } 
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        } else { 
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                $this->db->limit($params['limit'],$params['start']); 
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                $this->db->limit($params['limit']); 
            } 
             
            $query = $this->db->get();
            //echo $this->db->last_query();exit;
            $result = ($query->num_rows() > 0)? $query->result_array() : FALSE; 
        } 
        return $result; 
    }
    
    function get_booking_slots($where = []){
        $result = [];
       
            $this->db->select('users.id, fname, lname, mobile, address, city, profile_image, cardnumber, is_post_list, payment_status, selectedDate');
            $this->db->from('users');
            $this->db->join('ordertable', 'ordertable.patient_id = users.id');
            $this->db->where($where);
            
            $result = $this->db->get()->result_array();
            //echo $this->db->last_query();exit;
        return $result;
    }
    
    function get_booking_slots2($where = []){
        $result = [];
       
            $this->db->select('users.id, fname, lname, mobile, address, city, profile_image, is_post_list, payment_status, selectedDate, role, ordertable.id as ordertableid, ordertable.status, ordertable.created_at, organization_id');
            $this->db->from('users');
            $this->db->join('ordertable', 'ordertable.organization_id = users.id');
            $this->db->where($where);
            $result = $this->db->get()->result_array();
        return $result;
    }
    
    function get_city_list($table_name, $colume, $likecondition){ 
        $result = [];
        if(!empty($table_name)){
            $this->db->select($colume);
            $this->db->from($table_name);
            $this->db->like('city_name', $likecondition['city_name']);
            return $this->db->limit(10)->get()->result_array();
        }
        
    }
    function deleterow($id = '', $table = '', $where = ''){
        if(!empty($id && $table)){
             $this->db->delete($table, array('id' => $id));
        }
    }
    
    function is_exites($table, $where){
        $this->db->select('id,sharetimes');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->row_array();
    }
    
    function get_fee_and_price($id =''){
            $this->db->select('id,discount,generalfee');
            $this->db->from('users');
            $this->db->where('users.id',$id);
            return  $this->db->get()->row_array();
		
    }
    
    function get_fee_and_price_from_searchTable($id =''){
            $this->db->select('id,discount,generalfee');
            $this->db->from('search_table');
            $this->db->where('search_table.userid',$id);
            return  $this->db->get()->row_array();
	}
	
	function get_count_role($where = []){
        $this->db->select('count(*) rolecount, role');
        $this->db->from('users');
        if(!empty($where)){
            $this->db->where($where);
        }
        $this->db->group_by('role'); 
        return  $this->db->get()->result_array();
	}
}

?>