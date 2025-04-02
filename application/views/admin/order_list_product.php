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
      <h2><h2>Supplier Name : <?php echo @$supplier_detail->supplier_name; ?> /phone Number : <?php echo $supplier_detail->supplier_phone;  ?> / Order Date : <?php echo @$supplier_detail->date ?> </b> </h2></b> </h2>
          <div class="text-center">
  
</div>
</div>
<div class="body">
    <div class="table-responsive">
        <?php echo form_open("admin/create_another_order/{$supplier_detail->order_id}"); ?>

<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>
                    <th></th>
                    <th>Product name</th>
                    <th>Brand</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th><button type="submit" class="btn btn-info">Placeorder</button></th>
                </tr>
            </tfoot>
            <tbody>
              <?php foreach ($purchase as $stores): ?>
            <tr>
            <td><input type="checkbox" name="product_id" value="<?php echo $stores->id; ?>"></td>
            <td><?php echo $stores->name; ?></td>
            <td><?php echo $stores->bland; ?></td>
            <input type="hidden" name="order_id" value="<?php echo $supplier_detail->order_id; ?>">
            <input type="hidden" name="supplier_id" value="<?php echo $supplier_detail->supplier_id; ?>">
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo form_close(); ?>
    </div>
</div>


<?php include 'incs/footer.php'; ?>


<!-- <script>
    function calculate_total_price(data){
         const elm = event.target;
         let prodID = elm.dataset.id;
        const quantity = document.querySelector("#qnty").value
          alert(quantity)
    }
</script> -->
