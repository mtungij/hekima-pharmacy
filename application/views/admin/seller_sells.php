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
    <div  class="row">
        <div class="col-md-3">
<h2>Salles today</b> </h2>
</div>
<div class="col-md-3">
  
      Total sell today <input type="" readonly placeholder="Tsh.<?php echo number_format($total_sell->TotalItemsOrdered); ?>/=" name="" class="form-control">
  
</div>
<div class="col-md-3">
   
      Today Profit <input type="" name="" readonly placeholder="Tsh.<?php echo number_format($total_profit->Totalprofit); ?>/=" class="form-control">
</div>
<div class="col-md-3">
     <a href="" data-toggle="modal" data-target="#addcontact2" class="btn btn-sm btn-primary"><i class="icon-magnifier"></i></a></div>
</div>
</div>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>

                    
                    <th>Seller</th>
                    <th>Customer</th>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Sell price</th>
                    <th>Total price</th>
                    <th>Profit</th>
                    <th>Sales status</th>
                    <th>Time</th>
                  
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_salles as $all_salles_today): ?>
                <tr>
            <td><?php echo $all_salles_today->full_name; ?></td>
            <td><?php echo $all_salles_today->customer; ?></td>
            <td><?php echo $all_salles_today->name; ?></td>
            <td><?php echo $all_salles_today->quanty ; ?> <?php echo $all_salles_today->unit ; ?></td>
            <td><?php echo  number_format($all_salles_today->new_sell_price) ; ?>/=</td>
            <td><?php echo  number_format($all_salles_today->total_sell_price); ?>/=</td>
            <td><?php echo  number_format($all_salles_today->profit); ?>/=</td>
            <td>
               <?php 
               $da = $all_salles_today->ju_price - $all_salles_today->new_sell_price;
                 if ($da == 0) {
                   echo "<span class='badge badge-success'>whole sale</span>";
                 }else{
                  echo "<span class='badge badge-info'>Retail sale</span>";
                 }
               ?> 
            </td>
            <td>
                <?php echo  $all_salles_today->created_at; ?>
            </td>

              
                </tr>
            <?php endforeach; ?>
            </tbody>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>SELLER SUMMARY</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
      <?php foreach ($data_employee as $data_employees): ?>
        
              <tr>
                  <td></td>
                  <td></td>
                  <td><b><?php echo $data_employees->full_name; ?></b></td>
                  <td></td>
                  <td></td>
                  <td><b><?php echo $data_employees->total_mauzo; ?></b></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>

               <?php endforeach; ?>

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


<div class="modal fade" id="addcontact2" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h6 class="title" id="defaultModalLabel">Filter</h6>
</div>
<?php echo form_open("admin/filter_general_sellers/"); ?>
<div class="modal-body">
<div class="row clearfix">
    <?php $date = date("Y-m-d"); ?>
    <div class="col-md-12 col-12">
      <span>Seller</span>

      <select type="number" class="form-control" name="user_id" required>
          <option value="">select seller</option>
          <?php foreach ($all_seller as $all_sellers): ?>
          <option value="<?php echo $all_sellers->user_id; ?>"><?php echo $all_sellers->full_name; ?></option>
           <?php endforeach; ?>
      </select>
    </div>
    <div class="col-md-6 col-6">
      <span>From</span>
      <input type="date" class="form-control" value="<?php echo $date; ?>" name="from" required>
    </div>
    <div class="col-md-6 col-6">
      <span>To</span>
      <input type="date" class="form-control" value="<?php echo $date; ?>" name="to" required>
    </div>
    </div>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Filter</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>

