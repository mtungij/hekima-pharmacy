<?php 
 class Queries extends CI_model{
 
   public function insert_admin($data){
    return $this->db->insert('tbl_user',$data);
   }

   public function get_users(){
    $users = $this->db->query("SELECT * FROM tbl_user");
      return $users->result();
   }

   public function delete_mishahala($id)
   {
      return $this->db->delete('tbl_mishahara',['id'=>$id]);
   }

   public function remove_user($user_id){
    return $this->db->delete('tbl_user',['user_id'=>$user_id]);
   }
   //product

   public function insert_product($product){
    $this->db->insert('product',$product);
     return $this->db->insert_id();
   }

   public function get_product(){
    $data_product = $this->db->query("SELECT * FROM product  JOIN tbl_store ON tbl_store.product_id = product.id  ORDER BY id DESC LIMIT 5");
       return $data_product->result();
   }

    public function get_productAll(){
    $data_product = $this->db->query("SELECT * FROM product JOIN tbl_store ON tbl_store.product_id = product.id");
       return $data_product->result();
   }

     public function get_productAllStore(){
    $data_product = $this->db->query("SELECT * FROM product  JOIN tbl_store ON tbl_store.product_id = product.id ");
       return $data_product->result();
   }

 public function getRows($id = ''){
        $this->db->select('*');
        $this->db->from('product');
        //$this->db->join('tbl_company C','C.company_id = P.company_id');
        //$this->db->where('stat', 'open');
        if($id){
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('name', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();

        }
        
        // Return fetched data
        return !empty($result)?$result:false;
    }

    public function get_sallesToday($user_id){
      $date = date("Y-m-d");
      $sales = $this->db->query("SELECT u.user_id,u.full_name,u.phone_number,u.img,u.role,s.sell_id,s.user_id,s.product_id,s.quantity as quanty,s.new_sell_price,s.total_sell_price,s.profit,s.sell_day,s.created_at,s.status,p.id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.ju_price,s.customer FROM tbl_sell s JOIN tbl_user u ON u.user_id = s.user_id JOIN  product p ON p.id = s.product_id WHERE s.user_id = '$user_id' AND s.created_at >= '$date'");
      return $sales->result();
    }

      public function get_sallesToday_Cashire(){
      $date = date("Y-m-d");
      $sales = $this->db->query("SELECT u.user_id,u.full_name,u.phone_number,u.img,u.role,s.sell_id,s.user_id,s.product_id,s.quantity as quanty,s.new_sell_price,s.total_sell_price,s.profit,s.sell_day,s.created_at,s.status,p.id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.ju_price,s.customer FROM tbl_sell s JOIN tbl_user u ON u.user_id = s.user_id JOIN  product p ON p.id = s.product_id WHERE  s.created_at >= '$date'");
      return $sales->result();
    }


     public function get_sallesTodayData(){
      $date = date("Y-m-d");
      $sales = $this->db->query("SELECT u.user_id,u.full_name,u.phone_number,u.img,u.role,s.sell_id,s.user_id,s.product_id,s.quantity as quanty,s.new_sell_price,s.total_sell_price,s.profit,s.sell_day,s.created_at,s.status,p.id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.ju_price,s.customer FROM tbl_sell s JOIN tbl_user u ON u.user_id = s.user_id JOIN  product p ON p.id = s.product_id WHERE  s.sell_day >= DATE_SUB(CURDATE(),INTERVAL 6 DAY) AND s.sell_day <= CURDATE() ORDER BY s.sell_day desc" );
      return $sales->result();
    }

    public function get_sallesTodayData_seller(){
      $date = date("Y-m-d");
      $sales = $this->db->query("SELECT u.user_id,u.full_name,u.phone_number,u.img,u.role,s.sell_id,s.user_id,s.product_id,s.quantity as quanty,s.new_sell_price,s.total_sell_price,s.profit,s.sell_day,s.created_at,s.status,p.id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.ju_price,s.customer,SUM(s.total_sell_price) AS total_mauzo FROM tbl_sell s JOIN tbl_user u ON u.user_id = s.user_id JOIN  product p ON p.id = s.product_id WHERE  s.sell_day = '$date' GROUP BY s.user_id");
      return $sales->result();
    }


      public function get_sallesTodayDataRetail(){
      $date = date("Y-m-d");
      $sales = $this->db->query("SELECT u.user_id,u.full_name,u.phone_number,u.img,u.role,s.sell_id,s.user_id,s.product_id,s.quantity as quanty,s.new_sell_price,s.total_sell_price,s.profit,s.sell_day,s.created_at,s.sell_status,p.id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.ju_price,s.customer FROM tbl_sell s JOIN tbl_user u ON u.user_id = s.user_id JOIN  product p ON p.id = s.product_id WHERE s.sell_status = 'retail' AND s.created_at >= '$date'");
      return $sales->result();
    }


    public function get_today_sales($user_id){
      $date = date("Y-m-d");
       $data = $this->db->query("SELECT SUM(total_sell_price) AS TotalItemsOrdered FROM tbl_sell WHERE  user_id = '$user_id' AND created_at >= '$date'");
       return $data->row();
     }


     public function get_today_sales_cashire(){
      $date = date("Y-m-d");
       $data = $this->db->query("SELECT SUM(total_sell_price) AS TotalItemsOrdered FROM tbl_sell WHERE  created_at >= '$date'");
       return $data->row();
     }

       public function get_today_salesData(){
      $date = date("Y-m-d");
       $data = $this->db->query("SELECT SUM(total_sell_price) AS TotalItemsOrdered FROM tbl_sell WHERE  created_at >= '$date'");
       return $data->row();
     }

     public function get_today_profit(){
      $date = date("Y-m-d");
       $data = $this->db->query("SELECT SUM(profit) AS Totalprofit FROM tbl_sell WHERE  created_at >= '$date'");
       return $data->row();
     }

     public function get_all_inventory(){
     $data = $this->db->query("SELECT * FROM product JOIN tbl_store ON tbl_store.product_id = product.id");
      return $data->result();
     }

     public function get_all_SUMbalanceinventory(){
     $data = $this->db->query("SELECT SUM(balance) AS bala FROM product JOIN tbl_store ON tbl_store.product_id = product.id");
      return $data->row();
     }

     public function get_all_SUMbuypriceinventory(){
     $data = $this->db->query("SELECT SUM(buy_price) AS buy_prc FROM product JOIN tbl_store ON tbl_store.product_id = product.id");
      return $data->row();
     }

     public function get_all_Totalbuyprice(){
     $data = $this->db->query("SELECT SUM(total_buy) AS total_buyPrice FROM product JOIN tbl_store ON tbl_store.product_id = product.id");
      return $data->row();
     }

     public function get_all_selling_price(){
     $data = $this->db->query("SELECT SUM(price) AS sell_price FROM product JOIN tbl_store ON tbl_store.product_id = product.id");
      return $data->row();
     }

      public function get_all_Totalselling_price(){
     $data = $this->db->query("SELECT SUM(total_sell) AS Total_sell_price FROM product JOIN tbl_store ON tbl_store.product_id = product.id");
      return $data->row();
     }

     public function insert_stockLimit($data){
      return $this->db->insert('tbl_stock_limit',$data);
     }

     public function get_stock_limit(){
      $data = $this->db->query("SELECT * FROM tbl_stock_limit");
       return $data->result();
     }
      public function get_stock_limitData(){
      $data = $this->db->query("SELECT * FROM tbl_stock_limit");
       return $data->row();
     }

     public function get_edit_stock($id){
      $stock = $this->db->query("SELECT * FROM tbl_stock_limit WHERE id = '$id'");
      return $stock->row();
     }

     public function update_stockLimit($data,$id){
      return $this->db->where('id',$id)->update('tbl_stock_limit',$data);
     }

     public function insert_useToday($data){
      return $this->db->insert('cash_flow',$data);
     }

     public function  get_use_today($user_id){
      $date = date("Y-m-d");
      $use = $this->db->query("SELECT * FROM cash_flow c  WHERE c.user_id = '$user_id' AND created >= '$date'");
     return $use->result();
     }

      public function  get_use_today_cashire(){
      $date = date("Y-m-d");
      $use = $this->db->query("SELECT * FROM cash_flow c  WHERE created >= '$date'");
     return $use->result();
     }

     public function get_totalMatumizi($user_id){
      $date = date('Y-m-d');
      $matumiz = $this->db->query("SELECT SUM(price) as matumiz FROM cash_flow WHERE user_id = '$user_id' AND created >= '$date'");
       return $matumiz->row();
     }

       public function get_totalMatumizi_cashire(){
      $date = date('Y-m-d');
      $matumiz = $this->db->query("SELECT SUM(price) as matumiz FROM cash_flow WHERE created >= '$date'");
       return $matumiz->row();
     }

     public function get_all_cashflow(){
      $day_data = date('Y-m-d');
      $data = $this->db->query("SELECT * FROM cash_flow JOIN tbl_user ON tbl_user.user_id = cash_flow.user_id WHERE created >= '$day_data'");
        return $data->result();
     }
    

     public function get_totalEpences(){
      $date = date('Y-m-d');
      $matumiz_data = $this->db->query("SELECT SUM(price) as matumiz FROM cash_flow WHERE created >= '$date'");
       return $matumiz_data->row();
     }


     public function get_all_cashflowData(){
      $data = $this->db->query("SELECT * FROM cash_flow ");
        return $data->result();
     }

     public function All_totalMatumizi(){
      //$date = date('Y-m-d');
      $matumiz = $this->db->query("SELECT SUM(price) as matumiz FROM cash_flow");
       return $matumiz->row();
     }

  public function get_All_salesData(){
       $data = $this->db->query("SELECT SUM(total_sell_price) AS TotalItemsOrdered FROM tbl_sell");
       return $data->row();
     }

     public function get_usersEdit($user_id){
      $data = $this->db->query("SELECT * FROM tbl_user WHERE user_id = '$user_id'");
       return $data->row();
     }

     public function update_admin($data,$user_id){
      return $this->db->where('user_id',$user_id)->update('tbl_user',$data);
     }

     public function get_edit_peoduct($id){
      $product = $this->db->query("SELECT * FROM product JOIN tbl_store ON tbl_store.product_id = product.id WHERE id = '$id'");
       return $product->row();
     }

     public function  update_product($data,$id){
      return $this->db->where('id',$id)->update('product',$data);
     }

     public function remove_product($id){
      return $this->db->delete('product',['id'=>$id]);
     }

     public function get_store_product($store_id){
      $product = $this->db->query("SELECT * FROM  tbl_store JOIN product ON product.id = tbl_store.product_id WHERE store_id = $store_id");
       return $product->row();
     }


     //new search product out
     public function search_mauzo($from,$to){
      $mauzo = $this->db->query("SELECT  s.sell_id,s.user_id,s.product_id,s.quantity as qnty, s.new_sell_price,s.total_sell_price,s.profit,s.sell_status,s.sell_day,s.created_at as creat ,u.full_name,u.phone_number,u.img,u.role,u.status,u.password,u.created_at,p.id,p.user_id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.stat,p.created_at,p.modified,p.ju_price,s.customer FROM tbl_sell s JOIN product p ON p.id = s.product_id JOIN tbl_user u ON u.user_id = s.user_id WHERE s.sell_day between '$from' and '$to'");
      return $mauzo->result();
     }

        public function search_mauzo_seller($from,$to){
      $mauzo = $this->db->query("SELECT  s.sell_id,s.user_id,s.product_id,s.quantity as qnty, s.new_sell_price,s.total_sell_price,s.profit,s.sell_status,s.sell_day,s.created_at as creat ,u.full_name,u.phone_number,u.img,u.role,u.status,u.password,u.created_at,p.id,p.user_id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.stat,p.created_at,p.modified,p.ju_price,s.customer,SUM(s.total_sell_price) AS total_mauzo FROM tbl_sell s JOIN product p ON p.id = s.product_id JOIN tbl_user u ON u.user_id = s.user_id WHERE s.sell_day between '$from' and '$to' GROUP BY s.user_id");
      return $mauzo->result();
     }

     public function search_mauzo_seller_data($user_id,$from,$to){
      $mauzo = $this->db->query("SELECT  s.sell_id,s.user_id,s.product_id,s.quantity as qnty, s.new_sell_price,s.total_sell_price,s.profit,s.sell_status,s.sell_day,s.created_at as creat ,u.full_name,u.phone_number,u.img,u.role,u.status,u.password,u.created_at,p.id,p.user_id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.stat,p.created_at,p.modified,p.ju_price,s.customer FROM tbl_sell s JOIN product p ON p.id = s.product_id JOIN tbl_user u ON u.user_id = s.user_id WHERE s.sell_day between '$from' and '$to' AND s.user_id = '$user_id'");
      return $mauzo->result();
     }

     public function search_profit_seller($user_id,$from,$to){
      $mauzo = $this->db->query("SELECT SUM(profit) AS total_profit,SUM(total_sell_price) AS total_mauzo  FROM tbl_sell WHERE sell_day  between  '$from' and '$to' AND user_id = '$user_id'");
      return $mauzo->row();
     }

    public function get_all_sellers(){
      $data = $this->db->query("SELECT * FROM tbl_user");
      return $data->result();
    }

      public function search_mauzoPita($from,$to){
      $mauzo = $this->db->query("SELECT SUM(total_sell_price) AS total_sell  FROM tbl_sell WHERE sell_day  between  '$from' and '$to'");
      return $mauzo->row();
     }

     public function search_profit($from,$to){
      $mauzo = $this->db->query("SELECT SUM(profit) AS total_profit  FROM tbl_sell WHERE sell_day  between  '$from' and '$to'");
      return $mauzo->row();
     }

     public function get_sellinprice(){
      $selling = $this->db->query("SELECT * FROM product");
        return $selling->result();
     }

     public function get_emptyProduct(){
      $empty = $this->db->query("SELECT * FROM tbl_store JOIN product ON product.id = tbl_store.product_id WHERE balance = 0");
        return $empty->result();
     }

      
      public function get_all_seller(){
        $data = $this->db->query("SELECT * FROM tbl_user");
         return $data->result();
      }

      public function pay_view($user_id){
        $pay = $this->db->query("SELECT * FROM tbl_mishahara WHERE user_id = '$user_id'");
          return $pay->result();
      }

       public function pay_get($user_id){
        $pay = $this->db->query("SELECT * FROM tbl_user WHERE user_id = '$user_id'");
          return $pay->row();
      }

      public function insert_payrol($data){
        return $this->db->insert('tbl_mishahara',$data);
      }

      public function get_editPay($id){
        $pay = $this->db->query("SELECT * FROM tbl_mishahara WHERE id = '$id'");
         return $pay->row();
      }

      public function update_payrol($data,$id){
        return $this->db->where('id',$id)->update('tbl_mishahara',$data);
      }

      public function get_sumPayrol(){
        $payrol = $this->db->query("SELECT SUM(pay_amount) AS mishahara FROM tbl_mishahara");
          return $payrol->row();
      }

      public function get_PayrolData(){
        $data = $this->db->query("SELECT * FROM tbl_mishahara JOIN tbl_user ON tbl_user.user_id = tbl_mishahara.user_id");
           return $data->result();
      }

      public function get_mydata($user_id){
        $mydata = $this->db->query("SELECT * FROM tbl_user WHERE user_id = '$user_id'");
         return $mydata->row();
      }

      public function update_mydata($data,$user_id){
        return $this->db->where('user_id',$user_id)->update('tbl_user',$data);
      }

      public function get_shop_info($id){
        $info = $this->db->query("SELECT * FROM  tbl_information WHERE id = $id");
        return $info->row();
      }
      public function get_shop_infoData(){
        $info = $this->db->query("SELECT * FROM  tbl_information");
        return $info->row();
      }

      public function update_shop_info($id,$data){
        return $this->db->where('id',$id)->update('tbl_information',$data);
      }



  public function update_password_data($user_id, $userdata)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_user', $userdata);
    }


     public function get_user_data($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tbl_user');
        return $query->row();
    }

    public function get_editCashflow($id){
      $data = $this->db->query("SELECT * FROM cash_flow WHERE id = '$id'");
       return $data->row();
    }

    public function update_cashflow($id,$data){
      return $this->db->WHERE('id',$id)->update('cash_flow',$data);
    }

    public function get_bidhaa_kwisha(){
      $data = $this->db->query("SELECT * FROM tbl_store JOIN product ON product.id = tbl_store.product_id WHERE balance = 0");
       return $data->result();
    }

    public function get_sum_jumlaPrice(){
      $jumla = $this->db->query("SELECT SUM(ju_price) AS jumlaPrice FROM product JOIN tbl_store ON tbl_store.product_id = product.id");
       return $jumla->row();
    }

    public function get_total_beiju(){
      $jum = $this->db->query("SELECT SUM(total_ju) AS totalju FROM tbl_store JOIN product ON product.id = tbl_store.product_id");
      return $jum->row();
    }


     public function get_sallesTodayRetail($user_id){
      $date = date("Y-m-d");
      $sales = $this->db->query("SELECT u.user_id,u.full_name,u.phone_number,u.img,u.role,s.sell_id,s.user_id,s.product_id,s.quantity as quanty,s.new_sell_price,s.total_sell_price,s.profit,s.sell_day,s.created_at,s.sell_status,p.id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.ju_price,s.customer FROM tbl_sell s JOIN tbl_user u ON u.user_id = s.user_id JOIN  product p ON p.id = s.product_id WHERE s.user_id = '$user_id' AND s.sell_status = 'retail' AND s.created_at >= '$date'");
      return $sales->result();
    }

     public function get_sallesTodayRetail_cashire(){
      $date = date("Y-m-d");
      $sales = $this->db->query("SELECT u.user_id,u.full_name,u.phone_number,u.img,u.role,s.sell_id,s.user_id,s.product_id,s.quantity as quanty,s.new_sell_price,s.total_sell_price,s.profit,s.sell_day,s.created_at,s.sell_status,p.id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.ju_price,s.customer FROM tbl_sell s JOIN tbl_user u ON u.user_id = s.user_id JOIN  product p ON p.id = s.product_id WHERE  s.sell_status = 'retail' AND s.created_at >= '$date'");
      return $sales->result();
    }


     public function get_sallesTodayWholesale($user_id){
      $date = date("Y-m-d");
      $sales = $this->db->query("SELECT u.user_id,u.full_name,u.phone_number,u.img,u.role,s.sell_id,s.user_id,s.product_id,s.quantity as quanty,s.new_sell_price,s.total_sell_price,s.profit,s.sell_day,s.created_at,s.sell_status,p.id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.ju_price,s.customer FROM tbl_sell s JOIN tbl_user u ON u.user_id = s.user_id JOIN  product p ON p.id = s.product_id WHERE s.user_id = '$user_id' AND s.sell_status = 'whole' AND s.created_at >= '$date'");
      return $sales->result();
    }

      public function get_sallesTodayWholesale_cashire(){
      $date = date("Y-m-d");
      $sales = $this->db->query("SELECT u.user_id,u.full_name,u.phone_number,u.img,u.role,s.sell_id,s.user_id,s.product_id,s.quantity as quanty,s.new_sell_price,s.total_sell_price,s.profit,s.sell_day,s.created_at,s.sell_status,p.id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.ju_price,s.customer FROM tbl_sell s JOIN tbl_user u ON u.user_id = s.user_id JOIN  product p ON p.id = s.product_id WHERE  s.sell_status = 'whole' AND s.created_at >= '$date'");
      return $sales->result();
    }


    public function get_today_salesreatil($user_id){
      $date = date("Y-m-d");
       $data = $this->db->query("SELECT SUM(total_sell_price) AS Totalretail FROM tbl_sell WHERE  user_id = '$user_id' AND sell_status = 'retail' AND created_at >= '$date'");
       return $data->row();
     }

      public function get_today_salesreatil_cashire(){
      $date = date("Y-m-d");
       $data = $this->db->query("SELECT SUM(total_sell_price) AS Totalretail FROM tbl_sell WHERE sell_status = 'retail' AND created_at >= '$date'");
       return $data->row();
     }

      public function get_today_salesWhole($user_id){
      $date = date("Y-m-d");
       $data = $this->db->query("SELECT SUM(total_sell_price) AS Totalwhole FROM tbl_sell WHERE  user_id = '$user_id' AND sell_status = 'whole' AND created_at >= '$date'");
       return $data->row();
     }

      public function get_today_salesWhole_cashire(){
      $date = date("Y-m-d");
       $data = $this->db->query("SELECT SUM(total_sell_price) AS Totalwhole FROM tbl_sell WHERE sell_status = 'whole' AND created_at >= '$date'");
       return $data->row();
     }


       public function get_today_salesretail(){
      $date = date("Y-m-d");
       $data = $this->db->query("SELECT SUM(total_sell_price) AS Totalretail FROM tbl_sell WHERE sell_status = 'retail' AND created_at >= '$date'");
       return $data->row();
     }


     public function get_today_profitretail(){
      $date = date("Y-m-d");
       $data = $this->db->query("SELECT SUM(profit) AS Totalprofitretail FROM tbl_sell WHERE sell_status = 'retail' AND created_at >= '$date'");
       return $data->row();
     }


       public function get_sallesTodayWholesaleData(){
      $date = date("Y-m-d");
      $sales = $this->db->query("SELECT u.user_id,u.full_name,u.phone_number,u.img,u.role,s.sell_id,s.user_id,s.product_id,s.quantity as quanty,s.new_sell_price,s.total_sell_price,s.profit,s.sell_day,s.created_at,s.sell_status,p.id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.ju_price FROM tbl_sell s JOIN tbl_user u ON u.user_id = s.user_id JOIN  product p ON p.id = s.product_id WHERE  s.sell_status = 'whole' AND s.created_at >= '$date'");
      return $sales->result();
    }


      public function get_today_salesWholeData(){
      $date = date("Y-m-d");
       $data = $this->db->query("SELECT SUM(total_sell_price) AS Totalwhole FROM tbl_sell WHERE sell_status = 'whole' AND created_at >= '$date'");
       return $data->row();
     }


      public function get_today_profitwhole(){
      $date = date("Y-m-d");
       $data = $this->db->query("SELECT SUM(profit) AS whole_profit FROM tbl_sell WHERE sell_status = 'whole' AND created_at >= '$date'");
       return $data->row();
     }


     public function search_mauzoWhole_retail($from,$to,$sell_status){
      $mauzo = $this->db->query("SELECT  s.sell_id,s.user_id,s.product_id,s.quantity as qnty, s.new_sell_price,s.total_sell_price,s.profit,s.sell_status,s.created_at as creat ,u.full_name,u.phone_number,u.img,u.role,u.status,u.password,u.created_at,p.id,p.user_id,p.name,p.price,p.quantity,p.buy_price,p.unit,p.stat,p.created_at,p.modified,p.ju_price,s.customer FROM tbl_sell s JOIN product p ON p.id = s.product_id JOIN tbl_user u ON u.user_id = s.user_id WHERE s.sell_day between  '$from' and '$to' AND s.sell_status = '$sell_status'");
      return $mauzo->result();
     }

       public function search_mauzoPitaData($from,$to,$sell_status){
      $mauzo = $this->db->query("SELECT SUM(total_sell_price) AS total_sell_data  FROM tbl_sell WHERE sell_day  between  '$from' and '$to' AND sell_status = '$sell_status'");
      return $mauzo->row();
     }

      public function search_profitData($from,$to,$sell_status){
      $mauzo = $this->db->query("SELECT SUM(profit) AS total_profitData  FROM tbl_sell WHERE sell_day  between  '$from' and '$to' AND sell_status = '$sell_status'");
      return $mauzo->row();
     }


     public function get_buy_price(){
      $buy = $this->db->query("SELECT * FROM product");
        return $buy->result();
      
     }

     public function remove_mistake($sell_id){
      return $this->db->delete('tbl_sell',['sell_id'=>$sell_id]);
     }

     public function get_mistake_data($sell_id){
      $data = $this->db->query("SELECT s.sell_id,s.user_id,s.customer,s.product_id,s.quantity,st.store_id,st.product_id,st.balance,st.out_balance,p.id,p.name FROM tbl_sell s JOIN tbl_store st ON st.product_id = s.product_id  JOIN product p ON p.id = s.product_id WHERE s.sell_id = '$sell_id'");
       return $data->row();

     }

     public function get_mistake($sell_id){
      $data = $this->db->query("SELECT * FROM tbl_sell WHERE sell_id = '$sell_id'");
        return $data->row();
     }

     public function update_status($data,$sell_id){
      return $this->db->where('sell_id',$sell_id)->update('tbl_sell',$data);
     }


      public function insert_excell_product($data){
       $this->db->insert('product',$data);
       return $this->db->insert_id();
    }

    public function insert_service($data){
      return $this->db->insert('tbl_huduma',$data);
    }

    public function get_service(){
      $data = $this->db->query("SELECT * FROM tbl_huduma");
       return $data->result();
    }

    public function get_edit_service($huduma_id){
      $huduma = $this->db->query("SELECT * FROM tbl_huduma WHERE huduma_id = '$huduma_id'");
      return $huduma->row();
    }


    public function update_service($data,$huduma_id){
      return $this->db->where('huduma_id',$huduma_id)->update('tbl_huduma',$data);
    }

    public function remove_service($huduma_id){
      return $this->db->delete('tbl_huduma',['huduma_id'=>$huduma_id]);
    }


    public function insert_customer($data){
      return $this->db->insert('tbl_customer',$data);
    }

    public function get_customer(){
      $data = $this->db->query("SELECT * FROM tbl_customer");
        return $data->result();
    }

    public function get_editCustomer($customer_id){
      $data = $this->db->query("SELECT * FROM tbl_customer");
       return $data->row();
    }

    public function update_customer($data,$customer_id){
      return $this->db->where('customer_id',$customer_id)->update('tbl_customer',$data);
    }

    public function remove_customer($customer_id){
      return $this->db->delete('tbl_customer',['customer_id'=>$customer_id]);
    }

    public function insert_service_recod($data){
      return $this->db->insert('tbl_');
    }

    public function get_today_service(){
      $today = date("Y-m-d");
      $data = $this->db->query("SELECT * FROM tbl_receve_huduma rh JOIN tbl_huduma h ON h.huduma_id = rh.huduma_id JOIN tbl_customer c ON c.customer_id = rh.customer_id JOIN tbl_user u ON u.user_id = rh.user_id WHERE rh.date = '$today'");
       return $data->result();
    }

    public function get_total_service_today(){
      $today = date("Y-m-d");
      $data = $this->db->query("SELECT SUM(price) AS total_price FROM tbl_receve_huduma WHERE date = '$today'");
       return $data->row();
    }

     public function get_total_service_todayData(){
      $today = date("Y-m-d");
      $data = $this->db->query("SELECT SUM(price) AS total_price FROM tbl_receve_huduma");
       return $data->row();
    }

    public function get_edit_receve($receive_id){
     $data = $this->db->query("SELECT * FROM tbl_receve_huduma rh JOIN tbl_huduma h ON h.huduma_id = rh.huduma_id JOIN tbl_customer c ON c.customer_id = rh.customer_id JOIN tbl_user u ON u.user_id = rh.user_id WHERE rh.receive_id = '$receive_id'");
       return $data->row();
    }

    public function remove_recod($receive_id){
      return $this->db->delete('tbl_receve_huduma',['receive_id'=>$receive_id]);
    }

    

      public function get_prev_recod($from,$to){
      $mauzo = $this->db->query("SELECT h.huduma_name,h.huduma_price,rh.price,c.customer_name,u.full_name,rh.date  FROM tbl_receve_huduma  rh JOIN tbl_customer c ON c.customer_id = rh.customer_id JOIN tbl_user u ON u.user_id = rh.user_id JOIN tbl_huduma h ON h.huduma_id = rh.huduma_id WHERE rh.date  between  '$from' and '$to'");
      return $mauzo->result();
     }

     public function get_sum_prev_recod($from,$to){
      $mauzo = $this->db->query("SELECT sum(rh.price) AS total_price  FROM tbl_receve_huduma  rh  WHERE rh.date  between  '$from' and '$to'");
      return $mauzo->row();
     }

     public function get_store_product_available(){
      $data = $this->db->query("SELECT * FROM tbl_store s JOIN product p ON p.id = s.product_id");
      return $data->result();
     }

     public function get_total_price_store(){
      $data = $this->db->query("SELECT SUM(total_buy_Price) AS total_buy FROM tbl_main_store");
        return $data->row();
     }

     public function get_sell_price_store(){
      $data = $this->db->query("SELECT SUM(total_sell_price) AS total_sell FROM tbl_main_store");
        return $data->row();
     }

     public function get_product_pharmacy(){
      $data = $this->db->query("SELECT * FROM tbl_store s JOIN product p ON p.id = s.product_id");
      return $data->result();
     }


  public function fetch_eneos($product_id)
 {
  $this->db->where('product_id', $product_id);
  //$this->db->order_by('store_id', 'ASC');
  $query = $this->db->query("SELECT * FROM tbl_store JOIN product ON product.id = tbl_store.product_id WHERE product_id = '$product_id'");
  // $output = '<option value="">Pharmacy Product</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->product_id.'">'.$row->name. '('.$row->balance.')'.'</option>';
  }
  return $output;
 }

 public function get_product_safe($product_id){
  $data = $this->db->query("SELECT * FROM product WHERE id = '$product_id'");
   return $data->row();
 }

 public function get_product_inSTore($product_id){
  $data = $this->db->query("SELECT * FROM tbl_store WHERE product_id = '$product_id'");
   return $data->row();
 }

 public function get_mainTransforbalance($product_id){
  $data = $this->db->query("SELECT * FROM tbl_store WHERE product_id = '$product_id'");
  return $data->row();
 }

 public function get_transfor_recod(){
  $date = date("Y-m-d");
  $data = $this->db->query("SELECT u.full_name,p.name,t.quantity AS trans_qnty,t.date AS trans_date FROM tbl_trans_recod t JOIN product p ON p.id = t.product_id JOIN tbl_user u ON u.user_id = t.user_id WHERE t.date = '$date'");
   return $data->result();
 }

 public function get_previous_reportData($from,$to){
  $data = $this->db->query("SELECT u.full_name,p.name,t.quantity AS trans_qnty,t.date AS trans_date FROM tbl_trans_recod t JOIN product p ON p.id = t.product_id JOIN tbl_user u ON u.user_id = t.user_id  WHERE t.date between '$from' and '$to'");
  return $data->result();
 }


 public function view_stock_movement($product_id){
  $data = $this->db->query("SELECT u.full_name,m.mov_status,m.product_qnty,p.name,m.date AS mov_date FROM  tbl_stock_movement m JOIN product p ON p.id = m.product_id JOIN tbl_user u ON u.user_id = m.user_id WHERE m.product_id = '$product_id'");
   return $data->result();
 }

 public function get_sum_buyPrice(){
  $data = $this->db->query("SELECT SUM(total_buy) AS total_buy FROM tbl_store");
  return $data->row();
 }

 public function get_total_retail_salePrice(){
  $data = $this->db->query("SELECT SUM(total_sell) AS total_retail FROM tbl_store");
  return $data->row();
 }

 public function get_suwhole_sale(){
  $data = $this->db->query("SELECT SUM(total_ju) AS totalwhole FROM tbl_store");
  return $data->row();
 }

 public function get_today_cashire_request(){
  $date = date("Y-m-d");
  $data = $this->db->query("SELECT * FROM  tbl_cashire WHERE date = '$date' ORDER BY cash_id DESC");
   return $data->result();
 }

 public function get_total_req(){
  $date = date("Y-m-d");
  $data = $this->db->query("SELECT SUM(total_price) AS total FROM tbl_cashire WHERE date = '$date'");
    return $data->row();
 }

 public function get_total_huduma(){
  $data = $this->db->query("SELECT SUM(price) AS total_huduma FROM tbl_receve_huduma");
   return $data->row();
 }


 public function get_expired_product(){
  $date = date("Y-m-d");
  $data = $this->db->query("SELECT * FROM product WHERE exp_date <= '$date'");
    return $data->result();
 }

  public function check_productName($name){
    $data = $this->db->where(['name'=>$name])
              ->get('product');
        if ($data->num_rows() > 0) {
          return $data->row();
          
        }
  }


  public function get_total_sumRetail(){
    $data = $this->db->query("SELECT SUM(total_sellju_price) AS total_wholesale FROM tbl_main_store");
    return $data->row();
  }

  public function get_sumRetail(){
    $data = $this->db->query("SELECT SUM(ju_price) AS wholesale FROM product");
    return $data->row();
  }

  public function get_monthly_report($from,$to){
  $data = $this->db->query("SELECT p.name,p.unit,s.quantity as qnty,s.new_sell_price,s.total_sell_price,u.full_name,s.sell_status,s.created_at as sell_date,s.profit  FROM tbl_sell s JOIN tbl_user u  ON u.user_id = s.user_id JOIN product p ON p.id = s.product_id WHERE s.sell_day between '$from' and '$to'");
  return $data->result();
  }

  public function get_allSales($from,$to){
    $data = $this->db->query("SELECT SUM(total_sell_price) AS total_sell FROM tbl_sell WHERE sell_day between '$from' and '$to'");
    return $data->row();
  }

  public function get_allSalesRetail($from,$to){
    $data = $this->db->query("SELECT SUM(total_sell_price) AS total_sellRetail FROM tbl_sell WHERE sell_day between '$from' and '$to' AND sell_status = 'retail'");
    return $data->row();
  }

   public function get_allSalesWhole($from,$to){
    $data = $this->db->query("SELECT SUM(total_sell_price) AS total_sellwhole FROM tbl_sell WHERE sell_day between '$from' and '$to' AND sell_status = 'whole'");
    return $data->row();
  }

  //PROFIT

  public function get_alLprofit($from,$to){
    $data = $this->db->query("SELECT SUM(profit) AS total_profit FROM tbl_sell WHERE sell_day between '$from' and '$to'");
    return $data->row();
  }

  public function get_alLprofitRetail($from,$to){
    $data = $this->db->query("SELECT SUM(profit) AS total_profitRetail FROM tbl_sell WHERE sell_day between '$from' and '$to' AND sell_status = 'retail'");
    return $data->row();
  }

  public function get_alLWHOLEPROFIT($from,$to){
    $data = $this->db->query("SELECT SUM(profit) AS total_profitwhole FROM tbl_sell WHERE sell_day between '$from' and '$to' AND sell_status = 'whole'");
    return $data->row();
  }

   public function get_ExpensesTotal($from,$to){
    $data = $this->db->query("SELECT SUM(price) AS total_expenses FROM cash_flow WHERE day between '$from' and '$to'");
    return $data->row();
  }

  public function get_month_sell(){
    //$date = date("Y");
    $data = $this->db->query("SELECT YEAR(sell_day) as year FROM tbl_sell  GROUP BY YEAR(sell_day) ORDER BY sell_id DESC");
    return $data->result();
  }

   public function get_Yearly_month($year){
    //$date = date("Y");
    $data = $this->db->query("SELECT MONTH(sell_day) as month,sell_day,SUM(total_sell_price) AS total_sellPRICE,SUM(profit) AS total_profit FROM tbl_sell WHERE YEAR(sell_day) = '$year'   GROUP BY MONTH(sell_day)");
      foreach($data->result() as $r){
    $r->total_retail_sale = $this->get_total_retail_sale($r->month);
    $r->total_wholesale = $this->get_total_whole_sale($r->month);
    $r->total_retail_profit = $this->get_total_retail_profit($r->month);
    $r->total_whole_profit = $this->get_total_whole_profit($r->month);
    $r->total_expenses = $this->get_total_expences($r->month);
    $r->total_payrole = $this->get_total_payrol($r->month);
    $r->total_indirect_expenses = $this->get_total_idirect_expenses($r->month);
  }
    return $data->result();
  }


  public function get_total_retail_sale($month){
    $retail = $this->db->query("SELECT SUM(total_sell_price) AS total_retail_sale FROM tbl_sell  WHERE sell_status = 'retail' AND month(sell_day) = '$month' GROUP BY  MONTH(sell_day)");
    if ($retail->row()) {
      return $retail->row()->total_retail_sale; 
    }
    return 0; 
      }

      public function get_total_whole_sale($month){
    $whole = $this->db->query("SELECT SUM(total_sell_price) AS total_wholesale FROM tbl_sell  WHERE sell_status = 'whole' AND month(sell_day) = '$month' GROUP BY  MONTH(sell_day)");
    if ($whole->row()) {
      return $whole->row()->total_wholesale; 
    }
    return 0; 
      }


    public function get_total_retail_profit($month){
    $retail_profit = $this->db->query("SELECT SUM(profit) AS total_retail_profit FROM tbl_sell  WHERE sell_status = 'retail' AND month(sell_day) = '$month' GROUP BY  MONTH(sell_day)");
    if ($retail_profit->row()) {
      return $retail_profit->row()->total_retail_profit; 
    }
    return 0; 
      }

    public function get_total_whole_profit($month){
    $whole_profit = $this->db->query("SELECT SUM(profit) AS total_whole_profit FROM tbl_sell  WHERE sell_status = 'whole' AND month(sell_day) = '$month' GROUP BY  MONTH(sell_day)");
    if ($whole_profit->row()) {
      return $whole_profit->row()->total_whole_profit; 
    }
    return 0; 
      }

       public function get_total_expences($month){
    $expenses = $this->db->query("SELECT SUM(price) AS total_expenses FROM cash_flow  WHERE month(day) = '$month' GROUP BY  MONTH(day)");
    if ($expenses->row()) {
      return $expenses->row()->total_expenses; 
    }
    return 0; 
      }

      public function get_total_payrol($month){
    $payrole = $this->db->query("SELECT SUM(pay_amount) AS total_payrole FROM tbl_mishahara  WHERE month(date) = '$month' GROUP BY  MONTH(date)");
    if ($payrole->row()) {
      return $payrole->row()->total_payrole; 
    }
    return 0; 
      }

      public function get_total_idirect_expenses($month)
      {
        $indirect_exp = $this->db->query("SELECT SUM(pay_amount) AS total_indirect_expenses FROM tbl_payment WHERE month(pay_date) = '$month' GROUP BY  MONTH(pay_date)");
      if ($indirect_exp->row()) {
      return $indirect_exp->row()->total_indirect_expenses; 
      }
      return 0;
      }

      public function view_user($user_id){
  $data = $this->db->query("SELECT * FROM tbl_user WHERE user_id = '$user_id'");
  return $data->row();
 }


 
 public function get_privillage($user_id){
  $data = $this->db->query("SELECT * FROM tbl_privillage WHERE user_id = '$user_id'");
    return $data->result();
 }

 public function get_privillageData($id){
  $data = $this->db->query("SELECT * FROM tbl_privillage WHERE id = '$id'");
   return $data->row();
 }

 public function delete_privillage($id){
  return $this->db->delete(' tbl_privillage',['id'=>$id]);
 }

 public function get_userPrivillage($user_id){
  $data = $this->db->query("SELECT * FROM tbl_privillage WHERE user_id = '$user_id'");
   return $data->result();
 }



 public function insert_supplier($data){
  return $this->db->insert('tbl_supplier',$data);
 }


 public function get_supplier(){
  $data = $this->db->query("SELECT * FROM tbl_supplier");
  return $data->result();
 }


 public function remove_supplier($id){
  return $this->db->delete('tbl_supplier',['id'=>$id]);
 }

 public function get_edit_supplier($id){
  $data = $this->db->query("SELECT * FROM tbl_supplier WHERE id = '$id'");
  return $data->row();
 }

 public function modify_supplier($id,$data){
  return $this->db->where('id',$id)->update('tbl_supplier',$data);
 }


 public function get_all_product_purchase(){
  $data = $this->db->query("SELECT * FROM product");
  return $data->result();
 }

 public function get_order_history(){
  $data = $this->db->query("SELECT s.supplier_name,s.supplier_phone,pr.date,pr.order_id,pr.supplier_id FROM tbl_purchase_record pr JOIN tbl_supplier s ON s.id = pr.supplier_id GROUP BY pr.order_id");
  return $data->result();
 }



 public function get_order_supplier($order_id){
  $data = $this->db->query("SELECT p.name,p.bland,pr.pack_size,pr.quantity_pack,pr.buy_price_pack,pr.total_amount,pr.id AS req_id,pr.order_id FROM tbl_purchase_record pr JOIN product p ON p.id = pr.product_id WHERE pr.order_id = '$order_id'");
  return $data->result();
 }

 public function get_supplier_detail_order($order_id){
  $data = $this->db->query("SELECT s.supplier_name,s.supplier_phone,pr.order_id,pr.date,pr.supplier_id FROM tbl_purchase_record pr JOIN tbl_supplier s ON s.id = pr.supplier_id  WHERE pr.order_id = '$order_id'");
  return $data->row();
 }

 public function get_total_order($order_id){
  $data = $this->db->query("SELECT * FROM tbl_purches_order WHERE order_id = '$order_id'");
  return $data->row();
 }


