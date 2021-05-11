<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/all.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="margin:0">
    <p style="background-color:teal;padding:1.1em;margin:0;COLOR:white;border-bottom:2px solid pink;text-shadow:5px 4px green "><B style="float:left">MOMENTUM HOLDINGS (PVT) LTD POS</B>   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i style="float:right;font-size:80%">|<i class="fas fa-clock"></i>DATE: <?php
    $currentTimeinSeconds=time();
    $currentDate=date('Y-m-d',$currentTimeinSeconds);
                        echo ($currentDate);

                        ?>| TIME:<?php echo date("h:i:sa");?></i>

    </P>
  </body>
</html>
