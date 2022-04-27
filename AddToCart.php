<?php
session_start();
require "db.php";
$username =   $_SESSION['Username'];
$userId =  $_SESSION['id'];
if(empty($_SESSION['cart'])  ){
    $_SESSION['cart'] = array();
    $_SESSION['cart']['products']  = array();
}
  

$_SESSION['cart']['user'] =  $userId ;

$productId = $_POST['productId'];

if (isset($productId)) {

    // $sql = "SELECT * FROM 'fproduct' WHERE 'pid' =  '$productId' ";
    $sql = "SELECT * FROM fproduct WHERE pid = '$productId' ";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    $product = $result->fetch_assoc();
    // print_r($product);
    $pro  =  [
        'id' => $product['pid'],
        'name' => $product['product'],
        'price' => $product['price'],
        'description' => $product['pinfo'],
        'quantity' => 1
    ];

    // foreach ( $_SESSION['cart']['products']   as $key => $product) {
    //     if ( $product['pid'] ==   $product['id'] ) {
    //         $_SESSION['cart']['products'][$key]['quantity'] += 1 ;
    //     }else{
            
    //     }
       
    // }

    
   
    array_push(  $_SESSION['cart']['products'] , $pro);
  


    $_SESSION['message'] = "Item Added To Cart";
    

  
}


$subTotal = 0 ;
foreach ($_SESSION['cart']['products']   as $key => $product) {
    $subTotal += $product['price'] * $product['quantity'] ;
}
$_SESSION['cart']['subtotal'] =   $subTotal ;


$removeProductId =  $_GET['removeProduct'];

if ( isset($removeProductId) && !empty($removeProductId) ) {
    # code...
    $cart = $_SESSION['cart'];
$index = "";

    foreach ($cart['products'] as $key => $item) {
        if ($item['id'] ==  $removeProductId) {
            $index = $key;
           
        }
    }

unset($cart['products'][$index]);
$_SESSION['cart'] = $cart;
$_SESSION['message']  = "Item Removed from Cart";
}


function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
header("location: " . $_POST['url']);