public function insert_payment_record($data){
  return $this->db->insert('tbl_payment',$data);
}

public function get_paid_amount($order_id){
  $data = $this->db->query("SELECT * FROM tbl_purches_order WHERE order_id = '$order_id'");
  return $data->row();
}


public function get_cash_transaction($order_id){
  $data = $this->db->query("SELECT * FROM tbl_payment WHERE order_id = '$order_id'");
  return $data->result();
}

public function get_supplier_order_id($req_id){
  $data = $this->db->query("SELECT * FROM tbl_purchase_record WHERE id = '$req_id'");
  return $data->row();
}

public function remove_request_order($req_id){
  return $this->db->delete('tbl_purchase_record',['id'=>$req_id]);
}


public function get_purchase_order($pay_id){
  $data = $this->db->query("SELECT * FROM tbl_payment WHERE pay_id = '$pay_id'");
  return $data->row();
}


public function remove_purches_list($pay_id){
  return $this->db->delete('tbl_payment',['pay_id'=>$pay_id]);

}
public function get_total_indirect_expenses(){
  $data = $this->db->query("SELECT SUM(paid_amount) AS total_paid_expenses FROM tbl_purches_order");
  return $data->row();
}

public function get_total_profit()
{
  $data = $this->db->query("SELECT SUM(profit) AS total_profit FROM tbl_sell");
 return $data->row();
}

