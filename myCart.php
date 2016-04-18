<?php 
/*
    CST 336 - Internet Programming
    Team Project
    @uthors: Alfredo Cortez, Richard Isom
    "myCart.php"
    
    This program displays data from the user selected items from products.php.

*/
session_start();

include 'includes/database.php';
$connection = getDatabaseConnection();
$totalPrice;
$totalHscore;
$cartCount;
$itemTemp = [];
$cart = $_SESSION['cartArray'];
$cartforDisplay = [];

function displayCart($cart){
    global $connection;
    $totalPrice = 0;
    $totalCalories = 0;
    $printArr = [];
    echo "<table id='productTable' border=1 width='600'>";
    echo "<tr>'"; 
    echo "<td> Id </td>";
    echo "<td> Name </td>";
    echo "<td> Type </td>";
    echo "<td> Health Score </td>";
    echo "<td> Price </td>";
    echo "<td> Calories </td>";
    echo "</tr>"; 
    
    for($i = 0; $i < count($cart); $i++)
    {
        $sql = "SELECT  `productId` ,  `productName` ,  `productDescription` ,  `productType` ,  `price` ,  `calories` ,  `healthyScore` , `createdAt` 
        FROM  `Product` 
        WHERE  `productId` = '". $cart[$i] . "'";
        $records = getDataBySQL($connection, $sql);
        foreach ($records as $record) {
            $totalPrice = $totalPrice + $record['price'];
            $totalCalories = $totalCalories + $record['calories'];;
            echo "<tr>"; 
            echo "<td>" . $record['productId'] . "</td>"; 
            echo "<td>" . $record['productName'] . "</td>"; 
            echo "<td>" . $record['productType'] . "</td>";
            echo "<td>" . $record['healthyScore'] . "</td>";
            echo "<td>" . $record['price'] . "</td>";
            echo "<td>" . $record['calories'] . "</td>";
            echo "<td> <form action='" . $_SERVER['PHP_SELF'] . "' method='post' >";
          echo "<input type='hidden' name='productId' value='".$record['productId'] . "'/>";
          echo "<input type='submit' name='removeCartButton' value='remove' /></form> </td>";
          echo "</tr>";
              
        }
    }
    echo "</table>";
    echo "<table border='1'>";
    echo "<tr><td>Total Price: $". money_format('%i', $totalPrice) . "</td></tr>";
    echo "<tr><td>Total Calories: ". $totalCalories . "</td></tr>";
    echo "</table>";
}



?>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
<table>
    <?php
    
    if(isset($_POST['removeCartButton'])){
        $id = $_POST['productId'];
        echo "<div>" . $id . "</div>";
        if($cartArray != null && in_array($id, $cartArray)){
            $cartArray = array_diff($cartArray, $id);
            //$cartArray = array_values($cartArray);
        }
        $_SESSION['cartArray'] = $cartArray;
      }
    
    /*for($row=0;$row<5;$row++){
        echo '<tr>';
            echo '<td>' . "pruductid" . '</td>' . '<td>' . "productname" . '</td>' . '<td>' . "type" . '</td>' .'<td>' . "health score" . '</td>' .'<td>' . "quantity" . '</td>' . '<td>' . "price" . '</td>' . '<td>' . '<form action="myCart.php">' . "<input type='number' id='addQuanity' value='1'>" .
            '<input type="submit" value="Update" />' . 
            '</form>'. '<td>';
           echo '</tr>';
        }*/
    displayCart($cart);

    ?>
</table>
<div>
<?php 

?>
</div>

    <form action="products.php">
        <input type="submit" value="Return to Products Page" /> 
        </form>
        
    </body>
</html>