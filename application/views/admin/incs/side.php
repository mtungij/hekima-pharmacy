<?php if ($_SESSION['role'] == 'admin') {
 ?>
<div id="left-sidebar" class="sidebar">
<div class="sidebar-scroll">
     <div class="user-account">
        <?php if ($my->img == TRUE) {
         ?>
<img src="<?php echo base_url().'assets/admin/img/'.$my->img; ?>" class="rounded-circle user-photo" alt="Use" style="width: 60px; height:60px;">
     <?php }elseif ($my->img == FALSE) {
      ?>
      <img src="<?php echo base_url() ?>assets/admin/img/wateja.png" class="rounded-circle user-photo" alt="Use">
  <?php } ?>
                
                <div class="dropdown">
                    <span>Welcome,</span>
                  
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong><?php echo $_SESSION['full_name'] ?></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">

                        <li><a href="<?php echo base_url("admin/setting"); ?>"><i class="icon-settings"></i>Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url("home/logout") ?>"><i class="icon-power"></i>Log out</a></li>
                    </ul>
                </div>
              
            </div>
        
    <!-- Tab panes -->
    <div class="tab-content p-l-0 p-r-0">
        <div class="tab-pane active" id="menu">
            <nav class="sidebar-nav">
                <ul class="main-menu metismenu">
                    <li><a href="<?php echo base_url("admin/index") ?>"><i class="icon-home"></i><span>Dashboard</span></a>
                    </li>
                     <li><a href="<?php echo base_url("admin/admin_sell") ?>"><i class="icon-list"></i><span>Sell</span></a>
                    </li>
                 
                    <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-users"></i><span> Users </span> </a>
                        <ul>
                    <li><a href="<?php echo base_url("admin/users") ?>">Register</a>
                    </li>
                    <li><a href="<?php echo base_url("admin/payRol") ?>">Payrol</a>
                    </li>
                   <!--     <li><a href="<?php //echo base_url("admin/get_allUses") ?>">Ona watumiaji wa mfumo</a>
                    </li> -->
                        </ul>
                    </li>
                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-list"></i><span>Products</span> </a>
                <ul>
                <li><a href="<?php echo base_url("admin/product") ?>">Add products</a>
                </li>
                <!-- <li><a href="<?php //echo base_url("admin/import_execel") ?>">Import Excell</a> -->
                </li>
                 <li><a href="<?php echo base_url("admin/all_product") ?>">All products</a>
                </li>
                </ul>
                </li>

                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-list"></i><span>Store</span> </a>
                <ul>
                <!-- <li><a href="<?php //echo base_url("admin/stock_limit") ?>">Stock limit</a> -->
                </li>
                <!--  <li><a href="<?php //echo base_url("admin/produc_available_store") ?>">Store Product Available</a> -->
                </li>
              <!--    <li><a href="<?php //echo base_url("admin/dispency_product") ?>">Dispency</a> -->
                 <li><a href="<?php echo base_url("admin/all_productStore") ?>">Pharmacy Products Available</a>
                </li>
                </ul>
                </li>
                <!-- <li><a href="<?php echo base_url("admin/sales_today") ?>"><i class="icon-docs"></i><span>Today Sales</span></a>
                    </li> -->
                  <li><a href="<?php echo base_url("admin/view_product_movement") ?>"><i class="icon-list"></i><span>Frequency Movement</span></a>

                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-list"></i><span>Today Sales</span> </a>
                <ul>
                <li><a href="<?php echo base_url("admin/sales_today") ?>">General sales</a>
                </li>
                 <li><a href="<?php echo base_url("admin/retail_sales") ?>">RetailSales Report</a>
                </li>
                <li><a href="<?php echo base_url("admin/whole_sale") ?>">WholeSales Report</a>
                </li>

                  <li><a href="<?php echo base_url("admin/privious_data") ?>">Previous Retail & WholeSales Report</a>
                </li>
                 <li><a href="<?php echo base_url("admin/general_sells_product"); ?>">Seller Report</a>
                </li>
                </ul>
                </li>


                
                    </li>
                    <li><a href="<?php echo base_url("admin/inventory"); ?>"><i class="icon-docs"></i><span>Inventory</span></a>
                    </li>

                     <li><a href="<?php echo base_url("admin/get_all_cashFlow") ?>"><i class="icon-docs"></i><span>Cash Flow System</span></a>
                    </li>
            <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-list"></i><span>Report</span> </a>
                <ul>
                <li><a href="<?php echo base_url("admin/today_salesReport") ?>">Today's Sales</a>
                </li>
                 <li><a href="<?php echo base_url("admin/today_cashflowData") ?>">Today's Cashflow</a></li>
                <li><a href="<?php echo base_url("admin/general_cashflowData") ?>">General Cashflow</a></li>
                    <li><a href="<?php echo base_url("admin/all_productData") ?>">All Product</a></li>
                <li><a href="<?php echo base_url("admin/sales_productData") ?>">Selling Price</a></li>
                 <li><a href="<?php echo base_url("admin/buying_price") ?>">Buying Price</a></li>
               <li><a href="<?php echo base_url("admin/empty_productData") ?>">Empty product</a>
                </li>
                </ul>
                </li>


                 <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-list"></i><span>Daily purchase</span> </a>
                <ul>
                <li><a href="<?php echo base_url("admin/supplier") ?>">Register Supplier</a>
                </li>
                 <li><a href="<?php echo base_url("admin/place_order") ?>">Place Order</a>
                </li>
                 <li><a href="<?php echo base_url("admin/order_record") ?>">Order History</a>
                </li>
                </li>
                </ul>
                </li>
    <br><br><br><br><br>
                </ul>
            </nav>
        </div>
           
    </div>          
</div>
</div>
<?php }else{ ?>
<div id="left-sidebar" class="sidebar">
<div class="sidebar-scroll">
     <div class="user-account">
        <?php if ($my->img == TRUE) {
        ?>
 <img src="<?php echo base_url().'assets/admin/img/'.$my->img; ?>" class="rounded-circle user-photo" alt="Use" style="width: 70px; height: 70px;">
    <?php  }elseif ($my->img == FALSE) {
     ?>
       <img src="<?php echo base_url() ?>assets/admin/img/wateja.png" class="rounded-circle user-photo" alt="Use">
     <?php } ?>
              
                <div class="dropdown">
                    <span>Welcome,</span>
                  
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong><?php echo $_SESSION['full_name'] ?></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">

                        <li><a href="<?php echo base_url("seller/setting"); ?>"><i class="icon-settings"></i>Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url("home/logout") ?>"><i class="icon-power"></i>Log out</a></li>
                    </ul>
                </div>
              
            </div>
        
    <!-- Tab panes -->
    <div class="tab-content p-l-0 p-r-0">

        <div class="tab-pane active" id="menu">
            <nav class="sidebar-nav">
                <?php foreach ($privillage as $privillages): ?>
                <?php if ($privillages->privillage == 'seller') {
                 ?>
                <ul class="main-menu metismenu">
                    <li><a href="<?php echo base_url("seller/index") ?>"><i class="icon-home"></i><span>Sale</span></a>
                    </li>
               
                    <!--  <li>
                         <a href="<?php //echo base_url("seller/today_salles") ?>"><i class="icon-docs"></i><span>Today salles</span></a>
                    </li> -->
                     
            <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-docs"></i><span>Today sales</span> </a>
                <ul>
                <li><a href="<?php echo base_url("seller/today_salles") ?>">General sales Report</a>
                </li>
                 <li><a href="<?php echo base_url("seller/retail_sale") ?>">RetailSale Report</a>
                 <li><a href="<?php echo base_url("seller/whore_sale"); ?>">WholeSale Report</a>
                </li>
                </ul>
                </li>

            <li>
               <a href="<?php echo base_url("seller/cash_flow") ?>"><i class="icon-docs"></i><span>Cash Flow</span></a>
            </li>

                <?php }elseif($privillages->privillage == 'store'){ ?>
                 <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-list"></i><span>Store</span> </a>
                <ul>
               
                <!--  <li><a href="<?php //echo base_url("admin/produc_available_store") ?>">Store Product Available</a> -->
                </li>
                <!--  <li><a href="<?php //echo base_url("admin/dispency_product") ?>">Dispency</a> -->
                 <li><a href="<?php echo base_url("admin/all_productStore") ?>">Pharmacy Products Available</a>
                

                </li>
                </ul>
                </li>
                    <?php }elseif($privillages->privillage == 'product'){ ?>
               <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-list"></i><span>Products</span> </a>
                <ul>
                <li><a href="<?php echo base_url("admin/product") ?>">Add products</a>
                </li>
                <!-- <li><a href="<?php //echo base_url("admin/import_execel") ?>">Import Excell</a> -->
                </li>
                 <li><a href="<?php echo base_url("admin/all_product") ?>">All products</a>
                </li>
                </ul>
                </li>
                        <?php } ?>
        <?php endforeach; ?>

          </ul>
     <br><br><br><br><br>
            </nav>
        </div>
           
    </div> 

</div>
</div>
<?php } ?>