public function get_total_sells()
{
  $data = $this->db->query("SELECT SUM(total_sellprice) AS total_sell FROM tbl_sell");
  return $data->row();
}

public function get_today_indirectExpenses()
{
  $date = date("Y-m-d");
  $data = $this->db->query("SELECT SUM(pay_amount) AS total_paytoday FROM tbl_payment WHERE pay_date = '$date'");
  return $data->row();
}

public function get_total_profit_today()
{
  $day = date("Y-m-d");
  $data = $this->db->query("SELECT SUM(profit) AS total_profit FROM tbl_sell WHERE sell_day = '$day'");
 return $data->row();
}


public function get_first_order($order_id){
  $data = $this->db->query("SELECT * FROM  tbl_purchase_record WHERE order_id = '$order_id'");
  return $data->row();
}

public function insert_another_product_order($data){
  return $this->db->insert('tbl_purchase_record',$data);
}

public function insert_order_adition($data)
{
  return $this->db->insert('tbl_purchase_record',$data);
}


public function get_total_purchase_data($req_id){
  $data = $this->db->query("SELECT p.id as product_id,p.name,pr.id as req_id,pr.pack_size,pr.quantity_pack,pr.buy_price_pack FROM tbl_purchase_record pr  JOIN product p ON p.id = pr.product_id WHERE pr.id = '$req_id'");
  return $data->row();
}


