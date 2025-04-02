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
  <h2>General Cashflow Report</b> </h2>
  </div>
  <div class="col-md-4">
    <div class="pull-right">
     <!--  Today Cash In
      <input type="" name="" value="<?php //echo number_format($data_cashin->TotalItemsOrdered) ; ?>/=" class="form-control" readonly> -->
    </div>
  </div>
  <div class="col-md-4">
    <div class="pull-right">
      <a href="<?php echo base_url("admin/general_cashflow_report"); ?>" class="btn btn-info" target="_blank"><i class="icon-printer"></i>Print</a>
      <a href="<?php echo base_url("admin/get_all_cashFlow"); ?>" class="btn btn-info"><i class="icon-arrow-left"></i>Back</a>
    </div>
  </div>
  </div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                  
                    <th>Description</th>
                    <th>Cash Out</th>
                    <th>Date</th>
                    
                </tr>
            </thead>
            <tbody>
        
            <?php foreach ($data as $data_cashs): ?>
            <tr>
            <td><?php echo $data_cashs->description; ?></td>
            <td><?php echo number_format($data_cashs->price); ?>/=</td>
            <td><?php echo date('F, j, Y, g:j a', strtotime($data_cashs->created)); ?>
              
            </td>
            </tr>
        <?php endforeach; ?>
            </tbody>
             <tr>
          <th></th>
          <th>Direct Expenses : <?php echo number_format($all_matumiz->matumiz); ?>/=</th>
          <th>
            Total paylor : <?php echo number_format($mishahara_data->mishahara) ; ?>/=
          </th>
          </tr>
          <tr>
          <th></th>
          <th>Indirect Expenses : <?php echo number_format($inderect_expenses->total_paid_expenses); ?></th>
          <th>Total Sells Capital : <?php echo number_format($all_sell->TotalItemsOrdered - $total_profit->total_profit - $inderect_expenses->total_paid_expenses); ?>/=</th>
        </tr>

          <tr>
          <th></th>
          <th>Total Profit : <?php echo number_format($total_profit->total_profit -($all_matumiz->matumiz + $mishahara_data->mishahara)); ?></th>
          
          <th>Gross Total: <?php echo number_format($total_profit->total_profit -($all_matumiz->matumiz + $mishahara_data->mishahara) + ($all_sell->TotalItemsOrdered - $total_profit->total_profit - $inderect_expenses->total_paid_expenses)); ; ?>/=</th>
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



