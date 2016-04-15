<?php
/*
    CST 336 - Internet Programming
    Team Project
    @uthors: Alfredo Cortez, Richard Isom
    "products.php"
    
    This program displays data from a localized database onto a web page.

*/
session_start();
include 'includes/database.php';
$connection = getDatabaseConnection();
global $cartArray;
$cartArray = [];
$cartArray = $_SESSION['cartArray'];
//$shoppingCart = new ItemList();

$productsArray=array();
var_dump($cartArray);

/* 

*/
$form=$_POST['productId'];
var_dump($form);

function passToCart(&$item, $itemId)
{
    foreach($item as $key->$value){
      echo $key . " " . $value;
    }
}
 /*
 function addToCart($itemId){
   global $connection;
   global $cartArray;
    $sql = "SELECT productId, productName, calories, price FROM Product ORDER BY productName"; 
    $records = getDataBySQL($connection, $sql);
    $item;
    echo "MEOW " .$itemId;
    foreach ($records as $record) {
      if($record['productId'] == $itemId){
        $id = $record['productId'];
        $name = $record['productName'];
        $price = $record['price'];
        $item = array("id" =>  $id, "name" =>  $name,  "price" =>  $price  );
      }
      array_push($cartArray, $item);
    }
    var_dump($cartArray);
 }

*/

/**
 * Display all Products from database
 *
 * @author Richard Isom
 * @returns nothing
 */
function displayAllProducts($sortBy)
{
    global $connection;
    $sql = "SELECT productId, productName, calories, price FROM Product ORDER BY productId"; 
    if($sortBy == 'descending')
    { $sql = $sql . " DESC"; }
    $records = getDataBySQL($connection, $sql);
    //$items = new ItemList();
    //$items->addItem($record['productId'], $record['productName'], $record['price'], $record['$quanity']);
        echo "<table id='productTable' border=1 width='600'>";
        echo "<tr>"; 
        echo "<td> Id </td>";
        echo "<td> Name </td>"; 
        echo "<td> Price </td>";
        echo "<td> Calories </td></tr>";
        echo "<tr>";
        $i = 1;
        foreach ($records as $record) {
          echo "<tr id=" . $i . ">"; 
          echo "<td>" . $record['productId'] . "</td>"; 
          $id = $record['productId'];
          //array_push($productsArray, $id);
          
          $productsArray['id'] = $record['productId'];
          $productsArray['name'] = $record['productName'];
          //var_dump($productsArray);
          echo "<td>" . $record['productName'] . "</td>"; 
          echo "<td>" . $record['price'] . "</td>";
          echo "<td>" . $record['calories'] . "</td>";
          //$item = new Item();
          //$item->addItem($record['productId'], $record['productName'], $record['price']);
          //var_dump($item);
          //passToCart($records, $record['productID'] );
          
          echo "<td> <form action='" . $_SERVER['PHP_SELF'] . "' method='post' >";
          echo "<input type='hidden' name='productId' value='".$record['productId'] . "'/>";
          echo "<input type='submit' name='addToCartButton' value='add' /></form> </td>";
          
          /*
          echo "<td> <form action='' method='post' />";
          echo "<input type='number' value ='1' name='value' id='" . $id . "' />";
          echo "<button onclick='addItem(document.getElementById('txtValue').value)'/></button></td>";
          */
          //echo "<input type='hidden' name='item[]' value='" . $i . "'/>";
          //echo "< id='" . $record['productId'] . "' button onclick='addItem()'>add to cart</button>" . '</td>';
          echo "</tr>";
          $i++;
        } 
        echo "</table>";
}

/**
 * Display all Products from database sorted by name
 *
 * @author Richard Isom
 * @returns nothing
 */
function displayByName($sortBy)
{
    global $connection;
    $sql = "SELECT productId, productName, calories, price FROM Product ORDER BY productName"; 
    if($sortBy == 'descending')
    { $sql = $sql . " DESC"; }
    $records = getDataBySQL($connection, $sql);
        echo "<table border=1 width='600'>";
        echo "<tr>"; 
        echo "<td> Id </td>";
        echo "<td> Name </td>"; 
        echo "<td> Price </td>";
        echo "<td> Calories </td></tr>";
        echo "<tr>";
        foreach ($records as $record) {
          echo "<tr>"; 
          echo "<td>" . $record['productId'] . "</td>"; 
          $id = $record['productId'];
          //array_push($productsArray, $id);
          
          $productsArray['id'] = $record['productId'];
          $productsArray['name'] = $record['productName'];
          //var_dump($productsArray);
          echo "<td>" . $record['productName'] . "</td>"; 
          echo "<td>" . $record['price'] . "</td>";
          echo "<td>" . $record['calories'] . "</td>";
          //$item = new Item();
          //$item->addItem($record['productId'], $record['productName'], $record['price']);
          //var_dump($item);
          //passToCart($records, $record['productID'] );
          echo "<td> <form action='" . $_SERVER['PHP_SELF'] . "' method='post' />";
          echo "<input type='hidden' name='itemX' value='" . $id . "'/>";
          echo "<button onclick='addItem(". $record['productName'] . "," . $record['price'] . "," . $record['calories'] . ")' value='add to cart' />" . '</td>';
          echo "</tr>";
        } 
        echo "</table>";
}

