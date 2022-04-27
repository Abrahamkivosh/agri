<?php
session_start();
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>AgroCulture</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="./bootstrap/js/bootstrap.min.js"></script>
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="login.css" />
	<script src="./js/jquery.min.js"></script>
	<script src="./js/skel.min.js"></script>
	<script src="./js/skel-layers.min.js"></script>
	<script src="./js/init.js"></script>
	<noscript>
		<link rel="stylesheet" href="./css/skel.css" />
		<link rel="stylesheet" href="./css/style.css" />
		<link rel="stylesheet" href="./css/style-xlarge.css" />
	</noscript>
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->


</head>

<body class>

	<?php
	require 'menu.php';
	require "getCurrentUrl.php";
	function dataFilter($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>




	<div class="container">

		<div class="row">
			<table class="table table-striped table-inverse table-responsive">
				<thead class="thead-inverse">
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>SubTotal</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php

					foreach ($_SESSION['cart']['products'] as $key => $product) {

					?>
						<tr>
							<td scope="row"> <?php echo $product['name'] ?> </td>
							<td><?php echo $product['name'] ?></td>
							<td><?php echo $product['price'] ?></td>
							<td><?php echo $product['quantity'] ?></td>
							
							<td>
							Ksh <?php echo $product['quantity'] * $product['price']  ?>
							</td>
							<td>
							<a href='<?php echo  "./AddToCart.php?removeProduct=" . $product['id'];  ?>' class="nav-link text-danger"><i class="fas fa-trash"></i>
                                                    Remove</a>
							</td>
							
						</tr>
					<?php
					}
					?>
					<tr>
						<td>SubTotal</td>
						<td> <?php echo $_SESSION['cart']['subtotal']  ?> </td>
						
					</tr>
					<tr>
						<td>VAT</td>
						<td>
						Ksh <?php echo $_SESSION['cart']['subtotal'] * 0.16  ?> 
						</td>
					</tr>
					<tr>
						<td>
							Total
						</td>
						<td>
						Ksh <?php echo intval($_SESSION['cart']['subtotal']) + intval($_SESSION['cart']['subtotal']) * 0.16   ?>
						</td>
					</tr>
					

				</tbody>
				<tfoot>
					<tr>
						<th>
							<a name="" id="" class="btn btn-primary" href="./productMenu.php" role="button">  Continue shopping</a>
						</th>
						<th>
						<a name="" id="" class="btn btn-success" href="./process-request.php" role="button">  Checkout</a>

						</th>
					</tr>
				</tfoot>
			</table>

		</div>


	</div>








	<script>
		setTimeout(() => {
			$(".message").hide(5000).css({
				'display': "none"
			}).delay(5000)
		}, 5000);
	</script>

</body>

</html>