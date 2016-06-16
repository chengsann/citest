<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of privilege
 *
 * @author loong
 */
class Privilege  extends CI_Controller {



    //put your code here
    public function __construct() {
        
        parent::__construct();
        
        $this->load->helper('captcha');
        $this->load->library('form_validation');
        $this->load->model('admin_model','admin');
        $this->load->library('session');
    }
    public function login()
    {
        $this->load->view('login.html');
    }
    public function  code()
    {
        $vals = array(
            'word_length' =>4,
        );
        $code = create_captcha($vals);
        $this->session->set_userdata('code',$code);
    }
    
    public function singin()
    {
        $this->form_validation->set_rules('username','用户名','required');
        $this->form_validation->set_rules('password','密码','required');
        $captcha = strtolower($this->input->post('captcha'));
        $code = strtolower($this->session->userdata('code'));
        if($captcha ===$code){
            if($this->form_validation->run() == FALSE){
                $data['message'] =  validation_errors();
                $data['url'] = site_url('admin/privilege/login');
                $data['wait'] = 4;
                $this->load->view('message.html',$data);
            }  else {
            $admin_name = $this->input->post('username',true);
            $password = $this->input->post('password',true);
            if($this->admin->get_admin($admin_name,$password)){
                $this->session->set_userdata('admin',$admin_name);
                redirect('admin/main/index');
            }  else {
            $data['message'] = '用户或密码错误';
            $data['url'] = site_url('admin/privilege/login');
            $data['wait'] =4;
            $this->load->view('message.html',$data);
            
            }
            }
        }  else {
          $data['message'] = '验证码错误，请重新输入';
          $data['url'] = site_url('admin/privilege/login');
          $data['wait'] = 4;
          $this->load->view('message.html',$data);
           
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('admin');
        $this->session->sess_destroy();
        redirect('admin/privilege/login');
    }
}
