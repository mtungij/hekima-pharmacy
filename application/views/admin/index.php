
<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

<div id="main-content">
<div class="container-fluid">
<br>
<?php if ($das = $this->session->flashdata('massage')): ?>
<div class="row">
<div class="col-md-12">
<div class="alert alert-dismisible alert-success">
<a href="" class="close">&times;</a>
<?php echo $das;?>
</div>
</div>
</div>
<?php endif; ?>
<div class="row clearfix">

<div class="col-lg-12 col-md-12">
<div class="card">
<div class="header">
<h2>Admin panel <b><?php //echo $category_production->category_name; ?></b></h2>

</div>

<div class="body">
<div class="row clearfix">
<!-- <div class="col-md-4">

<a href="<?php //echo base_url("supplier/all_product") ?>"><div class="body bg-warning text-light">
     <div class="text-center">
     <?php
     $user //= $this->db->query("SELECT * FROM tbl_user"); 
      //return $user->result();
      ?>
    <h4><i class="icon-users"></i><?php //echo $user->num_rows(); ?></h4>
    <span>Users</span>
    </div>
</div></a>
</div> -->

<!-- <div class="col-md-3">
<a href="#"><div class="body bg-info text-light">
    
    <h4><i class="icon-doc"></i><?php //echo number_format($total_sell_data->TotalItemsOrdered); ?>/=</h4>
    <span>Total Cash In</span>
</div></a>
</div> -->
<div class="col-md-4">
<a href="<?php echo base_url("admin/payRol"); ?>"><div class="body bg-secondary text-light">
   
    <h4><i class="icon-doc"></i><?php echo number_format($mishahara_data->mishahara); ?>/=</h4>
    <span>Total Paylor</span>
</div></a>
</div>
<div class="col-md-4">
<a href="#"><div class="body bg-danger text-light">
   
    <h4><i class="icon-doc"></i><?php echo number_format($total_matumiz->matumiz + $mishahara_data->mishahara + $today_indirect_exp->total_paytoday); ?>/=</h4>
    <span>Total Cash Out</span>
</div></a>
</div>
<div class="col-md-4">
<a href="#"><div class="body bg-success text-light">
   
    <h4><i class="icon-doc"></i><?php echo number_format($total_profit_all->total_profit -($all_matumiz_all->matumiz + $mishahara_data_all->mishahara) + ($all_sell_all->TotalItemsOrdered - $total_profit_all->total_profit - $inderect_expenses_all->total_paid_expenses)); ; ?>/=</h4>
    <span>Gross Total</span>
</div></a>
</div>
</div>
<div id="total_revenu" class="ct-chart m-t-20"></div>
</div>

<div class="body">
<div class="row clearfix">
<!-- <div class="col-md-4">

<a href="<?php //echo base_url("supplier/all_product") ?>"><div class="body bg-warning text-light">
     <div class="text-center">
     
    <h4><i class="icon-doc"></i><?php //echo $user->num_rows(); ?></h4>
    <span>profit</span>
    </div>
</div></a>
</div> -->

<div class="col-md-6">
<a href="<?php echo base_url("admin/all_product"); ?>"><div class="body bg-info text-light">
    <?php 
    $product = $this->db->query("SELECT * FROM product");
     ?>
    <h4><i class="icon-list"></i><?php echo $product->num_rows(); ?></h4>
    <span>Product</span>
</div></a>
</div>
<div class="col-md-6">
<a href="<?php echo base_url("admin/users"); ?>"><div class="body bg-warning text-light">
      <?php
      $users = $this->db->query("SELECT * FROM tbl_user") ;
       ?>
    <h4><i class="icon-users"></i><?php echo $users->num_rows(); ?></h4>
    <span>Users</span>
</div></a>
</div>

</div>
<div id="total_revenu" class="ct-chart m-t-20"></div>
</div>
</div>
</div>
</div>

<div class="row clearfix">
        <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Year Statistics</h2>
                            <ul class="header-dropdown">
                                <!-- <?php //echo form_open("admin/index"); ?>
                                <li><select type="text" class="form-control" name="year">
                                    <option>Select Year</option>
                                    <?php //foreach ($years  as $data_year): ?>
                                    <option value="<?php //echo $data_year->year; ?>"><?php echo $data_year->year; ?></option>
                                    <?php //endforeach; ?>
                                </select></li>
                                <li><button type="submit" class="btn btn-primary btn-sm">Filter</button></li>
                               <?php //echo form_close(); ?> -->
                               
                            </ul>
                        </div>
                        <div class="body">
                       <canvas id="myChart" style="width: 100%; height: 250px;"></canvas>
                        </div>
                    </div>
                </div>
</div>


<div class="row clearfix">
        <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="header">
                            <h2>Year Expenses Statistics</h2>
                            <ul class="header-dropdown">
                                <!-- <?php //echo form_open("admin/index"); ?>
                                <li><select type="text" class="form-control" name="year">
                                    <option>Select Year</option>
                                    <?php //foreach ($years  as $data_year): ?>
                                    <option value="<?php //echo $data_year->year; ?>"><?php echo $data_year->year; ?></option>
                                    <?php //endforeach; ?>
                                </select></li>
                                <li><button type="submit" class="btn btn-primary btn-sm">Filter</button></li>
                               <?php //echo form_close(); ?> -->
                               
                            </ul>
                        </div>
                        <div class="body">
                       <canvas id="myChartExpenses" style="width: 100%; height: 250px;"></canvas>
                        </div>
                    </div>
                </div>

                 <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="header">
                            <h2>Year payrol Statistics</h2>
                            <ul class="header-dropdown">
                                <!-- <?php //echo form_open("admin/index"); ?>
                                <li><select type="text" class="form-control" name="year">
                                    <option>Select Year</option>
                                    <?php //foreach ($years  as $data_year): ?>
                                    <option value="<?php //echo $data_year->year; ?>"><?php echo $data_year->year; ?></option>
                                    <?php //endforeach; ?>
                                </select></li>
                                <li><button type="submit" class="btn btn-primary btn-sm">Filter</button></li>
                               <?php //echo form_close(); ?> -->
                               
                            </ul>
                        </div>
                        <div class="body">
                       <canvas id="myChartpayrol" style="width: 100%; height: 250px;"></canvas>
                        </div>
                    </div>
                </div>
