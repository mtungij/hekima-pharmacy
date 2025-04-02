<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cashire extends CI_Controller {
	public function index(){
	$this->load->model('queries');
  $user_id = $this->session->userdata('user_id');
  $my = $this->queries->get_mydata($user_id);
	$datay = $this->queries->get_productAll();
  $cartItems = $this->cart->contents();
  $limit = $this->queries->get_stock_limitData();
  $kwisha = $this->queries->get_bidhaa_kwisha();
   //   echo "<pre>";
	  // print_r($kwisha);
   //    echo "</pre>";
	  //    exit(); 
    $this->load->view('cashire/index',['datay'=>$datay,'cartItems'=>$cartItems,'limit'=>$limit,'my'=>$my,'kwisha'=>$kwisha]);
	}


	public function dashboard(){
 $this->load->model('queries');
  $user_id = $this->session->userdata('user_id');
  $my = $this->queries->get_mydata($user_id);
  $cashire = $this->queries->get_today_cashire_request();
  $today_total = $this->queries->get_total_req();

  $recept = $this->queries->get_all_order_request();
    //     echo "<pre>";
    // print_r($recept);
    //      exit();
$this->load->view('cashire/dashboard',['my'=>$my,'cashire'=>$cashire,'today_total'=>$today_total,'recept'=>$recept]);
	}

  public function confirm_order($order_id){
  $this->load->model('queries');
  $all_order= $this->queries->get_order_status($order_id);  
  if ($all_order->order_status = 'aproved') {
        $this->queries->confirm_order_data($order_id,$all_order);
        $this->session->set_flashdata('massage','Order Aproved Successfully');
    }
    return redirect('cashire/dashboard');
  }


  public function view_order_confirmd(){
  $this->load->model('queries');
  $user_id = $this->session->userdata('user_id');
  $my = $this->queries->get_mydata($user_id);
  $recept = $this->queries->get_all_order_request_confirmed();
  $total_recept = $this->queries->get_all_order_request_confirmed_total();
   // print_r($total_recept);
   //         exit();

  $this->load->view('cashire/order_confirmed',['recept'=>$recept,'my'=>$my,'total_recept'=>$total_recept]);
  }


	function addToCart($proID){
        $this->load->model('queries');
        // Fetch specific product by ID
        $product = $this->queries->getRows($proID);
        
        // Add product to the cart
        $data = array(
            'id'  => $product['id'],
            'qty'  => 1,
            'price' => $product['price'],
            'ju_price' => $product['ju_price'],
            'buy_price' => $product['buy_price'],
            'name'    => $product['name'],
            'unit' => $product['unit'],
        );
        // echo "<pre>";
        // print_r($data);
        //  echo "</pre>";
        //      exit();
        $this->cart->insert($data);
        
        // Redirect to the cart page
      redirect('cashire_cart/');
    }


      function addToCart_jumla($proID){
        $this->load->model('queries');
        // Fetch specific product by ID
        $product = $this->queries->getRows($proID);
        
        // Add product to the cart
        $data = array(
            'id'  => $product['id'],
            'qty'  => 1,
            'price' => $product['price'],
            'ju_price' => $product['ju_price'],
            'buy_price' => $product['buy_price'],
            'name'    => $product['name'],
            'unit' => $product['unit'],
        );
        // echo "<pre>";
        // print_r($data);
        //  echo "</pre>";
        //      exit();
        $this->cart->insert($data);
        
        // Redirect to the cart page
      redirect('cart_jumla/');
    }


 // function updateItemQty(){
 //        $update = 0;
 //        // Get cart item info
 //        $rowid = $this->input->get('rowid');
 //        $qty = $this->input->get('qty');
       
 //        // Update item in the cart
 //        if(!empty($rowid) && !empty($qty)){
 //            $data = array(
 //                'rowid'=> $rowid,
 //                'qty'  => $qty
 //            );
 //            $update = $this->cart->update($data);
 //        }
        
 //        // Return response
 //        echo $update?'ok':'err';
 //    }

   function updateItemQty(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $item_id = $this->input->get('item_id');
        $qty = $this->input->get('qty');
        //$id = $this->input->get();
          // print_r($rowid);
          //     exit();
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );

           // alert($data);
           if($this->checkForItemBalance($item_id,$qty)){

            $update = $this->cart->update($data);
              // print_r($update);
              //   exit();
              echo "ok";
        }else{
          echo "err";
        }


        }
        
        // Return response
        // echo $update?'ok':'err';
    }

    function checkForItemBalance($item_id,$qnty){
      $sql = "SELECT * FROM tbl_store WHERE product_id='$item_id' AND balance >= '$qnty'";
      $data = $this->db->query($sql);
      
      if(count($data->result()) > 0){
        return true;
      }
      return false;
    }






    public function sell(){
      $validation  = array( array('field'=> 'product_id[]','rules'=>'required'));
      $this->form_validation->set_rules($validation);
       if ($this->form_validation->run() == true) {
          $product_id  = $this->input->post('product_id[]');
          $quantity  = $this->input->post('quantity[]');
          $new_sell_price = $this->input->post('new_sell_price[]');
          $total_sell_price = $this->input->post('total_sell_price[]');
          $profit = $this->input->post('profit[]');
          $user_id = $this->input->post('user_id[]');
          $sell_status = $this->input->post('sell_status[]');
          $customer = $this->input->post('customer');
          $total_price = $this->input->post('total_price');
          $sell_day = date("Y-m-d");

          // print_r($sell_status);
          //      exit();
  
          for($i=0; $i<count($product_id);$i++){
            $date = date("Y-m-d");
        $this->db->query("INSERT INTO  tbl_sell (`product_id`,`quantity` ,`new_sell_price`,`total_sell_price`,`profit`,`user_id`,`sell_status`,`sell_day`,`customer`) 
      VALUES ('".$product_id[$i]."','".$quantity[$i]."','".$new_sell_price[$i]."','".$total_sell_price[$i]."','".$profit[$i]."','".$user_id[$i]."','".$sell_status[$i]."','$sell_day','$customer')");
        $this->db->query("INSERT INTO  tbl_stock_movement (`product_id`,`product_qnty`,`user_id`,`mov_status`,`date`) 
      VALUES ('".$product_id[$i]."','".$quantity[$i]."','".$user_id[$i]."','SOLD','$date')");
          }

          $this->cart->destroy();
           for ($i=0; $i<count($product_id); $i++) { 
        $this->update_storedata($product_id[$i],$quantity[$i]);
            }

          $this->insert_cashire_report($customer,$total_price);
          $this->session->set_flashdata('massage','The product sold successfully');
       }
       return redirect("cashire_cart/"); 
    }


              //update product store
  public function update_storeDatas($product_id,$quantity){
  for ($i=0; $i<count($product_id); $i++) { 
  $sqldata="UPDATE tbl_store SET `out_balance`= `out_balance`+'".$quantity[$i]."',`balance`=`balance`-'".$quantity[$i]."' WHERE `product_id` = '".$product_id[$i]."'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
   }
}

//update product store
  public function update_storedata($product_id,$quantity){
  $sqldata="UPDATE tbl_store SET `out_balance`= `out_balance`+$quantity,`balance`=`balance`-$quantity WHERE `product_id` = '$product_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}


    //insert cashire record
     public function insert_cashire_report($customer,$total_price){
    $date = date("Y-m-d");
      $this->db->query("INSERT INTO tbl_cashire (`full_name`,`total_price`,`date`) VALUES ('$customer','$total_price','$date')");
      }


    public function sell_jumla(){
      $validation  = array( array('field'=> 'product_id[]','rules'=>'required'));
      $this->form_validation->set_rules($validation);
       if ($this->form_validation->run() == true) {
          $product_id  = $this->input->post('product_id[]');
          $quantity  = $this->input->post('quantity[]');
          $new_sell_price = $this->input->post('new_sell_price[]');
          $total_sell_price = $this->input->post('total_sell_price[]');
          $profit = $this->input->post('profit[]');
          $user_id = $this->input->post('user_id[]');
          $sell_status = $this->input->post('sell_status[]');
          $sell_day = date("Y-m-d");

          // print_r($sell_status);
          //    exit();
  
          for($i=0; $i<count($product_id);$i++){
        $this->db->query("INSERT INTO  tbl_sell (`product_id`,`quantity` ,`new_sell_price`,`total_sell_price`,`profit`,`user_id`,`sell_status`,`sell_day`) 
      VALUES ('".$product_id[$i]."','".$quantity[$i]."','".$new_sell_price[$i]."','".$total_sell_price[$i]."','".$profit[$i]."','".$user_id[$i]."','".$sell_status[$i]."','$sell_day')");
          }
          // print_r($product_id);
          // print_r($quantity);
          //      exit();
          $this->cart->destroy();
          $user_id = $this->session->userdata('user_id');
          $data = $this->gets($user_id);
              //   echo "<pre>";
              // print_r($data);
              // echo "</pre>";
              //     exit();
           for ($i=0; $i<count($data); $i++) { 
        $this->update_store($data[$i]->product_id,$data[$i]->quantity);
              //print_r($data[$i]->product_id);
              //print_r($data[$i]->quantity);
            }

               //exit();  
          
          $this->session->set_flashdata('massage','The product sold successfully');
       }
       return redirect("cart_jumla/"); 
    }
   
//get sell now function
    public function gets($user_id){
  $sql = "SELECT s.quantity,s.product_id FROM tbl_sell s JOIN tbl_user u ON u.user_id = s.user_id  WHERE s.user_id = '$user_id' AND s.created_at = NOW() ";
  $query = $this->db->query($sql);

   return $query->result();
    }

//update product store
  public function update_store($product_id,$quantity){
  $sqldata="UPDATE tbl_store SET `out_balance`= `out_balance`+$quantity,`balance`=`balance`-$quantity WHERE `product_id` = '$product_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}


public function today_salles(){
  $user_id = $this->session->userdata('user_id');
  $date = date("Y-m-d");
  $this->load->model('queries');
  $data = $this->queries->get_sallesToday_Cashire();
  $today_SalesData = $this->queries->get_today_sales_cashire();
  $my = $this->queries->get_mydata($user_id);
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    //    exit();
  $this->load->view('cashire/salles_today',['data'=>$data,'today_SalesData'=>$today_SalesData,'my'=>$my]);
}

public function retail_sale(){
  $this->load->model('queries');
  $user_id = $this->session->userdata('user_id');
  $retail = $this->queries->get_sallesTodayRetail_cashire();
  $my = $this->queries->get_mydata($user_id);
  $total_retail = $this->queries->get_today_salesreatil_cashire();
    //   echo "<pre>";
    // print_r($total_retail);
    // echo "</pre>";
    //      exit();
  $this->load->view('cashire/retail_sale',['retail'=>$retail,'my'=>$my,'total_retail'=>$total_retail]);
}

public function whore_sale(){
  $this->load->model('queries');
  $user_id = $this->session->userdata('user_id');
  $whole_sale = $this->queries->get_sallesTodayWholesale_cashire();
  $my = $this->queries->get_mydata($user_id);
  $total_wholesale = $this->queries->get_today_salesWhole_cashire();
  // echo "<pre>";
  // print_r($total_wholesale);
  // echo "</pre>";
  //       exit();
  $this->load->view('cashire/whole_sale',['my'=>$my,'whole_sale'=>$whole_sale,'total_wholesale'=>$total_wholesale]);
}

public function cash_flow(){
 $this->load->model('queries');
 $user_id = $this->session->userdata('user_id');
 $today = $this->queries->get_use_today_cashire();
 $matumizi = $this->queries->get_totalMatumizi_cashire();
 $today_SalesData = $this->queries->get_today_sales_cashire();
 $my = $this->queries->get_mydata($user_id);

 // echo "<pre>";
 //   print_r($matumizi);
 //    echo "</pre>";
 //     exit();
  $this->load->view('cashire/cashflow',['today'=>$today,'matumizi'=>$matumizi,'today_SalesData'=>$today_SalesData,'my'=>$my]);
}

public function create_useToday(){
  $this->form_validation->set_rules('price','price','required');
  $this->form_validation->set_rules('description','description','required');
  $this->form_validation->set_rules('user_id','user_id','required');
  //$this->form_validation->set_rules('day','day','required');
  $this->form_validation->set_rules('<div class="text-danger">','</div>');
  if ($this->form_validation->run() ) {
     $data = $this->input->post();
     $data['day'] = date("Y-m-d");
     $this->load->model('queries');
     //$data['day'] = $this->input->post();
     // print_r($data);
     //    exit();
     if ($this->queries->insert_useToday($data)) {
       $this->session->set_flashdata('massage','Day use saved successfully');
     }else{
       $this->session->set_flashdata('error','Failed');
     }
     return redirect('cashire/cash_flow');
  }
  $this->cash_flow();
}


public function today_saled_report(){
  $this->load->model('queries');
  $user_id = $this->session->userdata('user_id');
  $data = $this->queries->get_sallesToday_Cashire();
  $today_SalesData = $this->queries->get_today_sales_cashire();
  $shop = $this->queries->get_shop_infoData();
   // echo "<pre>";
   // print_r($shop);
   // echo "</pre>";
   //     exit();
   $mpdf = new \Mpdf\Mpdf();
    $html = $this->load->view('cashire/today_sales_report',['data'=>$data,'today_SalesData'=>$today_SalesData,'shop'=>$shop],true);
    $mpdf->SetFooter('Generated By (0) 628-323-760 & (0) 753-871-034');
        $mpdf->WriteHTML($html);
        $mpdf->Output();

}


public function setting(){
  $this->load->model('queries');
  $user_id = $this->session->userdata('user_id');
  $my = $this->queries->get_mydata($user_id);
  $this->load->view('cashire/setting',['my'=>$my]);
}


 public function modify_mydata($user_id){
    $this->form_validation->set_rules('full_name','Name','required');
    $this->form_validation->set_rules('phone_number','Phone number','required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
    if ($this->form_validation->run() ) {
      $data = $this->input->post();
      //  echo "<pre>";
      // print_r($data);
      // echo "</pre>";
      //      exit();
      $this->load->model('queries');
      if ($this->queries->update_mydata($data,$user_id)) {
        $this->session->set_flashdata('massage','Data Updated successfully');
      }else{
        $this->session->set_flashdata('error','Failed');
      }
      return redirect('cashire/setting');
    }
    $this->setting();
  }


  public function profile_pc(){
    $this->load->model('queries');
    $user_id = $this->session->userdata('user_id');
    $my = $this->queries->get_mydata($user_id);
    $this->load->view('cashire/profile_pc',['my'=>$my]);
  }


  public function modify_profilepc($user_id){
    if(!empty($_FILES['img']['name'])){
                $config['upload_path'] = 'assets/admin/img/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                $config['file_name'] = $_FILES['img']['name'];
                    //die($config);
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('img')){
                    $uploadData = $this->upload->data();
                    $img = $uploadData['file_name'];
                }else{
                    $img = '';
                }
            }else{
                $img = '';
            }
            
            //Prepare array of user data
            $data = array(
            'img' => $img,
            );
            //   echo "<pre>";
            // print_r($data);
            //  echo "</pre>";
            //   exit();
            //Pass user data to model
           $this->load->model('queries'); 
            $data = $this->queries->update_mydata($data,$user_id);
            
            //Storing insertion status message.
            if($data){
                $this->session->set_flashdata('massage','Data updated successfully');
            }else{
                $this->session->set_flashdata('error','Data failed!!');
            }
            return redirect('cashire/profile_pc');
  }


   public function change_password(){
        $this->load->model('queries');
       $user_id = $this->session->userdata('user_id');
      $my = $this->queries->get_mydata($user_id);
        $this->form_validation->set_rules('oldpass', 'old password', 'required|matches[oldpass]');
        $this->form_validation->set_rules('newpass', 'new password', 'required');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');

        $this->form_validation->set_error_delimiters('<strong><div class="text-danger">', '</div></strong>');

        if($this->form_validation->run() == false) {
                //$this->load->view('estate/incs/header');
                //$this->load->view('estate/incs/side');
   
        $this->load->view("cashire/password",['my'=>$my]);
                //$this->load->view('estate/incs/footer');
        }
        else {

            $user_id = $this->session->userdata('user_id');
            $newpass = $this->input->post('newpass');
            $this->queries->update_password_data($user_id, array('password' => sha1($newpass)));
            $this->session->set_flashdata('massage','Password changed successfully');
            redirect('cashire/change_password');
        }
        }

public function password_check($oldpass)
    {
        $this->load->model('queries');
        $user_id = $this->session->userdata('user_id');
        $user = $this->queries->get_user_data($user_id);

        if($user->password !== sha1($oldpass)) {
            $this->form_validation->set_message('massage', ' {field} Password not Match');
            return false;
        }

        return true;
    }

  public function edit_cashflow($id){
    $this->load->model('queries');
    $cash = $this->queries->get_editCashflow($id);
    $user_id = $this->session->userdata('user_id');
    $my = $this->queries->get_mydata($user_id);
    $this->load->view('cashire/edit_cashflow',['cash'=>$cash,'my'=>$my]);
  }

  public function modify_cashflow($id){
    $this->form_validation->set_rules('price','price','required');
    $this->form_validation->set_rules('description','description','required');
    $this->form_validation->set_rules('<div class="text-danger">','</div>');
    if ($this->form_validation->run() ) {
      $data = $this->input->post();
      // print_r($data);
      //      exit();
      $this->load->model('queries');
      if ($this->queries->update_cashflow($id,$data)) {
        $this->session->set_flashdata('massage','Data updated successfully');
      }else{
        $this->session->set_flashdata('error','Failed');
      }
      return redirect('cashire/edit_cashflow/'.$id);
    }
    $this->edit_cashflow();
  }

  public function get_emptyItm(){
    $this->load->model('queries');
    $user_id = $this->session->userdata('user_id');
    $my = $this->queries->get_mydata($user_id);
    $empty = $this->queries->get_bidhaa_kwisha();
    // echo "<pre>";
    //   print_r($empty);
    // echo "</pre>";
    //        exit();
    $this->load->view('cashire/empty_product',['empty'=>$empty,'my'=>$my]);
  }


  public function today_retail_salesReport(){
  $this->load->model('queries');
  $user_id = $this->session->userdata('user_id');
  $my = $this->queries->get_mydata($user_id);
  $total_retail = $this->queries->get_today_salesreatil_cashire();
  $retail = $this->queries->get_sallesTodayRetail_cashire();
  $shop = $this->queries->get_shop_infoData();
   // echo "<pre>";
   // print_r($shop);
   // echo "</pre>";
   //     exit();
   $mpdf = new \Mpdf\Mpdf();
    $html = $this->load->view('cashire/retail_sale_report',['retail'=>$retail,'total_retail'=>$total_retail,'shop'=>$shop],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

}

  public function today_whole_salesReport(){
  $this->load->model('queries');
  $user_id = $this->session->userdata('user_id');
  $total_wholesale = $this->queries->get_today_salesWhole_cashire();
  $whole_sale = $this->queries->get_sallesTodayWholesale_cashire();
  $shop = $this->queries->get_shop_infoData();
   // echo "<pre>";
   // print_r($shop);
   // echo "</pre>";
   //     exit();
   $mpdf = new \Mpdf\Mpdf();
    $html = $this->load->view('cashire/whole_sale_report',['whole_sale'=>$whole_sale,'total_wholesale'=>$total_wholesale,'shop'=>$shop],true);
    $mpdf->SetFooter('Generated By (0) 628-323-760 & (0) 753-871-034');
        $mpdf->WriteHTML($html);
        $mpdf->Output();

}

public function exit_mistake($sell_id){
  $this->load->model('queries');
  $data = $this->queries->get_mistake($sell_id);
  // print_r($mis);
  //       exit();
       if ($data->status = 1) {
        // print_r($data);
        //    exit();
           $this->queries->update_status($data,$sell_id);
           $this->session->set_flashdata('massage','Mistake sale');
       }else{
        $this->session->set_flashdata('error','Hujafanikiwa');
       }
       return redirect('cashire/today_salles');

 
}

    public function delete_mistake_sell($sell_id){
      $this->load->model('queries');
      $mistake = $this->queries->get_mistake_data($sell_id);
        //$balance = $mistake->balance;
        //$out_balance = $mistake->out_balance;
        $product_id = $mistake->product_id;
        $quantity = $mistake->quantity;
      // echo "<pre>";
      //    print_r($quantity);
      //    print_r($product_id);
      //    echo "</pre>";
      //          exit();
         $this->update_storemistake($product_id,$quantity);
      if ($this->queries->remove_mistake($sell_id));
         $this->session->set_flashdata('massage','Sales Mistake Removed successfully ');
         return redirect('cashire/today_salles'); 
      
    }


    //update product store
  public function update_storemistake($product_id,$quantity){
  $sqldata="UPDATE tbl_store SET `out_balance`= `out_balance`-$quantity,`balance`=`balance`+$quantity WHERE `product_id` = '$product_id'";
    // print_r($sqldata);
    //    exit();
  $query = $this->db->query($sqldata);
   return true;
}


   public function print_recept($text){
    $this->load->model('queries');
    $cartItems = $this->cart->contents();
    $shop = $this->queries->get_shop_infoData();
     //   echo "<pre>";
     // print_r( $text);
     // echo "</pre>";
     //     exit();
    $mpdf = new \Mpdf\Mpdf();
    $html = $this->load->view('cashire/recept',['shop'=>$shop,'cartItems'=>$cartItems,'text'=>$text],true);
    $mpdf->SetFooter('Generated By (0) 628-323-760 & (0) 753-871-034');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
         
    }


 

     public function print_receptJumla($text){
    $this->load->model('queries');
    $cartItems = $this->cart->contents();
    $shop = $this->queries->get_shop_infoData();
     //   echo "<pre>";
     // print_r( $item_recept);
     // echo "</pre>";
     //     exit();
    $mpdf = new \Mpdf\Mpdf();
    $html = $this->load->view('cashire/recept_jumla',['shop'=>$shop,'cartItems'=>$cartItems,'text'=>$text],true);
    $mpdf->SetFooter('Generated By (0) 628-323-760 & (0) 753-871-034');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
         
    }




		//session destroy
	    public function __construct(){
		parent::__construct();
        //$this->load->library('cart');
		if (!$this->session->userdata("user_id"))
		return redirect("home/index");
	}
}