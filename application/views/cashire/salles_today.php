<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>
<script src="<?php echo base_url('assets/admin/js/jquery.js'); ?>"></script>

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
  <h2>Sales Today</b> </h2>
  </div>
  <div class="col-md-6">
    <div class="pull-right">
      <a href="<?php echo base_url("cashire/today_saled_report"); ?>" target="_blank" class="btn btn-info" ><i class="icon-printer" ></i>Print</a>
    </div>
  </div>
  </div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>Seller name</th>
                    <th>Customer</th>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Selling price</th>
                    <th>Total price</th>
                    <th>Sell status</th>
                    <th>Time</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
        
          
                <?php foreach ($data as $datas): ?>
            <tr>
            <td><?php echo $datas->full_name ?></td>
            <td><?php echo $datas->customer; ?></td>
            <td><?php echo $datas->name; ?></td>
            <td><?php echo $datas->quanty; ?> <?php echo $datas->unit; ?> </td>
            <td>
          <?php echo number_format($datas->new_sell_price); ?>/=
            </td>
            <td><?php echo number_format($datas->total_sell_price); ?>/=</td>
            <td>
               <?php 
               $da = $datas->ju_price - $datas->new_sell_price;
                 if ($da == 0) {
                   echo "<span class='badge badge-success'>whole sale</span>";
                 }else{
                  echo "<span class='badge badge-info'>Retail sale</span>";
                 }
               ?>
            </td>
            <td><?php echo  date('F, j, Y, g:j a', strtotime($datas->created_at)); ?></td>
           <!--  <td>
          <a href="<?php echo base_url("cashire/delete_mistake_sell/{$datas->sell_id}") ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')"><i class="icon-close"></i></a>
            
            </td> -->
              </tr>
        <?php endforeach; ?>
      
            </tbody>
                 <tr>
             <th><h5>Total</h5></th>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
            
             <th>
              <h5><?php echo number_format($today_SalesData->TotalItemsOrdered); ?>/=</h5>
              </th>
             <th></th>
             <!-- <th></th> -->
           </tr>
        </table>
    </div>
</div>
</div>

</div>

</div>
</div>
<script src="<?php echo base_url() ?>assets/admin/js/jquery.js"></script>
<?php include 'incs/footer.php'; ?>



