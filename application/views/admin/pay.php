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
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="card">
<div class="header">
<h2>Payrol form</h2>
</div>
<div class="body">
<?php echo form_open_multipart("admin/create_pay/{$pay->user_id}"); ?>
<div class="row clearfix">
       <div class="col-sm-3">
       <!--  <div class="form-group">
           <span>Full name</span>
            <input type="text" autocomplete="off" required name="full_name" class="form-control" placeholder="Full name">
            <?php echo form_error("full_name"); ?>
        </div> -->
    </div>
       <div class="col-sm-6">
      <div class="form-group">
        <span>Pay Amount</span>
            <input type="number" autocomplete="off" required name="pay_amount" class="form-control" placeholder="Pay Amount">
            <?php echo form_error("pay_amount"); ?>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $pay->user_id; ?>">
    </div>
        <div class="col-sm-3">
     <!--  <div class="form-group">
        <span>Privillage</span>
        <select type="text" class="form-control" required name="role">
          <option value="">Select privillage</option>
          <option>admin</option>
          <option>seller</option>
        </select>
        <?php //echo form_error("role"); ?>
        </div> -->
    </div>
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
    	<div class="text-center">
        <button type="submit" class="btn btn-primary">Pay</button>
     <a href="<?php echo base_url("admin/payRol") ?>" class="btn btn-info"><i class="icon-arrow-left"></i></a>
      </div>
    </div>
</div>
<?php form_close(); ?>
</div>
</div>
</div>
</div>
<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
<div class="header">
      <h2>Payrol list of <b><?php echo $pay->full_name; ?></b> </h2>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                 <th>Amount</th>
                   <th>Date</th>
                  <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($pay_data as $pays): ?>
            <tr>
            <td><?php echo number_format($pays->pay_amount); ?>/=</td>
            <td><?php echo substr($pays->date, 0,10); ?></td>
            <td><a href="<?php echo base_url("admin/edit_payrol/{$pays->id}") ?>" class="btn btn-info"><i class="icon-pencil"></i></a> | <a href="<?php echo base_url("admin/Delete_payrol/{$pays->id}") ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="icon-trash"></i></a></td>
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

