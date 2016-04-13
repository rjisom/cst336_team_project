
<?php 
//$session_start();
include 'includes/database.php';
$cartItem = $_SESSION["productId"];
var_dump($cartItem);
$totalPrice;
$totalHscore;




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
    <tr>
        <td>
           <?php echo $cartItem; ?> 
        </td>
        <td>
            Output product name here
        </td>
        <td>Output type</td>
        <td>Output Health Score</td>
        <td>Output Quanitity</td>
        <td> Output Price</td>
        <td>
        <form action="myCart.php">
        <input type="submit" value="Update" />
        <input type='number' id='addQuanity' value='1'><button onclick='cart.forEach(addQuanity)'>add to cart</button>
        </form>
            </td>
    </tr>
            
     
    
</table>


    <form action="products.php">
        <input type="submit" value="Return to Products Page" /> 
        </form>
        
    </body>
</html>