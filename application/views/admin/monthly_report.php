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
   <?php echo form_open("admin/monthly_report"); ?>
<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
<div class="header">
    <div class="">
        <div class="row">
            <div class="col-md-12">
    <h5>
        <?php if (count($sales_data) > 0) {
         ?>
        Monthly Report /From:<?php  echo  date('F, j, Y', strtotime($from)); ?> - To: <?php  echo  date('F, j, Y', strtotime($to)); ?>
    <?php }else{ ?>
         Monthly Report
        <?php } ?>
         </h5>
  
    </div>
   <!--  <div class="col-md-6">
        <div class="pull-right">
            <?php //if(count($data) == 0){ ?>
        
    <?php //}else{ ?>
        <a href="<?php //echo base_url("admin/print_previousData/{$from}/{$to}/{$sell_status}/") ?>" target="_blank" class="btn btn-info btn-sm"><i class="icon-printer"></i>Print</a>
        <?php //} ?>
        </div>
    </div> -->
    </div>
    </div>
    <div  class="row">
    
<div class="col-md-4">
   
      From : 
   
      <?php //echo date('F, j, Y', strtotime($from)) ?>
      <?php //} ?>
       <input type="date" required  placeholder="01/01/0000" name="from" class="form-control">
</div>
<div class="col-md-4">
      To:
      <?php //echo date('F, j, Y', strtotime($to)) ?>
      <?php //} ?>
      <input type="date" name="to" required  placeholder="01/01/0000" class="form-control">
</div>


<div class="col-md-2">
    <br>
<button type="submit" class="btn btn-info ">Get Data</button>
</div>


</div>
</div>
<?php echo form_close(); ?>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>

                    
                    <th>Seller</th>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Sale price</th>
                    <th>Total price</th>
                    <th>Profit</th>
                    <th>Seles Staus</th>
                    <th>Time</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php //$data; ?>
              <?php foreach ($sales_data as $all_salles_today): ?>
                <tr>
            <td><?php echo $all_salles_today->full_name; ?></td>
            <td><?php echo $all_salles_today->name; ?></td>
            <td><?php echo $all_salles_today->qnty ; ?> <?php echo $all_salles_today->unit ; ?></td>
            <td><?php echo  number_format($all_salles_today->new_sell_price); ?>/=</td>
            <td><?php echo  number_format($all_salles_today->total_sell_price); ?>/=</td>
            <td><?php echo  number_format($all_salles_today->profit); ?>/=</td>
            <td>
               <?php 
                 if ($all_salles_today->sell_status == 'retail') {
                   echo "<span class='badge badge-success'>Retailsale</span>";
                 }elseif ($all_salles_today->sell_status == 'whole') {                
                  echo "<span class='badge badge-info'>Whole sale</span>";
                  }
                 ?>
               
            </td>
            <td>
                <?php  echo  date('F, j, Y, g:j a', strtotime($all_salles_today->sell_date)); ?>
                   
                </td>

              
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tr>
                <th>TOTAL SALES</th>
                <th></th>
                <th><?php echo number_format($sum_all_sales->total_sell) ?>/=</th>
                <th></th>
                <th>TOTAL PROFIT</th>
                <th></th>
                <th><?php echo number_format($profit_all->total_profit) ?>/=</th>
                <th></th>
            </tr>
            <tr>
                <th>RETAILSALE</th>
                <th></th>
                <th><?php echo number_format($retail_sale->total_sellRetail) ?>/=</th>
                <th></th>
                <th>RETAILSALE PROFIT</th>
                <th></th>
                <th><?php echo number_format($retail_profit->total_profitRetail) ?></th>
                <th></th>
            </tr>

            <tr>
                <th>WHOLESALE</th>
                <th></th>
                <th><?php echo number_format($whole->total_sellwhole) ?>/=</th>
                <th></th>
                <th>WHOLESALE PROFIT</th>
                <th></th>
                <th><?php echo number_format($whole_profit->total_profitwhole) ?></th>
                <th></th>
            </tr>

             <tr>
                <th style="color:red;">TOTAL EXPENSES</th>
                <th></th>
                <th style="color:red;"><?php echo number_format($expenses->total_expenses) ?>/=</th>
                <th></th>
                <th style="color:green">GROSS TOTAL</th>
                <th></th>
                <th><?php echo number_format($profit_all->total_profit - $expenses->total_expenses) ?>/=</th>
                <th></th>
            </tr>
            
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


<?php include 'incs/footer.php'; ?>

