
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Salles Today</title>
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
        <?php $day = date('F-j-Y'); ?>
        <p style="font-size:12px;"> <?php echo $shop->shop_name; ?><br>
        <?php echo $shop->po_box; ?> <?php echo $shop->location; ?> <br>
        Mob: <?php echo $shop->phone; ?>
        </p> 
         <p style="font-size:12px;"><b>SALES TODAY REPORT / <?php echo $day; ?></b></p>
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
    <th style="font-size:12px;">No.</th>
    <th style="font-size:12px;">Seller</th>
    <th style="font-size:12px;">Customer</th>
    <th style="font-size:12px;">Product</th>
    <th style="font-size:12px;">Qty</th>
    <th style="font-size:12px;">Sell Price</th>
    <th style="font-size:12px;">Total Price</th>
    <th style="font-size:12px;">Profit</th>
    <th style="font-size:12px;">Status</th>
    <th style="font-size:12px;">Time</th>
  </tr>
    <?php $no =1; ?>
  <?php foreach ($all_salles as $all_sallesdata): ?>
    
 
 <tr>
  <td style="font-size:12px;"><?php echo $no++; ?></td>
    <td style="font-size:12px;"><?php echo $all_sallesdata->full_name; ?></td>
    <td style="font-size:12px;"><?php echo $all_sallesdata->customer; ?></td>
    <td style="font-size:12px;"><?php echo $all_sallesdata->name; ?></td>
    <td style="font-size:12px;"><?php echo $all_sallesdata->quanty; ?> <?php echo $all_sallesdata->unit; ?></td>
    <td style="font-size:12px;"><?php echo  number_format($all_sallesdata->new_sell_price) ; ?></td>
    <td style="font-size:12px;"><?php echo  number_format($all_sallesdata->total_sell_price) ; ?></td>
    <td style="font-size:12px;"><?php echo  number_format($all_sallesdata->profit) ; ?></td>
    <td style="font-size:12px;">
      <?php 
               $da = $all_sallesdata->ju_price - $all_sallesdata->new_sell_price;
                 if ($da == 0) {
                   echo "whole sale";
                 }else{
                  echo "retail sale";
                 }
               ?>
    </td>
    <td style="font-size:12px;">
      <?php //echo $all_sallesdata->created_at; ?>
         <?php echo  date('F, j, Y, g:j a', strtotime($all_sallesdata->created_at)) ?>
      </td>
  </tr>
 <?php endforeach; ?>
 
</table>
  </div>

</div>
   <h3>Sells Sumary</h3>
   <table>
    <tr>
      <th style="font-size:12px;">Sales Status</th>
      <th style="font-size:12px;">Sales Price</th>
      <th style="font-size:12px;">Profit</th>
    </tr>
     <tr>
       <td style="font-size:12px;">Retail Sales</td>
       <td style="font-size:12px;"><?php echo number_format($total_retail->Totalretail) ?>/=</td>
       <td style="font-size:12px;"><?php echo number_format($total_profit_retail->Totalprofitretail); ?>/=</td>
     </tr>
     <tr>
       <td style="font-size:12px;">Whore Sales</td>
       <td style="font-size:12px;"><?php echo number_format($total_whole->Totalwhole); ?>/=</td>
       <td style="font-size:12px;"><?php echo number_format($whole_profit->whole_profit); ?>/=</td>
     </tr>
     <tr>
       <th style="font-size:12px;"></th>
       <th style="font-size:12px;">Total Sales: <?php echo number_format($total_sell->TotalItemsOrdered); ?>/= </th>
         <th style="font-size:12px;"> Total Profit: <?php echo number_format($total_profit->Totalprofit);  ?>/= </th>
     </tr>
   </table>
   <p><b>Seller Sumary</b></p>
   <table>
     <?php foreach ($data_employee as $data_employees): ?>
     <tr>
       <td><b><?php echo $data_employees->full_name; ?></b></td>
       <td><b><?php echo number_format($data_employees->total_mauzo); ?></b></td>
     </tr>
     <?php endforeach; ?>
   </table>
</body>
</html>




