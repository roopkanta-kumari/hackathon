<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function __construct(){  
        parent::__construct();
        $this->load->model('homepage_model');
    }

    public function signup()
    {
        /*Define single page content as usual*/
        $toView['page_content'] = date("H:i:s");
        $toView['other_data'] = "<p>See you!</p>";
        $email = $this->input->post('email');
        $password= $this->input->post('password');
        $table_name='user_registration';
        $email ='roopakarshad2@gmail.com';
        $password= '123456';
        $columnname ='email';
        $value=$email;
        if(isset($email)and $email!=null){
        $result_validate = $this->homepage_model->get_from_table($table_name, $columnname,$value);
        if(isset($result_validate)&& $result_validate!=null){
        if($result_validate[0]->email != null){
            $data= array('code'=>198,'data'=>'Email already exist');
//             echo'Email already exist';             
        }}
        else{
        $detail=array('email'=>$email, 'password'=>$password);     
        $result = $this->homepage_model->add_to_table($table_name, $detail); 
        $data= array('code'=>200,'data'=>'Singned up successfully');
       
        }
        }
        else{
              $data= array('code'=>198,'data'=>'Email not found');
        }
        echo json_encode($data);
//          echo"<pre>";print_r($data);

    }
    public function user_detail(){
        $hus_name = $this->input->post('hus_name');
        $wife_name = $this->input->post('wife_name');
        $wife_email = $this->input->post('wife_email');
        $wife_password = $this->input->post('$wife_password');
        $session_hus_id= 1;
        $hus_name='arshad';
        $wife_name='roop';
        $wife_email='roopkanta3@gmail.com';
        $wife_password ='123456';
        $table_name='user_registration';
        $table_name_detail="user_detail";
        $columnname='email';
        $value=$wife_email;
        $result_validate = $this->homepage_model->get_from_table($table_name, $columnname,$value);
        if(isset($result_validate)&& $result_validate!=null){
        if($result_validate[0]->email != null){
            $data= array('code'=>198,'data'=>'Email already exist');
//             echo'Email already exist';             
        }}
        else{
        
        
        $detail = array('email'=>$wife_email,'password'=>$wife_password);
        $wife_id = $this->homepage_model->add_to_table($table_name, $detail);
        if(isset($wife_id)){
            $hus_data=array('user_id'=>$session_hus_id,'partner_id'=>$wife_id,'name'=> $hus_name);
            $wife_data=array('user_id'=>$wife_id,'partner_id'=>$session_hus_id,'name'=> $wife_name);
            $hus_result = $this->homepage_model->add_to_table($table_name_detail,  $hus_data);
            $wife_result= $this->homepage_model->add_to_table($table_name_detail, $wife_data);
        }
        if(isset($hus_result)&& isset($wife_result))
        {
             $data= array('code'=>200,'data'=>'Registration done');
        }
        }
        echo json_encode($data);
    }
    
    public function signin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $email='roopkanta@gmail.com';
        $password='1234567';
        $table_name='user_registration';
        $result = $this->homepage_model->get_from_table_where2($table_name,'email',$email,'password',$password);
        if(isset($result)&& $result!=null){
            $data= array('code'=>200,'data'=>'logged in successfully');
//             echo'Email already exist';             
        }
        else{
            $data= array('code'=>198,'data'=>'Please check email or password');
        }
        echo json_encode($data);
        
    }
}

/*End of file homepage.php*/
/*Location .application/controllers/example.php*/