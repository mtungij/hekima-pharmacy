
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Previous Sales Report</title>
</head>
<body>

<div id="container">
 <!--  <div style='width: 100%;align-items: center; display: flex;justify-content:space-between;flex-direction: row;'>
 </div> -->
  <style>
    .pull{
    text-align: center;
    margin-top: 100px;
    margin-bottom: 0px;
    margin-right: 150px;
    margin-left: 80px;

    }
  </style>
  <style>
    .display{
      display: flex;
      
    }
  </style>

       <div class="pull">
    <p style="font-size:12px;"> <?php echo $shop->shop_name; ?><br>
        <?php echo $shop->po_box; ?> <?php echo $shop->location; ?> <br>
        Mob: <?php echo $shop->phone; ?>
        <br>
        <b style="font-size:12px;">PREVIOUS SALES REPORT</b> <br> <b>FROM :</b> <?php echo date('F, j, Y', strtotime($from)) ?> <b>TO :</b> <?php echo date('F, j, Y', strtotime($to)) ?>
        </p>  
        
       </div>

     
 
  <div id="body">
  <style> 
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
</head>
<body>



<table>
  <tr>
    <th style="font-size: 12px;">Seller</th>
    <th style="font-size: 12px;">Customer</th>
    <th style="font-size: 12px;">Product</th>
    <th style="font-size: 12px;">Qty</th>
    <th style="font-size: 12px;">Sell Price</th>
    <th style="font-size: 12px;">Total Price</th>
    <th style="font-size: 12px;">Profit</th>
    <th style="font-size: 12px;">Status</th>
    <th style="font-size: 12px;">Time</th>
  </tr>
  
  <?php foreach ($all_salles as $all_sallesdata): ?>
    
 
 <tr>
    <td style="font-size: 12px;"><?php echo $all_sallesdata->full_name; ?></td>
    <td style="font-size: 12px;"><?php echo $all_sallesdata->customer; ?></td>
    <td style="font-size: 12px;"><?php echo $all_sallesdata->name; ?></td>
    <td style="font-size: 12px;"><?php echo $all_sallesdata->qnty; ?> <?php echo $all_sallesdata->unit; ?></td>
    <td style="font-size: 12px;"><?php echo  number_format($all_sallesdata->new_sell_price) ; ?></td>
    <td style="font-size: 12px;"><?php echo  number_format($all_sallesdata->total_sell_price) ; ?></td>
    <td style="font-size: 12px;"><?php echo  number_format($all_sallesdata->profit) ; ?></td>
    <td style="font-size: 12px;">
        <?php 
               $da = $all_sallesdata->ju_price - $all_sallesdata->new_sell_price;
                 if ($da == 0) {
                   echo "whole sale";
                 }else{
                  echo "retail sale";
                 }
               ?>
    </td>
    <td style="font-size: 12px;"><?php  echo  $all_sallesdata->creat; ?></td>
  </tr>
 <?php endforeach; ?>
 <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size: 13px;">Sales:</th>
   <th style="border: none;font-size: 13px;"><?php echo number_format($total_mauzo_pita->total_sell); ?>/=</th>
   <th style="border: none"></th>
 </tr>
 <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size: 13px;">Profit:</th>
   <th style="border: none;font-size: 13px;"><?php echo number_format($total_profits->total_profit);  ?></th>
   <th style="border: none"></th>
 </tr>
</table>
<p><b>Seller Sumary</b></p>
<table>
   <?php foreach ($seller_data as $seller_datas): ?>
  <tr>
    <td><b><?php echo $seller_datas->full_name; ?></b></td>
    <td><b><?php echo number_format($seller_datas->total_mauzo); ?></b></td>
  </tr>
  <?php endforeach; ?>
</table>
  </div>

</div>

</body>
</html>




