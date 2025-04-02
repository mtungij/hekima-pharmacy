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
               
                 <li><a href="<?php echo base_url("admin/produc_available_store") ?>">Store Product Available</a>
                </li>
                 <li><a href="<?php echo base_url("admin/dispency_product") ?>">Dispency</a>
                 <li><a href="<?php echo base_url("admin/all_productStore") ?>">Pharmacy Products Available</a>
                <li><a href="<?php echo base_url("admin/view_product_movement") ?>">Product Stock Movement</a>

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