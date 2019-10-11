<!DOCTYPE html>
<!--
Mena Shafik 
Created June 12,2015
Assignment 5
the result page where they take the information from the main page or the slang page and display the order accordingly
-->
<html>
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ek+Mukta">
      <link rel="stylesheet" href="css/timcss.css">
      <title>Tim Horton's Order</title>
   </head>
   <body>
      <h1>
         Thanks for the order. Here it is:
      </h1>
      <?php
      $coffee = $_POST['Coffees'];
      $cream = 0;
      $sugar = 0;
      $slang = 0;
      $coffee_price = 1.50;
      $cream_price = .20;
      $sugar_price = .20;
      $amount = 0.00;
      if (isset($_POST['Size']))
      {
         $sizes = $_POST['Size'];
      }
      else
      {
         $sizes = 'none';
      }
      
      if (isset($_POST['Size2']))
      {
         $sizes2 = $_POST['Size2'];
      }
      else
      {
         $sizes2 = 'none';
      }

      //$sizes2 = $_POST['Size2'];
      //echo $_POST['slang'];

      function Cream_Sugar($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price)
      {
         $amount = $amount + $coffee_price;
         if ($cream > 0)
         {
            echo '<img width="100" height="100" src="Images/plus.jpg" alt="" >';
            for ($x = 0; $x < $cream; $x++)
            {
               echo '<img width="100" height="100" src="Images/cream.jpg" alt="" >';
               $amount = $amount + $cream_price;
            }
         }
         if ($sugar > 0)
         {
            echo '<img width="100" height="100" src="Images/plus.jpg" alt="" >';
            for ($x = 0; $x < $sugar; $x++)
            {
               echo '<img width="100" height="100" src="Images/sugar.jpg" alt="" >';
               $amount = $amount + $sugar_price;
            }
         }
         return $amount;
      }

      function slang($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price, $slang)
      {
         $slang = $_POST['slang'];
         if ($slang == 1)
         {
            $cream = 1;
            $sugar = 1;
            $amount = Cream_Sugar($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price);
         } else if ($slang == 2)
         {
            $cream = 2;
            $sugar = 2;
            $amount = Cream_Sugar($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price);
         } else if ($slang == 3)
         {
            $cream = 3;
            $sugar = 3;
            $amount = Cream_Sugar($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price);
         } else if ($slang == 4)
         {
            $cream = 0;
            $sugar = 0;
            $amount = Cream_Sugar($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price);
         } else if ($slang == 5)
         {
            $cream = 0;
            $sugar = 1;
            $amount = Cream_Sugar($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price);
         } else if ($slang == 6)
         {
            $cream = 0;
            $sugar = 2;
            $amount = Cream_Sugar($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price);
         } else if ($slang == 7)
         {
            $cream = 0;
            $sugar = 3;
            $amount = Cream_Sugar($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price);
         }
         return $amount;
      }

      for ($i = 0; $i < $coffee; $i++)
      {
         echo '<div> <fieldset id="result">';
         if ($sizes == "Small")
         {
            $cream = $_POST['Creams'];
            $sugar = $_POST['Sugars'];
            echo '<img width="100" height="100" src="Images/cup.jpg" alt="" >';
            $amount = Cream_Sugar($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price);
         } 
         else if ($sizes == "Medium")
         {
            $cream = $_POST['Creams'];
            $sugar = $_POST['Sugars'];
            echo '<img width="100" height="150" src="Images/cup.jpg" alt="" >';
            $amount = Cream_Sugar($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price);
         } 
         else if ($sizes == "Large")
         {
            $cream = $_POST['Creams'];
            $sugar = $_POST['Sugars'];
            echo '<img width="100" height="200" src="Images/cup.jpg" alt="" >';
            $amount = Cream_Sugar($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price);
         } 
         else if ($sizes == "X-Large")
         {
            $cream = $_POST['Creams'];
            $sugar = $_POST['Sugars'];
            echo '<img width="125" height="225" src="Images/cup.jpg" alt="" >';
            $amount = Cream_Sugar($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price);
         } 
         else if ($sizes2 == "Small")
         {
            echo '<img width="100" height="100" src="Images/cup.jpg" alt="" >';
            $amount = slang($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price, $slang);
         } 
         else if ($sizes2 == "Medium")
         {
            echo '<img width="100" height="150" src="Images/cup.jpg" alt="" >';
            $amount = slang($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price, $slang);
         } 
         else if ($sizes2 == "Large")
         {
            echo '<img width="100" height="200" src="Images/cup.jpg" alt="" >';
            $amount = slang($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price, $slang);
         } 
         else if ($sizes2 == "X-Large")
         {
            echo '<img width="125" height="225" src="Images/cup.jpg" alt="" >';
            $amount = slang($cream, $sugar, $amount, $coffee_price, $cream_price, $sugar_price, $slang);
         }
         echo "</fieldset> </div>";
      }
      $amount2 = $amount + ($amount * .12);
      ?>
      <fieldset id="options">
         <p id="end"><?php echo "Cost: $" . number_format((float) $amount, 2, '.', '') ." + tax = $" .number_format((float) $amount2, 2, '.', '') ;?></p>
      </fieldset>
      
   </body>
</html>
