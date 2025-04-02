<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Purchase_order extends CI_Controller{
     function index(){
        $this->load->model('queries');
        $user_id = $this->session->userdata('user_id');
       
        $my = $this->queries->get_mydata($user_id);
       
          // print_r($product);
          //   exit();
        $data = array();
        // Retrieve cart data from the session
        $cartItems = $this->cart->contents();
        print_r($data);
             exit();
        $privillage = $this->queries->get_userPrivillage($user_id);
        // Load the cart view
        $this->load->view('admin/order',['cartItems'=>$cartItems,'my'=>$my,'privillage'=>$privillage]);
    }
}