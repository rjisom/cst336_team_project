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

$totalPrice;
$totalHscore;
$cartCount;
$itemTemp = [];
$cart=$_POST['$cartArray'];

if(isset($_POST['addToCartButton'])){
        $id = $_POST['addToCart'];
        echo "<div>" .$id . "</div>";
        array_push($itemTemp, $id);
        echo 
        var_dump($itemTemp);
      }
      var_dump($itemTemp);

?>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <script src="includes/project.js">
            str = JSON.stringify(cart);
            alert(str);
        </script>
        
<table>
    <caption>Your Shopping Cart:</caption>
    <tr border="2" style="width:100%">
        <th>Product Number</th>
        <th>Product Name</th>
        <th>Type</th>
        <th>Health Score</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    <?php  for($row=0;$row<5;$row++){
    echo '<tr>';

    
   
        echo '<td>' . "pruductid" . '</td>' . '<td>' . "productname" . '</td>' . '<td>' . "type" . '</td>' .'<td>' . "health score" . '</td>' .'<td>' . "quantity" . '</td>' . '<td>' . "price" . '</td>' . '<td>' . '<form action="myCart.php">' . "<input type='number' id='addQuanity' value='1'>" .
        '<input type="submit" value="Update" />' . 
        '</form>'. '<td>';
       


    echo '</tr>';
}
    ?>
</table>
<?php 

echo 'this is the cart' . $cart;
?>

    <form action="products.php">
        <input type="submit" value="Return to Products Page" /> 
        </form>
        
    </body>
</html>