/**
 * Display all Products sorted by Price from database
 *
 * @author Richard Isom
 * @returns nothing
 */
function displayByPrice($sortBy)
{
  global $connection;
    $sql = "SELECT productId, productName, calories, price FROM Product ORDER BY price";
    if($sortBy == 'descending')
    { $sql = $sql . " DESC"; }
    $records = getDataBySQL($connection, $sql);
    //$items = new ItemList();
    //$items->addItem($record['productId'], $record['productName'], $record['price'], $record['$quanity']);
    
         echo "<table border=1 width='600'>";
         echo "<table border=1 width='600'>";
        echo "<tr>"; 
        echo "<td> Id </td>";
        echo "<td> Name </td>"; 
        echo "<td> Price </td>";
        echo "<td> Calories </td></tr>";
        echo "<tr>";
        foreach ($records as $record) {
          echo "<tr>"; 
          echo "<td>" . $record['productId'] . "</td>"; 
          echo "<td>" . $record['productName'] . "</td>"; 
          echo "<td>" . $record['price'] . "</td>";
          echo "<td>" . $record['calories'] . "</td>";
          $cartArray = array($record['productId']);
          echo '<td>' . "<form action='confirmation.php' method='post' />";
          echo "<input type='hidden' name='item[]' value='" . $record['productId'] . "'/>";
          echo "<input type='submit' name='addToCartButton' value='Add to cart '/>" . '</td>';
          echo "</tr>";
        } 
        echo "</table>";

}

/**
 * Display all Products sorted by Calories from database
 *
 * @author Richard Isom
 * @returns nothing
 */
function displayByCalories($sortBy)
{
  global $connection;
    $sql = "SELECT productId, productName, calories, price FROM Product ORDER BY calories";
    if($sortBy == 'descending')
    { $sql = $sql . " DESC"; }
    $records = getDataBySQL($connection, $sql);
    //$items = new ItemList();
    //$items->addItem($record['productId'], $record['productName'], $record['price'], $record['$quanity']);
    
         echo "<table border=1 width='600'>";
         echo "<table border=1 width='600'>";
        echo "<tr>"; 
        echo "<td> Id </td>";
        echo "<td> Name </td>"; 
        echo "<td> Price </td>";
        echo "<td> Calories </td></tr>";
        echo "<tr>";
        $i = 1;
        foreach ($records as $record) {
          echo "<tr>"; 
          echo "<td>" . $record['productId'] . "</td>"; 
          echo "<td>" . $record['productName'] . "</td>"; 
          echo "<td>" . $record['price'] . "</td>"; 
          echo "<td>" . $record['calories'] . "</td>";
          echo '<td>' . "<form action='confirmation.php' method='post' />";
          echo "<input type='hidden' name='addToCart' value='" . $i . "'/>";
          echo "<input type='submit' name='addToCartButton' value='Add to cart '/>" . '</td>';
          echo "</tr>";
          $i++;
        } 
        echo "</table>";
      
}

/*
function addToCart($productId){
  global $connection;
    $sql = "SELECT * FROM  `Product` WHERE  `productId`=" . $productId . " LIMIT 0 , 30";
    if($sortBy == 'descending')
    { $sql = $sql . " DESC"; }
    $records = getDataBySQL($connection, $sql);
  
}
*/

?>

<!DOCTYPE html>
<html>
<head>
  <title>Products</title>
  <link rel="stylesheet" type="text/css" href="assets/theme.css">
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>

<body>

  <div>
    <header>
      <h1>Product</h1>
    </header>
  </div>
    <div id="filterDiv">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="post" name="form">
          <div class"filterBy" border="1" >
                  <select name="dataFilter" id="dataFilter" tabindex="4" class="w3-rounded-corners2" style="color:Black;width:250px;">
              		<option value="0">--FILTER BY--</option>
              		<option value="1">Name</option>
              		<option value="2">Price</option>
              		<option value="3">Calories</option>
              		<input type="radio" name="sortBy" value="ascending"> Filter by Ascending
                  <input type="radio" name="sortBy" value="descending"> Filter by Descending
              		<input type="submit" value="Filter" name="filter">
  	            </select>
  	       </div>
  	  </form>
	  </div>
      <br /><br />    
      <?php
      
      if(isset($_POST['filter'])){
        $filterBy = $_POST['dataFilter'];
        $sortBy = $_POST['sortBy'];
        if($filterBy == "1"){
          displayAllProducts($sortBy);
        }
        else if($filterBy == "2"){
          displayByPrice($sortBy);
        }
        else if($filterBy == "3"){
          displayByCalories($sortBy);
        }
        else{
          displayAllProducts($sortBy);
        }
      }
      if(isset($_POST['addToCartButton'])){
        $id = $_POST['productId'];
        echo "<div>" . $id . "</div>";
        $cartArray[] =  $id;
        $_SESSION['cartArray'] = $cartArray;
        //array_push($itemTemp, $id);
        //var_dump($itemTemp);
      }
      var_dump($cartArray);
      
      ?>
    
    
    <div>
      <form action="myCart.php">
        <input type="submit" name="myCart" value="Go To Cart" method="post"/>    
       </form>
     </div>
    <footer>
    </footer>
</body>
</html>