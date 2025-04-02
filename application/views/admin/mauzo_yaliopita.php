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
   <?php echo form_open("admin/curent_sells"); ?>
<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
<div class="header">
        <div class="">
            <div class="row">
                <div class="col-md-6">
        <h5>Previous Sales</h5>
      
        </div>
        <div class="col-md-6">
            <div class="pull-right">
                <?php if(count($data) == 0){ ?>
            
        <?php }else{ ?>
            <a href="<?php echo base_url("admin/last_salesReport/{$from}/{$to}") ?>" target="_blank" class="btn btn-info"><i class="icon-printer"></i>Print</a>
            <?php } ?>
            </div>
        </div>
        </div>
        </div>
        <div  class="row">
          <?php $date = date("Y-m-d"); ?>
    <div class="col-md-3">
       
          From : 
           <?php if (count($data) == 0) {
         ?>
         mm/dd/yy
     <?php }else{ ?>
          <?php echo date('F, j, Y', strtotime($from)) ?>
          <?php } ?>
           <input type="date" required value="<?php echo $date; ?>"   name="from" class="form-control">
    </div>
    <div class="col-md-3">
          To:
               <?php if (count($data) == 0) {
         ?>
         mm/dd/yy
     <?php }else{ ?>
          <?php echo date('F, j, Y', strtotime($to)) ?>
          <?php } ?>
          <input type="date" name="to" required  value="<?php echo $date; ?>" class="form-control">
    </div>

    <div class="col-md-2">
        <br>
    <button type="submit" class="btn btn-info ">Get Data</button>
    </div>

    <div class="col-md-2">
    Total Sale
     <input readonly  placeholder="<?php echo number_format( $total_mauzo_pita->total_sell); ?>/=" class="form-control">
        
    </div>
    <div class="col-md-2">
    Profit

     <input readonly  placeholder="<?php echo number_format($total_profit->total_profit); ?>/=" class="form-control">
    </div>
    </div>
    </div>
    <?php echo form_close(); ?>
<div class="body">
    <div class="table-responsive">
<table class="table table-hover js-basic-example dataTable table-custom">
            <thead class="thead-primary">
                <tr>

                    
                    <th>Seller</th>
                    <th>Customer</th>
                     <th>Product name</th>
                    <th>Quantity</th>
                    <th>Sale price</th>
                    <th>Total price</th>
                    <th>Seles Staus</th>
                    <th>Time</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php $data; ?>
              <?php foreach ($data as $all_salles_today): ?>
                <tr>
            <td><?php echo $all_salles_today->full_name; ?></td>
            <td><?php echo $all_salles_today->customer; ?></td>
            <td><?php echo $all_salles_today->name; ?></td>
            <td><?php echo $all_salles_today->qnty ; ?> <?php echo $all_salles_today->unit ; ?></td>
            <td><?php echo  number_format($all_salles_today->new_sell_price); ?>/=</td>
            <td><?php echo  number_format($all_salles_today->total_sell_price); ?>/=</td>
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
                <?php  echo $all_salles_today->creat; ?>
                   
                </td>

              
                </tr>
            <?php endforeach; ?>
            </tbody>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>SELLER SUMMARY</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
       <?php foreach ($seller_data as $seller_datas): ?>
            <tr>
                <td></td>
                <td></td>
                <td><b><?php echo $seller_datas->full_name; ?></b></td>
                <td></td>
                <td></td>
                <td><b><?php echo $seller_datas->total_mauzo; ?></b></td>
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

