<!DOCTYPE HTML>

<html>
<?php
session_start();
$_SESSION["soup"]=$_POST["soup"];
?>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname="good";
//連接資料庫
$conn = new mysqli($servername, $username, $password, $dbname);
//中文編碼
mysqli_query($conn, "SET CHARACTER SET utf8");
//副餐
$sql = "SELECT * FROM menu WHERE menu_type='C'";
$result = $conn->query($sql);
$i=0;
while($row = $result->fetch_assoc()) {
	$side[$i]=$row["menu_name"];
	$i++;
}
$num=mysqli_num_rows($result);
?>

<head>
		<title>附餐選擇</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="right-sidebar is-preload">
		<div id="page-wrapper">
			<!-- Header -->
			<div id="header">

				<!-- Inner -->
					<div class="inner">
						<header>
						<h1>附餐</h1>
						</header>
					</div>
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.php">取消點餐</a></li>
						</ul>
					</nav>
			</div>
				<!-- Main -->
				<div class="wrapper style1">
										<div class="container">
											<div class="row gtr-200">
												<div class="col-8 col-12-mobile" id="content">
													<article id="main">
														<?php
														//餐點選項按鈕
															echo "<form action='order-finish.php' method='post'>";
															echo "<br>副餐:";
															for($counter = 0; $counter < $num; $counter++)
																echo "<input type='radio' name='sidemeal' value='C0".($counter+1)."'>".$side[$counter];
															echo "<br><input type='submit' value='GO'></form>";
														?>		
													</article>
		</div>
										</div>
											</div>
												</div>
				</div>
</body>
</html>
