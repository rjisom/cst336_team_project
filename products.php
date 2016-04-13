<?php
session_start();
include 'includes/database.php';
$connection = getDatabaseConnection();
global $cart;
$cart = array();
/* 

*/
$form=$_POST['form'];
$form="shoe";
var_dump($form);

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
          echo "<td> <form action=" . $_SERVER['PHP_SELF'] . " method='post' />";
          echo "<input type='hidden' name='productId' value='" . $record['productId'] . "'/>";
          echo "<input type='button' name='addToCart' value='Add to cart'/></td>";
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
          echo "<td> <form action=" . $_SERVER['PHP_SELF'] . " method='post' />";
          echo "<input type='hidden' name='productId' value='" . $record['productId'] . "'/>";
          echo "<input type='button' name='addToCart' value='Add to cart'/></td>";
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
          echo "<td> <form action=" . $_SERVER['PHP_SELF'] . " method='post'/>";
          echo "<input type='hidden' name='productId' value='" . $record['productId'] . "'/>";
          echo "<input type='button' name='addToCart' value='Add to cart'/></td>";
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
      if(isset($_POST['addToCart'])){
        global $cart;
        $id = $_POST['productId'];
        echo $id;
        $cart.push($id);
        var_dump($cart);
      }
      var_dump($cart);
      ?>
    <div>
      <form action="myCart.php">
        <input type="submit" value="Go To Cart" />    
     </form>
     </div>
    <footer>
    </footer>
</body>
</html>