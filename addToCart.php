<?php
session_start();

$cart = [];

if(isset($_POST['addToCartButton'])){
        $id = $_POST['addToCart'];
        echo "<div>" .$id . "</div>";
        array_push($_SESSION, $id);
        echo 
        var_dump($_SESSION);
      }
      var_dump($items);
      
      ?>