<?php
//include 'products.php';
session_start();
global $cart;

if(isset($_POST['addToCartButton'])){
        $id = $_POST['productId'];
        echo "<div>" . $id . "</div>";
        //array_push($itemTemp, $id);
        //var_dump($itemTemp);
        echo "<a href='products.php' />";
      }
      //var_dump($itemTemp);





/*
function displayAllProducts($sortBy)
{
    global $connection;
    $sql = "SELECT productId, productName, calories, price FROM Product ORDER BY productId"; 
    if($sortBy == 'descending')
    { $sql = $sql . " DESC"; }
    $records = getDataBySQL($connection, $sql);
    
        foreach ($records as $record) {
        $row['id'] = $record['productId'];
        $row['name'] = $record['productName'];
        $row['price'] = $record['price'];
        $row['calories'] = $record['calories'];

        echo "<tr id='". $row['id'] ."'><td>" .$row['name'] . "</td>" . "<td>" .$row['price'] . "</td>" .  "<td>" . $row['calories'] . "</td></tr>";
        }
}
  */  
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    </head>
    <body>
    
    <!--<button onclick="writeTable();">Create row</button>
      
      <table id="myTable">
          <tr>
            <td>Product ID</td>
            <td>Product Name</td>
            <td>Price</td>
            <td>Calories</td>
          </tr>
        </table>
      <script type="text/javascript">
        $(document).ready(function() {
             writeTable();            
        });-->s
    </script>
<br>
         </body>
</html>
    