public function get_all_sells()
{
  $data = $this->db->query("SELECT SUM(total_sell_price) AS total_sell,SUM(profit) AS total_profit FROM  tbl_sell");
  return $data->row();
}


public function get_all_order_request(){
  $data = $this->db->query("SELECT SUM(s.total_sell_price) AS total_sell,customer,u.full_name,r.order_id,r.date_receipt,r.order_status,s.sell_status FROM tbl_receipt r JOIN tbl_sell s ON s.order_id = r.order_id JOIN tbl_user u  ON u.user_id = s.user_id AND r.order_status = 'pending'GROUP BY s.order_id");
  return $data->result();
}


public function get_all_order_request_confirmed(){
  $today = date("Y-m-d");
  $data = $this->db->query("SELECT SUM(s.total_sell_price) AS total_sell,customer,u.full_name,r.order_id,r.date_receipt,r.order_status FROM tbl_receipt r JOIN tbl_sell s ON s.order_id = r.order_id JOIN tbl_user u  ON u.user_id = s.user_id AND r.order_status = 'aproved' AND date(date_receipt) = '$today'GROUP BY s.order_id");
  return $data->result();
}

public function get_all_order_request_confirmed_total(){
  $today = date("Y-m-d");
  $data = $this->db->query("SELECT SUM(s.total_sell_price) AS total_sell_recept,customer,u.full_name,r.order_id,r.date_receipt,r.order_status FROM tbl_receipt r JOIN tbl_sell s ON s.order_id = r.order_id JOIN tbl_user u  ON u.user_id = s.user_id AND r.order_status = 'aproved' AND date(date_receipt) = '$today'");
  return $data->row();
}


