<!DOCTYPE html>

<head>

		<title>Booking</title>
		<link href="typesheet.css" type="text/css" rel="stylesheet"/>
		<script type="text/javascript" src="delete.js">
		</script>

</head>

<body>
<div>
	<div class="logo" width=30% >
	<img src="images/logo.gif" width=100% alt="Logo"/>
	</div>
	<div class="headmenu">
		<ul>
			<b class="button">
			<a href="index.html"> - Homepage</a>
			</b>
			<b class="button">
			<a href="book.php">-Book ticket</a>
			</b>
			<b class="button">
			<a href="edit.html">-  Change order</a>
			</b>
			<b class="button">
			<a href="about.html">-   About   -</a>
			</b>
		</ul>
	<//img src="images/bgtext.png" width=100% alt="Logo"/>
	</div>
</div>

<div class="para">
	<div class="guide">
	Type in your name.<br>
	<form >
	<input id="fullname"  type="text" name="name" for="name" autofocus="autofocus" title="Please type in A-Z with 5-30 letters." pattern="[a-zA-Z ]{5,30} requaired" >
	<button id="confirmbutton" class="redbutton red " onclick="search()">search</button>
	
	</form>
	
	</div>
</div>
<div id="container" class="contain">
	
	
	
	<?php
	

	$host = 'dragon.ukc.ac.uk';
	$dbname = 'wz57';
	$user = 'wz57';
	$pwd = 'eleamwa';
	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "delete from booking where ticket_no='".$_POST['number']."'";
		$handle = $conn->prepare($sql);
		$handle->execute();
		$conn = null;
		
		
			echo '
		<table class="containbox">
		<tr>
		
			<td rowspan=2>
				<div class="boximage">
					<img src="images/dustbin.jpg" width="100%" alt="nothing"/>
				</div>
			</td>
			<td valign=top>
				<div class="boxtitle" >
					Your order has been canceled!
					
				</div>
				<div class="boxintro">
				<br/>
				<br/>
				<br/>
					canceled ticket number:'.$_POST['number'].'
					<br/>
					<br/>
					<br/>
					<p><button id="'.$_POST['name'].'"  class="redbutton red " onclick="search2(this.id)">Modify Other Bookings</button>
				</div>
			</td>
		</tr>
		</table>';	
		
	} catch (PDOException $e) {echo $e->getMessage();}
	?>
	
	
</div>
<div class="foot">
	<div class="copyright">
		CopyRight 2014 Ree All Rights Reserved.
	</div>
</div>



</body>
</html>