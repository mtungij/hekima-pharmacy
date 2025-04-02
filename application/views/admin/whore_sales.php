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
    <div  class="row">
        <div class="col-md-3">
<h2>WholeSales today</b> </h2>
</div>
<div class="col-md-3">
  
      Total wholesales today <input type="" readonly placeholder="Tsh.<?php echo number_format($total_whole->Totalwhole); ?>/=" name="" class="form-control">
  
</div>
<div class="col-md-3">
   
      Wholesales profit today <input type="" name="" readonly placeholder="Tsh.<?php echo number_format($whole_profit->whole_profit); ?>/=" class="form-control">
</div>
<div class="col-md-3">
	<div class="pull-right">
     <a href="<?php echo base_url("admin/print_whole_sale"); ?>" class="btn btn-info btn-sm" target="_blank"><i class="icon-printer"></i>Print</a>
     </div>
</div>
</div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>

                    
                    <th>Seller</th>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Sell price</th>
                    <th>Total price</th>
                    <th>Profit</th>
                    <th>Sales status</th>
                    <th>Time</th>
                  
                </tr>
            </thead>
            <tbody>
              <?php foreach ($whole_sale as $all_salles_today): ?>
                <tr>
            <td><?php echo $all_salles_today->full_name; ?></td>
            <td><?php echo $all_salles_today->name; ?></td>
            <td><?php echo $all_salles_today->quanty ; ?> <?php echo $all_salles_today->unit ; ?></td>
            <td><?php echo  number_format($all_salles_today->new_sell_price) ; ?>/=</td>
            <td><?php echo  number_format($all_salles_today->total_sell_price); ?>/=</td>
            <td><?php echo  number_format($all_salles_today->profit); ?>/=</td>
            <td>
               <?php 
               $da = $all_salles_today->ju_price - $all_salles_today->new_sell_price;
                 if ($da == 0) {
                   echo "<span class='badge badge-success'>wholesale</span>";
                 }else{
                  echo "<span class='badge badge-info'>Retailsale</span>";
                 }
               ?> 
            </td>
            <td>
                <?php echo  date('F, j, Y, g:j a', strtotime($all_salles_today->created_at)) ?>
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

