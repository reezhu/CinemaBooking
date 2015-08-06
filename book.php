<!DOCTYPE html>

<head>

		<title>Booking</title>
		<link href="typesheet.css" type="text/css" rel="stylesheet"/>
		<script type="text/javascript" src="book.js">
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
			<a href="edit.php">-  Change order</a>
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
	Choose the film you want to see.
	
	
	</div>
</div>
<div class="contain">
	
	
	<?php
	$host = 'dragon.ukc.ac.uk';
	$dbname = 'wz57';
	$user = 'wz57';
	$pwd = 'eleamwa';
	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select title, intro from production";
		$handle = $conn->prepare($sql);
		$handle->execute();
		$conn = null;
		$res = $handle->fetchAll();
		foreach($res as $row) {
			echo '

			
		<table class="containbox">
		<tr>
		
			<td rowspan=2>
				<div class="boximage">
					<img src="images/'.$row['title'].'.jpg" width="100%" alt="fame"/>
				</div>
			</td>
			<td valign=top>
				<div class="boxtitle" onclick="alert["hey!"];">
					'.$row['title'].'
					<input class=boxbutton  name="'.$row['title'].'" type="button" value="Book now!" onclick="chooseFilm(this.name)">
				</div>
				<div class="boxintro">
					'.$row['intro'].'
				</div>
			</td>
		</tr>
		</table>
	';
			
			
			
		}
	} catch (PDOException $e) {
		echo $e->getMessage();

	}
	?>
	
	
</div>
<div class="foot">
	<div class="copyright">
		CopyRight 2014 Ree All Rights Reserved.
	</div>
</div>



</body>
</html>