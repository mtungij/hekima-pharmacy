<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->model('queries');
        $shop = $this->queries->get_shop_infoData();
        $this->load->view('home/home',['shop'=>$shop]);
    }
     
 public function signin(){
$this->form_validation->set_rules('phone_number','phone number','required');
$this->form_validation->set_rules('password','password','required');
$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
if ($this->form_validation->run() ) {
$phone_number = $this->input->post('phone_number');
$password = sha1($this->input->post('password'));
$this->load->model('queries');
$userexit = $this->queries->user_data($phone_number,$password);
// print_r($userexit);
//    exit();
if ($userexit ) {
if ($userexit->role == 'admin') {
    $sessionData = [
    'user_id' => $userexit->user_id,
    'phone_number' => $userexit->phone_number,
    'full_name' => $userexit->full_name,
    'role' => $userexit->role,
    ];

   //  print_r($userexit);
   // exit();
    if ($userexit->status == 'open') {
$this->session->set_userdata($sessionData);
$this->session->set_flashdata('massage','Login Successfully');
return redirect('admin/index');
}elseif ($userexit->status == 'close') {
$this->session->set_userdata($sessionData);
$this->session->set_flashdata('ms','Account closed');
    return redirect("home/index");
}

}elseif($userexit->role == 'seller') {
    $sessionData = [
    'user_id' => $userexit->user_id,
    'phone_number' => $userexit->phone_number,
    'full_name' => $userexit->full_name,
    'role' => $userexit->role,

    ];
    //     exit();
    // print_r($sessionData);
if ($userexit->status =='open') {
$this->session->set_userdata($sessionData);
$this->session->set_flashdata('massage','Login Successfully');
          return redirect("seller/index");
    }elseif($userexit->status == 'close'){
$this->session->set_flashdata('massage','account closed');
    return redirect("home/index");

  }
}elseif($userexit->role == 'cashier') {
    $sessionData = [
    'user_id' => $userexit->user_id,
    'phone_number' => $userexit->phone_number,
    'full_name' => $userexit->full_name,
    'role' => $userexit->role,

    ];
    
    // print_r($sessionData);
    //     exit();
if ($userexit->status =='open') {
$this->session->set_userdata($sessionData);
$this->session->set_flashdata('massage','Login Successfully');
          return redirect("cashire/dashboard");
    }elseif($userexit->status == 'close'){
$this->session->set_flashdata('massage','account closed');
    return redirect("home/index");

  }
}

}
else{

$this->session->set_flashdata('ms','Invalid your Phone number or password');
return redirect("home/index");
}
}
else{
$this->login();      
}

}


//use log out
public function logout(){
$this->session->unset_userdata("user_id");
$this->session->set_flashdata('massage','Logout Successfully');
return  redirect("home/index");
}
}