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
<h2>Add Service</h2>
</div>
<div class="body">
<?php echo form_open_multipart("admin/create_service"); ?>
<div class="row clearfix">
       <div class="col-sm-6">
        <div class="form-group">
           <span>Service name</span>
            <input type="text" autocomplete="off" required name="huduma_name" class="form-control" placeholder="service name">
            <?php echo form_error("huduma_name"); ?>
        </div>
    </div>
       <div class="col-sm-6">
      <div class="form-group">
        <span>Service Price</span>
            <input type="number" autocomplete="off" required name="huduma_price" class="form-control" placeholder="Service price">
            <?php echo form_error("huduma_price"); ?>
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
      <h2>Service List</b> </h2>
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
                   <th>Service name</th>
                    <th>Service price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Service name</th>
                    <th>Service price</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($service as $services): ?>
            <tr>
           
            <td><?php echo $services->huduma_name; ?></td>
            <td>Tsh.<?php echo number_format($services->huduma_price); ?>/=</td>
            
            <td>
                 <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                             
                      <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="<?php echo base_url("admin/edit_service/{$services->huduma_id}"); ?>">Edit</a>
                       <a class="dropdown-item" href="<?php echo base_url("admin/delete_service/{$services->huduma_id}"); ?>" onclick="return confirm('Are you sure?')">Delete</a>
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

