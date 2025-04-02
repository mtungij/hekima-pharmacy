
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PRODUCT TRANSFOR REPORT</title>
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
        <b style="font-size:12px;"> 
          <?php $date = date("Y-m-d"); ?>
      
         PRODUCT TRANSFOR REPORT / <?php echo $date; ?> <b> 
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
    <th style="font-size:12px;">Seller</th>
    <th style="font-size:12px;">Product Name</th>
    <th style="font-size:12px;">Quantity</th>
    <th style="font-size:12px;">Date</th>
  </tr>
  
  <?php foreach ($trans as $transs): ?>
    
 
 <tr>
    <td style="font-size:12px;"><?php echo $transs->full_name; ?></td>
    <td style="font-size:12px;"><?php echo $transs->name; ?></td>
    <td style="font-size:12px;"><?php echo $transs->trans_qnty; ?></td>
    <td style="font-size:12px;"><?php echo $transs->trans_date; ?></td>
  </tr>
 <?php endforeach; ?>



</table>
  </div>

</div>

</body>
</html>




