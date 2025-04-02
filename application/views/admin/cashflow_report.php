
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Today Use</title>
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
        <p style="font-size:12px;"><?php echo $shop->shop_name; ?><br>
        <?php echo $shop->po_box; ?> <?php echo $shop->location; ?><br>
        Mob: <?php echo $shop->phone; ?>
        </p> 
         <p style="font-size:12px;"><b>TODAY USE</b></p>
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
    <th style="font-size:12px;">S/No.</th>
    <th style="font-size:12px;">Name</th>
    <th style="font-size:12px;">Description</th>
    <th style="font-size:12px;">Amount</th>
    <th style="font-size:12px;">Time</th>
  </tr>
   <?php echo $no =1; ?>
  <?php foreach ($data_cash as $data_cashs): ?>
    
 
 <tr>
    <td style="font-size:12px;"><?php echo $no++; ?></td>
    <td style="font-size:12px;"><?php echo $data_cashs->full_name; ?></td>
    <td style="font-size:12px;"><?php echo $data_cashs->description; ?></td>
    <td style="font-size:12px;"><?php echo number_format($data_cashs->price); ?></td>
    <td style="font-size:12px;"><?php echo $data_cashs->created; ?></td>
  </tr>
 <?php endforeach; ?>
  <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size:12px;">Total cashin:</th>
   <th style="border: none;font-size:12px;"><?php echo number_format($data_cashin->TotalItemsOrdered); ?>/=</th>
   <th style="border: none"></th>
 </tr>
 <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size:12px;">Direct Expenses:</th>
   <th style="border: none;font-size:12px;"><?php echo number_format($total_expences->matumiz); ?>/=</th>
   <th style="border: none"></th>
 </tr>
 <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size:12px;">Indirect Expenses:</th>
   <th style="border: none;font-size:12px;"><?php echo number_format($today_indirect_exp->total_paytoday); ?>/=</th>
   <th style="border: none"></th>
 </tr>
 <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size:12px;">Toatal Sell capital:</th>
   <th style="border: none;font-size:12px;"><?php echo number_format($data_cashin->TotalItemsOrdered - ($today_profit->Totalprofit + $today_indirect_exp->total_paytoday)) ; ?>/=</th>
   <th style="border: none"></th>
 </tr>
 <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size:12px;">Profit:</th>
   <th style="border: none;font-size:12px;"><?php echo $today_profit->Totalprofit - $total_expences->matumiz; ?>/=</th>
   <th style="border: none"></th>
 </tr>
 <tr>
   <th style="border: none"></th>
   <th style="border: none"></th>
   <th style="border: none;font-size:12px;">Gross Total:</th>
   <th style="border: none;font-size:12px;"><?php echo ($today_profit->Totalprofit - $total_expences->matumiz) + ($data_cashin->TotalItemsOrdered - ($today_profit->Totalprofit + $today_indirect_exp->total_paytoday)); ?>/=</th>
   <th style="border: none"></th>
 </tr>
</table>
  </div>

</div>

</body>
</html>




