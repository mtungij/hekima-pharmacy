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
<h2>Record Service</h2>
</div>
<div class="body">
<?php echo form_open_multipart("admin/create_recod_service"); ?>
<div class="row clearfix">
       <div class="col-sm-6">
        <div class="form-group">
           <span>Customer name</span>
            <select type="number" class="form-control kt-selectpicker" name="customer_id" data-live-search="true" required>
                 <option value="">Select Customer</option>
                 <?php foreach ($customer as $customers): ?>
                 <option value="<?php echo $customers->customer_id; ?>"><?php echo $customers->customer_name; ?></option>
                  <?php endforeach; ?>
            </select>
        </div>
    </div>
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <div class="col-sm-6">
        <div class="form-group">
           <span>Service</span>
            <select type="number" class="form-control kt-selectpicker" name="huduma_id" data-live-search="true" required>
                 <option value="">Select Service</option>
                 <?php foreach ($service as $services): ?>
                 <option value="<?php echo $services->huduma_id; ?>"><?php echo $services->huduma_name; ?> -  <?php echo $services->huduma_price; ?>/=</option>
                  <?php endforeach; ?>
            </select>
        </div>
    </div>  
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
    	<div class="text-center">
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
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
  <div class="row">
    <?php //echo form_open(); ?>
  <div class="col-lg-6">
      <h2>Today Service </h2>
 </div>
  <div class="col-lg-6">
        <div class="pull-right">
       <a href="<?php echo base_url("admin/prev_recod"); ?>" class="btn btn-primary"><i class="icon-calendar"></i>Previous Record</a>
      </div>
      </div>
  <!-- <div class="col-lg-3">
    From:
      <input type="date" name="from" class="form-control">
 </div>
  <div class="col-lg-3">
    To:
      <input type="date" name="to" class="form-control">
 </div>
 <div class="col-lg-3">
   <br>
     <button type="submit" class="btn btn-primary">Get Data</button>
 </div>
     <?php //echo form_close(); ?>   -->
      </div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                  <th>Seller</th>
                    <th>Customer Name</th>
                    <th>Service</th>
                    <th>Service Price</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th><?php echo number_format($sum_service->total_price); ?></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($recod as $recods): ?>
            <tr>
           
            <td><?php echo $recods->full_name; ?></td>
            <td><?php echo $recods->customer_name; ?></td>
            <td><?php echo $recods->huduma_name; ?></td>
            <td><?php echo number_format($recods->price); ?></td>
            <td><?php echo $recods->date; ?></td>
            
            <td>
                 <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                             
                      <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="<?php echo base_url("admin/edit_recod/{$recods->receive_id}"); ?>">Edit</a>
                        <a class="dropdown-item" href="<?php echo base_url("admin/delete_recod/{$recods->receive_id}"); ?>" onclick="return confirm('Are you Sure?')">Delete</a>
                                    </div>
                                </div>
                            </div>
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

 <script>
        $(document).ready(function () { 
        $("#cont1,#cont2").change(function() {
    $("#total_cont").val ($("#cont1").val() * $("#cont2").val());
            });
        });
    </script>

