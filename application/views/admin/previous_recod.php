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
    <?php echo form_open("admin/prev_recod"); ?>
  <div class="row">
   
  <div class="col-lg-3">
      <h2>Previous Record Service </h2>
 </div>
 
  <div class="col-lg-3">
    From:
      <input type="date" name="from" class="form-control" required>
 </div>
  <div class="col-lg-3">
    To:
      <input type="date" name="to" class="form-control" required>
 </div>
 <div class="col-lg-3">
   <br>
     <button type="submit" class="btn btn-primary">Get Data</button>
     <a href="<?php echo base_url("admin/recod_service"); ?>" class="btn btn-info">Back</a>    
 </div>
      <?php echo form_close(); ?>
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
                                    </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th><?php echo number_format($sum_data->total_price); ?></th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($data as $recods): ?>
            <tr>
           
            <td><?php echo $recods->full_name; ?></td>
            <td><?php echo $recods->customer_name; ?></td>
            <td><?php echo $recods->huduma_name; ?></td>
            <td><?php echo number_format($recods->price); ?></td>
            <td><?php echo $recods->date; ?></td>
            
            
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

