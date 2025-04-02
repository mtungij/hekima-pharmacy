	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cashire_cart extends CI_Controller{
     function index(){
        $this->load->model('queries');
        $user_id = $this->session->userdata('user_id');
        $datay = $this->queries->get_productAll();
        $limit = $this->queries->get_stock_limitData();
        $my = $this->queries->get_mydata($user_id);
        $kwisha = $this->queries->get_bidhaa_kwisha();
          // print_r($product);
          //   exit();
        $data = array();
        // Retrieve cart data from the session
        $cartItems = $this->cart->contents();
        // print_r($cartItems);
        //      exit();
        
        // Load the cart view
        $this->load->view('cashire/cart',['cartItems'=>$cartItems,'datay'=>$datay,'limit'=>$limit,'my'=>$my,'kwisha'=>$kwisha]);
    }

  


      function updateItemQty(){
        $update = 0;
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $item_id = $this->input->get('item_id');
        $qty = $this->input->get('qty');
        //$id = $this->input->get();
          // var_dump($item_id);
              // exit();
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
              );

           if($this->checkForItemBalance($item_id,$qty)){

            $update = $this->cart->update($data);
              echo "ok";
        }else{
          echo "err";
        }


        }
        
        // Return response
        // echo $update?'ok':'err';
    }
    
    function checkForItemBalance($item_id,$qnty){
    echo "item_id " . $item_id. $qnty;
    $sql = "SELECT * FROM tbl_store WHERE product_id='$item_id' AND balance >= '$qnty'";
      $data = $this->db->query($sql);
      // echo "<pre>";
      // print_r($data->result());
      // echo "</pre>";

      //echo "total  == " . count($data->result());
      if(count($data->result()) > 0){
        return true;
      }
      return false;
    }


   
    
    function removeItem($rowid){
        // Remove item from cart
        $remove = $this->cart->remove($rowid);
        
        // Redirect to the cart page
        redirect('cashire_cart/');
    }

        //session destroy
        public function __construct(){
        parent::__construct();
        $this->load->library('cart');
        if (!$this->session->userdata("user_id"))
        return redirect("home/index");
    }


  

    
}