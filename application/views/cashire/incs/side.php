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

                        <li><a href="<?php echo base_url("cashire/setting"); ?>"><i class="icon-settings"></i>Setting</a></li>
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
                    <li><a href="<?php echo base_url("cashire/dashboard") ?>"><i class="icon-home"></i><span>Dashboard</span></a>
                    </li>

                    <!--  <li><a href="<?php //echo base_url("cashire/index") ?>"><i class="icon-docs"></i><span>Sale</span></a>
                    </li>
 -->               
                    <!--  <li>
                         <a href="<?php //echo base_url("seller/today_salles") ?>"><i class="icon-docs"></i><span>Today salles</span></a>
                    </li> -->
                     
            <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-list"></i><span>Today sales</span> </a>
                <ul>
                <li><a href="<?php echo base_url("cashire/today_salles") ?>">General sales Report</a>
                </li>
                 <li><a href="<?php echo base_url("cashire/retail_sale") ?>">RetailSale Report</a>
                 <li><a href="<?php echo base_url("cashire/whore_sale"); ?>">WholeSale Report</a>
                </li>
                </ul>
                </li>

                    <li>
                       <a href="<?php echo base_url("cashire/cash_flow") ?>"><i class="icon-list"></i><span>Cash Flow</span></a>
                    </li>

                    <li>
                       <a href="<?php echo base_url("cashire/view_order_confirmd") ?>"><i class="icon-list"></i><span>Order confirmed</span></a>
                    </li>
                </ul>
            </nav>
        </div>
           
    </div>          
</div>
</div>