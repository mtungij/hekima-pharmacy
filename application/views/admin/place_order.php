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
 <?php echo form_open("admin/create_order"); ?>
<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
<div class="header">
      <h2>Product List</b> </h2>
          <div class="text-center">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
    
         <span>Select Supplier</span>
   <select type="number" class="form-control" name="supplier_id" required>
       <option value="">Select Supplier</option>
       <?php foreach ($supplier as $suppliers): ?>
       <option value="<?php echo $suppliers->id; ?>"><?php echo $suppliers->supplier_name; ?></option>
       <?php endforeach; ?>
   </select>
   </div>
     <div class="col-md-4"></div>
</div>
</div>
</div>
<div class="body">
    <div class="table-responsive">
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
            <td><input type="checkbox" name="product_id[]" value="<?php echo $stores->id; ?>"></td>
            <td><?php echo $stores->name; ?></td>
            <td><?php echo $stores->bland; ?></td>
         <input type="hidden" class="form-control" autocomplete="off" name="pack_size[]"> 
         <input type="hidden" class="form-control" name="quantity_pack[]">
           <input type="hidden" class="form-control" autocomplete="off"  name="buy_price_pack[]">


            <input type="hidden" class="form-control" autocomplete="off"  name="total_amount[]"> 
                
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>





<?php echo form_close(); ?>





<?php include 'incs/footer.php'; ?>


<!-- <script>
    function calculate_total_price(data){
         const elm = event.target;
         let prodID = elm.dataset.id;
        const quantity = document.querySelector("#qnty").value
          alert(quantity)
    }
</script> -->
