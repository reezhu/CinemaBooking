<!DOCTYPE html>

<head>

		<title>Booking</title>
		<link href="typesheet.css" type="text/css" rel="stylesheet"/>
		<script type="text/javascript" src="detail.js">
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
	Type in your details.
	
	
	</div>
</div>
<div class="contain">
	<form class="form" action="payment.php" method="POST" name="detail" onsubmit="return check()">
	<label class="formoutput" for="name">Your name:	</label>
	<br>
	<input id="fullname" class="forminput" type="text" name="name" for="name" autofocus="autofocus" title="Please type in A-Z with 5-30 letters." pattern="[a-zA-Z ]{5,30} requaired" >
	<br>
	<label class="formoutput">Your address:</label>
	<br>
	<input id="address" class="forminput" row="4" cols="50" name="address" title="Please type in A-Z with 3-300 letters." pattern="[a-zA-Z ]{5,30} requaired">
	<br>
	<label class="formoutput">Other requairment:</label>
	<br>
	<input id="requair" class="forminput" row="4" cols="50" name="requair"></textarea>
<?php
	echo'
		<input id="seat" type="hidden" name="seats" value="'.$_POST['seats'].'" >
		<input id="film" type="hidden" name="film" value="'.$_POST['film'].'" >
		<input id="time" type="hidden" name="time" value="'.$_POST['time'].'" >
		<input type="hidden" name="number" value="'.$_POST['number'].'" >
		';
?>
	</form>

	<button id="confirmbutton" class="redbutton red confirmbutton" onclick="confirm()">Confirm</button>
	

	
	<?php
	$host = 'dragon.ukc.ac.uk';
	$dbname = 'wz57';
	$user = 'wz57';
	$pwd = 'eleamwa';
	$seats=str_split($_POST['seats'],3);
	$seat=join(",",$seats);
	try {

		$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select title, intro from production where title='".$_POST['film']."'";
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
				</div>
				<div class="boxintro2" >
					Seats booked: '.$seat.'<br>
					Time booked: '.$_POST['time'].'<br>
					Tickets in total: '.$_POST['number'].'<br>
					Amount in total: '.$_POST['money'].'<br>

				</div>
			</td>
		</tr>
		</table>
	';
		}
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