</div>



<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
<div class="header">

<div  class="row">
<div class="col-md-2">
<h2>Monthly statistics</b> </h2>
</div>

<div class="col-md-2">
  
   <!--    Total sales today <input type="" readonly placeholder="Tsh.<?php echo number_format($total_sell->TotalItemsOrdered); ?>/=" name="" class="form-control"> -->
  
</div>
<div class="col-md-6">
     <?php echo form_open("admin/index"); ?>
    <div class="row">   
    <div class="col-md-6"> 
        Select Year <select type="text" name="year" class="form-control" required>
          <option value="">Select Year</option>
           <?php foreach ($years  as $data_year): ?>
          <option value="<?php echo $data_year->year; ?>"><?php echo $data_year->year; ?></option>
      <?php endforeach; ?>
      </select>
      </div>  
      <div class="col-md-6">
        <br>
         <button type="submit" class="btn btn-primary">Filter</button> 
      </div>
      <?php echo form_close(); ?>
</div> 
</div>
<div class="col-md-2"> 
</div>

</div>
</div>


<div class="body">
    <div class="table-responsive">
<table class="table table-hover j-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>

                    
                    <th>Month</th>
                    <th>Total Sell</th>
                    <th>Retail Sell</th>
                    <th>WholelSell</th>
                    <th>Total Profit</th>
                    <th>Retail Profit</th>
                    <th>Whole Profit</th>
                    <th>Direct Expenses</th>
                    <th>Indirect Expenses</th>
                    <!-- <th>Paylor</th> -->
                    <th>Gross Total</th>
                  
                </tr>
            </thead>
            <tbody>
              <?php foreach ($datamonth as $datamonths): ?>
                <tr>
            <td><?php echo  date('F', strtotime($datamonths->sell_day)); ?></td>
            <td> <?php echo number_format($datamonths->total_sellPRICE); ?></td>
            <td><?php echo number_format($datamonths->total_retail_sale); ?></td>
            <td><?php echo number_format($datamonths->total_wholesale) ?></td>
            <td><?php echo number_format($datamonths->total_profit); ?></td>
            <td><?php echo number_format($datamonths->total_retail_profit) ?></td>
            <td>
             <?php echo number_format($datamonths->total_whole_profit); ?>
            </td>
            <td><?php echo number_format($datamonths->total_expenses + $datamonths->total_payrole); ?></td>
            <td><?php echo number_format($datamonths->total_indirect_expenses); ?></td>
          
          <!-- <td><?php //echo number_format($datamonths->total_payrole); ?></td> -->
          <td><?php echo number_format(($datamonths->total_profit) - ($datamonths->total_expenses + $datamonths->total_payrole) + ($datamonths->total_retail_sale - $datamonths->total_retail_profit +($datamonths->total_wholesale - $datamonths->total_whole_profit)) - $datamonths->total_indirect_expenses); ?></td>
              
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>






<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
<div class="header">
    <div  class="row">
        <div class="col-md-2">
<h2>Sales today</b> </h2>
</div>
<div class="col-md-4">
  
      Total sales today <input type="" readonly placeholder="Tsh.<?php echo number_format($total_sell->TotalItemsOrdered); ?>/=" name="" class="form-control">
  
</div>
<div class="col-md-4">
   
      Today Profit <input type="" name="" readonly placeholder="Tsh.<?php echo number_format($total_profit->Totalprofit); ?>/=" class="form-control">
</div>
<div class="col-md-2">
   <!--  <a href="" class="btn btn-info"><i class="icon-printer"></i>Print</a> -->
</div>
</div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>

                    
                    <th>Seller</th>
                    <th>Customer</th>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Sell price</th>
                    <th>Total price</th>
                    <th>Sell status</th>
                    <th>Time</th>
                    <th>Action</th>
                  
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_salles as $all_salles_today): ?>
                <tr>
            <td><?php echo $all_salles_today->full_name; ?></td>
            <td><?php echo $all_salles_today->customer; ?></td>
            <td><?php echo $all_salles_today->name; ?></td>
            <td><?php echo $all_salles_today->quanty ; ?> <?php echo $all_salles_today->unit ; ?></td>
            <td><?php echo  number_format($all_salles_today->new_sell_price) ; ?>/=</td>
            <td><?php echo  number_format($all_salles_today->total_sell_price); ?>/=</td>
            <td>
              <?php 
               $da = $all_salles_today->ju_price - $all_salles_today->new_sell_price;
                 if ($da == 0) {
                   echo "<span class='badge badge-success'>whole sale</span>";
                 }else{
                  echo "<span class='badge badge-info'>Retail sale</span>";
                 }
               ?>
            </td>
            <td><?php echo  $all_salles_today->created_at; ?>
          </td>
          <td>
           
              <a href="<?php echo base_url("admin/delete_mistake_sell/{$all_salles_today->sell_id}") ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="icon-close"></i></a>
            

            </td>

              
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>

</div>

<?php include('incs/footer.php'); ?>
<script src="<?php echo base_url() ?>assets/admin/js/chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/js/App.js"></script>









