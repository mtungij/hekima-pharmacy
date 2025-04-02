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
<div class="col-lg-12">
<div class="card">
<div class="header">
    <div class="row">
        <div class="col-md-6">
      <h2>Inventory Dashboard</h2>
      </div>
      <div class="col-md-6">
        <div class="pull-right">
         <a href="<?php echo base_url("admin/print_data"); ?>" class="btn btn-info" target="_blank"><i class="icon-printer"></i>All Product</a>
         <a href="<?php echo base_url("admin/print_sellingPrice"); ?> "  class="btn btn-primary" target="_blank"><i class="icon-printer"></i>Selling Price</a>
         <a href="<?php echo base_url("admin/empty_product"); ?>" class="btn btn-danger" target="=_blank"><i class="icon-printer"></i>Empty product</a>
          </div>
      </div>
      </div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>Product name</th>
                    <th>All Product</th>
                    <th>Unit</th>
                    <th>Products Sold</th>
                    <th>Remaining Product</th>
                    <th>Buy Price</th>
                    <th>Total Buy</th>
                    <th>Retail Sale Price</th>
                    <th>Total Retail Sale</th>
                    <th>Whole Sale Price</th>
                    <th>Total WholeSale Price</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><?php echo number_format($sum_total_buy->total_buy); ?></th>
                    <th></th>
                    <th><?php echo number_format($sum_total_retail->total_retail); ?></th>
                    <th></th>
                    <th><?php echo number_format($total_wholesale->totalwhole); ?></th>
                </tr>
               <!--  <tr>
                    <th style="color:green;">RETAIL SALE PROFIT</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="color:green"><?php //echo number_format($sum_total_retail->total_retail - $sum_total_buy->total_buy); ?></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr> -->

               <!--   <tr>
                    <th>ACTUAL CAPITAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="color:green"><?php echo number_format(($sum_total_buy->total_buy) - ($total_sell_profit->total_sell - $total_sell_profit->total_profit)); ?></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr> -->
                
            </tfoot>
            <tbody>
              <?php foreach ($inve as $inventory): ?>
            <tr>
           
            <td><b><?php echo $inventory->name; ?></b></td>
            <td><?php echo $inventory->balance + $inventory->out_balance; ?></td>
            <td><?php echo $inventory->unit; ?></td>
            <td><?php echo $inventory->out_balance; ?></td>
            <td><?php echo $inventory->balance; ?></td>
            
            <td><?php echo number_format($inventory->buy_price); ?></td>
            <td><?php echo number_format($inventory->total_buy); ?></td>
            <td><?php echo number_format($inventory->price); ?></td>
            <td><?php echo number_format($inventory->total_sell); ?></td>
             <td>
                <?php if ($inventory->ju_price == 0) {
                 ?>
                 -
             <?php }else{ ?>
                <?php echo number_format($inventory->ju_price); ?>
                <?php } ?>
            </td>
            <td>
                <?php if ($inventory->ju_price == 0) {
                 ?>
                 -
             <?php }else{ ?>
                <?php echo number_format($inventory->total_ju); ?>
                <?php } ?>
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


<?php include 'incs/footer.php'; ?>

