<!doctype html>

<html>
	<head>
		<title>Page not found</title>
	</head>
	<style>
		body{
			margin: 0;
		}
		.content{
			text-align: center;
		}
		.errorcode{
			font-size: 15px;
			position: fixed;
			bottom: 0;
			left: 46%;
		}
		h1{
			font-size: 50px;
		}
	</style>
	<body>
		<div class="content">
			<h1 style="text-decoration:underline;">
				404 ERROR PAGE
			</h1>
			<p>
				Page doesn't exists
			</p>
		</div>
		<div class="errorcode">
			<?php 
			$data = $_SESSION["data"];
			echo $data["ERROR_CODE"]."<br>".$data["TRACE"];
			?>
		</div>
	</body>
</html>