<!DOCTYPE html>

<head>

		<title>TimeChoose</title>
		<link href="typesheet.css" type="text/css" rel="stylesheet"/>
		<script type="text/javascript" src="time.js">
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
	Choose the time you want to see.
	</div>
</div>
<div class="contain">
	
	<?php
	echo'
		<table class="containbox">
		<tr>
		
			<td rowspan=2>
				<div class="boximage">
					<img src="images/'.$_POST['title'].'.jpg" width="100%" alt="fame"/>
				</div>
			</td>
			<td valign=top>
				<div class="boxtitle" >
					'.$_POST['title'].'
					
				</div>
	';
	$host = 'dragon.ukc.ac.uk';
	$dbname = 'wz57';
	$user = 'wz57';
	$pwd = 'eleamwa';
	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select date_time from performance where title='".$_POST['title']."'";
		$handle = $conn->prepare($sql);
		$handle->execute();
		$conn = null;
		$res = $handle->fetchAll();
		foreach($res as $row) {
	
	echo'
		<div class="boxintro">
		<input class="boxbutton" type="button" title='.$_POST['title'].' name="'.$row['date_time'].'" value="'.$row['date_time'].'" onclick="chooseTime(this.title,this.name)" >
		</div>
	';
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	
	echo'
	</td>
		</tr>
		</table>
	';
	?>
	
</div>
<div class="foot">
	<div class="copyright">
		CopyRight 2014 Ree All Rights Reserved.
	</div>
</div>



</body>
</html>