public function get_order_listitem($order_id){
  $data = $this->db->query("SELECT p.name,s.quantity,s.new_sell_price,s.total_sell_price,p.unit FROM tbl_sell s JOIN product p ON p.id = s.product_id WHERE s.order_id = '$order_id'");
  return $data->result();
}

public function get_order_listitem_total($order_id){
  $data = $this->db->query("SELECT p.name,s.quantity,s.new_sell_price,s.total_sell_price,p.unit,SUM(s.total_sell_price) AS total_bill FROM tbl_sell s JOIN product p ON p.id = s.product_id WHERE s.order_id = '$order_id'");
  return $data->row();
}

public function get_order_status($order_id){
   $data = $this->db->query("SELECT * FROM tbl_receipt WHERE order_id = '$order_id'");
   return $data->row();
}


public function confirm_order_data($order_id,$all_order){
  return $this->db->where('order_id',$order_id)->update('tbl_receipt',$all_order);
}


public function get_product_tranding(){
  $date = date("Y-m-d");
  $data = $this->db->query("SELECT SUM(s.quantity) AS total_qnty,p.name,p.price,p.ju_price,s.sell_day FROM tbl_sell s JOIN product p ON p.id = s.product_id WHERE s.sell_day = '$date'  GROUP BY s.product_id ORDER BY SUM(s.quantity) DESC");
  return $data->result();
}

public function get_product_tranding_data($from,$to){
  $date = date("Y-m-d");
  $data = $this->db->query("SELECT SUM(s.quantity) AS total_qnty,p.name,p.price,p.ju_price,s.sell_day FROM tbl_sell s JOIN product p ON p.id = s.product_id WHERE s.sell_day between '$from' and '$to' GROUP BY s.product_id ORDER BY SUM(s.quantity) DESC");
  return $data->result();
}




 

    
 //userlogin
  public function user_data($phone_number , $password){
    $data = $this->db->where(['phone_number'=>$phone_number , 'password'=>$password])
              ->get('tbl_user');
        if ($data->num_rows() > 0) {
          return $data->row();
          
        }
  }
  
  
 }