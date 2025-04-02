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
<h2>Supplier Registration Form</h2>
</div>
<div class="body">
<?php echo form_open_multipart("admin/create_supplier"); ?>
<div class="row clearfix">
       <div class="col-sm-6">
        <div class="form-group">
           <span>Supplier Name</span>
            <input type="text" autocomplete="off" required name="supplier_name" class="form-control" placeholder="Supplier name">
            <?php echo form_error("supplier_name"); ?>
        </div>
    </div>
    <?php $date = date("Y-m-d"); ?>
    <input type="hidden" name="date" value="<?php echo $date; ?>">
       <div class="col-sm-6">
      <div class="form-group">
        <span>Supplier Phone Number</span>
            <input type="number" autocomplete="off" required name="supplier_phone" class="form-control" placeholder="Supplier Phone Number">
            <?php echo form_error("supplier_phone"); ?>
        </div>
    </div>
   
      
</div>

<div class="row clearfix">                            
    <div class="col-sm-12">
    	<div class="text-center">
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <!--   <button type="submit" class="btn btn-outline-secondary">Cancel</button> -->
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
  <div class="col-lg-6">
      <h2>Customer List</b> </h2>
      </div>
       <div class="col-lg-6">
        <div class="pull-right">
       <!-- <a href="<?php //echo base_url("admin/all_product"); ?>" class="btn btn-primary"><i class="icon-eye"></i>View All product</a> -->
      </div>
      </div>
      </div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                   <th>Supplier name</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Supplier name</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($supplier as $customers): ?>
            <tr>
           
            <td><?php echo $customers->supplier_name; ?></td>
            <td><?php echo $customers->supplier_phone; ?></td>
            
            <td>
                 <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                             
                      <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="<?php echo base_url("admin/edit_supplier/{$customers->id}"); ?>">Edit</a>
                       <a class="dropdown-item" href="<?php echo base_url("admin/delete_supplier/{$customers->id}"); ?>" onclick="return confirm('Are you sure?')">Delete</a>
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

