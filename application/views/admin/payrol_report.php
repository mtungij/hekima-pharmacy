
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>General paylor Report</title>
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
        <p> <?php echo $shop->shop_name; ?><br>
        <?php echo $shop->po_box; ?> <?php echo $shop->location; ?> <br>
        Mob: <?php echo $shop->phone; ?>
        </p>
         <p><b>GENERAL PAYROL REPORT </b></p>
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
    <th style="font-size: 12px;">Name</th>
    <th style="font-size: 12px;">Amount</th>
    <th style="font-size: 12px;">Date</th>
  </tr>
  
  <?php foreach ($pay_role as $pay_roles): ?>
    
 
 <tr>
    <td style="font-size: 12px;"><?php echo $pay_roles->full_name; ?></td>
    <td style="font-size: 12px;"><?php echo number_format($pay_roles->pay_amount); ?></td>
    <td style="font-size: 12px;"><?php echo $pay_roles->date; ?></td>
  </tr>
 <?php endforeach; ?>
 <tr>
   <th style="border:none"></th>
   <th style="border:none"></th>
   <th style="border:none;font-size:12px;">Total Payrol : <?php echo number_format($mishahara_data->mishahara); ?>/=</th>
 </tr>
</table>
  </div>

</div>

</body>
</html>




