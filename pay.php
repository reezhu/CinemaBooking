<!DOCTYPE html>
<head>

		<title>payment</title>
		<link href="typesheet.css" type="text/css" rel="stylesheet"/>
		<script type="text/javascript" src="pay.js">
		
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
	Booking succeed!.
	</div>
</div>
<div id="contain" class="contain">


	<?php
	echo'
		<input id="fullname" type="hidden" name="fullname" value="'.$_POST['fullname'].'" >
		<input id="address" type="hidden" name="address" value="'.$_POST['address'].'" >
		<input id="requair" type="hidden" name="requair" value="'.$_POST['requair'].'" >
		
		<input id="film" type="hidden" name="film" value="'.$_POST['film'].'" >
		<input id="time" type="hidden" name="time" value="'.$_POST['time'].'" >
		';
	?>
	<?php
	

	$host = 'dragon.ukc.ac.uk';
	$dbname = 'wz57';
	$user = 'wz57';
	$pwd = 'eleamwa';
	$seats=str_split($_POST['seat'],3);

	foreach($seats as $value){

	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "insert into booking(row_no,performance,date_time,customer_name,customer_address) values('".$value."','".$_POST['film']."','".$_POST['time']."','".$_POST['fullname']."','".$_POST['address']."')";
		$handle = $conn->prepare($sql);
		$handle->execute();
		$conn = null;
		}catch (PDOException $e) {
		echo $e->getMessage();
		}}
	?>
	
	<?php
	if(isset($_POST['fullname'])){	
	$host = 'dragon.ukc.ac.uk';
	$dbname = 'wz57';
	$user = 'wz57';
	$pwd = 'eleamwa';
	$film="null";
	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select ticket_no,row_no,performance,date_time,customer_address from booking where customer_name='".$_POST['fullname']."' order by performance,date_time,row_no";
		$handle = $conn->prepare($sql);
		$handle->execute();
		$conn = null;
		$res = $handle->fetchAll();
		foreach($res as $row) {
			if($film=="null"){
			echo'
			<table class="containbox">
			<tr>
			<td rowspan=2>
				<div class="boximage">
					<img src="images/'.$row['performance'].'.jpg" width="100%" alt="'.$row['performance'].'"/>
				</div>
			</td>
			<td valign=top>
				<div class="boxtitle" >
					'.$row['performance'].'
				</div>
				<div class="boxintro">
			';
			$film=$row['performance'];
			}
			
			elseif($film!==$row['performance']){
			echo'
			</div>
			</td>
		</tr>
		</table>
			<table class="containbox">
			<tr>
			<td rowspan=2>
				<div class="boximage">
					<img src="images/'.$row['performance'].'.jpg" width="100%" alt="'.$row['performance'].'"/>
				</div>
			</td>
			<td valign=top>
				<div class="boxtitle" >
					'.$row['performance'].'
				</div>
				<div class="boxintro">
			';
			}
			echo '
					<p><button id="'.$_POST['fullname'].'" name="'.$row['ticket_no'].'" class="redbutton red " onclick="cancel(this.id,this.name)">cancel</button>
					'.$row['performance'].' | Time: '.$row['date_time'].'|Ticket number: '.$row['ticket_no'].' | Seat: '.$row['row_no'].'  |</p>
					';	
			$film=$row['performance'];
			}
		echo'
				</div>
			</td>
		</tr>
		</table>
		';
	} catch (PDOException $e) {echo $e->getMessage();}}
	?>
	
</div>
<div class="foot">
	<div class="copyright">
		CopyRight 2014 Ree All Rights Reserved.
	</div>
</div>



</body>
</html>