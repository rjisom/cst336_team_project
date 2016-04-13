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
$_SESSION = [];
$shoppingCart = new ItemList();
$cartArray=array();

/* 

*/
$form=$_POST['form'];
var_dump($form);

class ItemList{
    public $itemId;
    public $itemPrice;
    public $itemHealthScore;
    public $quanity;
    public $totalPrice;
    
    public $cart = [];

    public function make($itemId, $itemName, $itemPrice, $itemHealthScore, $quanity, $totalPrice) {
        $this->itemId = $itemId;
        $this->itemName = $itemName;
        $this->itemPrice = $itemPrice;
        $this->itemHealthScore= $itemHealthScore;
        $this->quanity = $quanity;
        $this->totalPrice = $totalPrice;
    }
  
    public function addItem($itemId, $itemName, $itemPrice, $quanity){
      array_push($cart, new ItemList($itemId, $itemName, $itemPrice, $itemHealthScore, $quanity, $totalPrice));
    }
}

/**
 * Display all Products from database
 *
 * @author Richard Isom
 * @returns nothing
 */
function displayAllProducts($sortBy)
{
    global $connection;
    $sql = "SELECT productId, productName, calories, price FROM Product ORDER BY productName"; 
    if($sortBy == 'descending')
    { $sql = $sql . " DESC"; }
    $records = getDataBySQL($connection, $sql);
    //$items = new ItemList();
    //$items->addItem($record['productId'], $record['productName'], $record['price'], $record['$quanity']);
        echo "<table border=1 width='600'>";
        echo "<tr>"; 
        echo "<td> Name </td>"; 
        echo "<td> Price </td>";
        echo "<td> Calories </td></tr>";
        echo "<tr>";
        foreach ($records as $record) {
          echo "<tr>"; 
          echo "<td>" . $record['productName'] . "</td>"; 
          echo "<td>" . $record['price'] . "</td>";
          echo "<td>" . $record['calories'] . "</td>";
          echo "<td> <form action='myCart.php' method='post' />";
          echo "<input type='hidden' name='addToCart' value='" . $record['productId'] . "'/>";
          echo "<input type='button' name='addToCartButton' value='add to cart'/></td>";
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
        echo "<td> Name </td>"; 
        echo "<td> Price </td>";
        echo "<td> Calories </td></tr>";
        echo "<tr>";
        foreach ($records as $record) {
          echo "<tr>"; 
          echo "<td>" . $record['productName'] . "</td>"; 
          echo "<td>" . $record['price'] . "</td>";
          echo "<td>" . $record['calories'] . "</td>";
          $cartArray=(array($record['productId']));
          echo "<td> <form action='myCart.php' method='post' />";
          echo "<input type='hidden' name='addToCart' value='" . $record['productId'] . "'/>";
          echo "<input type='button' name='addToCartButton' value='Add to cart'/></td>";
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
        echo "<td> Name </td>"; 
        echo "<td> Price </td>";
        echo "<td> Calories </td></tr>";
        echo "<tr>";
        foreach ($records as $record) {
          echo "<tr>"; 
          echo "<td>" . $record['productName'] . "</td>"; 
          echo "<td>" . $record['price'] . "</td>"; 
          echo "<td>" . $record['calories'] . "</td>";
          echo "<td> <form action='myCart.php' method='post' />";
          echo "<input type='hidden' name='addToCart' value='" . $record['productId'] . "'/>";
          echo "<input type='button' name='addToCartButton' value='Add to cart'/></td>";
          echo "</tr>";
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
</head>

<body>
    <script src="includes/project.js"></script>
    
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
      
      
      ?>
    <div>
      <?php echo $cartArray ?>
      <form action="myCart.php">
        <input type="submit" value="Go To Cart" />    
     </form>
     </div>
    <footer>
    </footer>
</body>
</html>