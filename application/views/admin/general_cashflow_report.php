
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>General cash flow Report</title>
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
        </p>
         <p style="font-size:12px;"><b>GENERAL CASH-FLOW REPORT </b></p>
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
    <th style="font-size:12px;">Description</th>
    <th style="font-size:12px;">Cash Out</th>
    <th style="font-size:12px;">Date</th>
  </tr>
  
  <?php foreach ($data as $datas): ?>
    
 
 <tr>
    <td style="font-size:12px;"><?php echo $datas->description; ?></td>
    <td style="font-size:12px;"><?php echo number_format($datas->price) ; ?></td>
    <td style="font-size:12px;"><?php echo $datas->created; ?></td>
  </tr>
 <?php endforeach; ?>
 <tr>
   <th style="border:none"></th>
   <th style="border:none"></th>
   <th style="border:none"><!-- Total Cash In : <?php //echo number_format($all_sell->TotalItemsOrdered); ?>/= --></th>
 </tr>
 <tr>
   <th style="border:none"></th>
   <th style="border:none"></th>
   <th style="border:none;font-size:12px;">Direct Expenses : <?php echo number_format($all_matumiz->matumiz); ?></th>
 </tr>

 <tr>
   <th style="border:none"></th>
   <th style="border:none"></th>
   <th style="border:none;font-size:12px;">Indirect Expenses : <?php echo number_format($inderect_expenses->total_paid_expenses); ?></th>
 </tr>
 <tr>
   <th style="border:none"></th>
   <th style="border:none"></th>
   <th style="border:none;font-size:12px;">Total paylor : <?php echo number_format($mishahara_data->mishahara); ?></th>
 </tr>

  <tr>
   <th style="border:none"></th>
   <th style="border:none"></th>
   <th style="border:none;font-size:12px;">Total Sells Capital : <?php echo number_format($all_sell->TotalItemsOrdered - $total_profit->total_profit - $inderect_expenses->total_paid_expenses); ?></th>
 </tr>
 <tr>
   <th style="border:none"></th>
   <th style="border:none"></th>
   <th style="border:none;font-size:12px;">Total profit : <?php echo number_format($total_profit->total_profit -($all_matumiz->matumiz + $mishahara_data->mishahara)); ?></th>
 </tr>
 <tr>
   <th style="border:none"></th>
   <th style="border:none"></th>
   <th style="border:none;font-size:12px;">Gross Total :  <?php echo number_format($total_profit->total_profit -($all_matumiz->matumiz + $mishahara_data->mishahara) + ($all_sell->TotalItemsOrdered - $total_profit->total_profit - $inderect_expenses->total_paid_expenses)); ; ?> </th>
 </tr>
</table>
  </div>

</div>

</body>
</html>




