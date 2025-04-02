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
    <div class="col-md-4">
  <h2>Today's Cashflow Report</b> </h2>
  </div>
  <div class="col-md-2">
    <div class="pull-right">
      Today Cash In
      <input type="" name="" value="<?php echo number_format($data_cashin->TotalItemsOrdered) ; ?>/=" class="form-control" readonly>
    </div>
  </div>
  <div class="col-md-2">
    <div class="pull-right">
     Capital
      <input type="" name="" value="<?php echo number_format($data_cashin->TotalItemsOrdered - $today_profit->Totalprofit) ; ?>/=" class="form-control" readonly>
    </div>
  </div>
   <div class="col-md-2">
    <div class="pull-right">
       Profit
      <input type="" name="" value="<?php echo number_format($today_profit->Totalprofit) ; ?>/=" class="form-control" readonly>
    </div>
  </div>
  <div class="col-md-2">
    <div class="pull-right">
      <a href="<?php echo base_url("admin/today_cashreport"); ?>" class="btn btn-info" target="_blank"><i class="icon-printer"></i>Print</a>
      <a href="<?php echo base_url("admin/get_all_cashFlow"); ?>" class="btn btn-info"><i class="icon-arrow-left"></i>Back</a>
    </div>
  </div>
  </div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basi-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                  
                    <th>Description</th>
                    <th>Cash Out</th>
                    <th>Date</th>
                    
                </tr>
            </thead>
            <tbody>
        
                <?php foreach ($data_cash as $data_cashs): ?>
            <tr>
            <td><?php echo $data_cashs->description; ?></td>
            <td><?php echo number_format($data_cashs->price); ?>/=</td>
            <td><?php echo $data_cashs->created; ?>
              
            </td>
              </tr>
        <?php endforeach; ?>
        <tr>
          <th></th>
          <th><h5 style="">Direct Expenses : <?php echo number_format($total_expences->matumiz); ?>/=</h5></th>
          <th><h5 style="">Total Cash In : <?php echo number_format($data_cashin->TotalItemsOrdered + $huduma->total_price); ?>/=</h5></th>
        </tr>
        <tr>
          <th></th>
          <th><h5>Indirect Expenses : <?php echo number_format($today_indirect_exp->total_paytoday); ?> </h5></th>
          <th><h5 style="">Total Sell Capital : <?php echo number_format($data_cashin->TotalItemsOrdered - ($today_profit->Totalprofit + $today_indirect_exp->total_paytoday)) ; ?>/=</h5></th>
        </tr>
          <tr>
          <th></th>
          <th><h5>Profit : <?php echo $today_profit->Totalprofit - $total_expences->matumiz; ?> </h5></th>
          <th><h5 style="">Gross Total: <?php echo ($today_profit->Totalprofit - $total_expences->matumiz) + ($data_cashin->TotalItemsOrdered - ($today_profit->Totalprofit + $today_indirect_exp->total_paytoday)); ?>/=</h5></th>
        </tr>
            </tbody>
        </table>
    </div>
</div>
</div>

</div>
</div>
</div>
<script src="<?php echo base_url() ?>assets/admin/js/jquery.js"></script>
<?php include 'incs/footer.php'; ?>



