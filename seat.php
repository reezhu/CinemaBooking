<!DOCTYPE html>

<head>

		<title>SeatChoose</title>
		<link href="typesheet.css" type="text/css" rel="stylesheet"/>
		<script type="text/javascript" src="seat.js">
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
	<div class="guide" style="text-align: left;padding-left:100px;">
	<?php
	echo "Film name: ".$_POST['performance']." <br/> Show time: ".$_POST['dateOnShow'];
	?>
	</div>
</div>
<div class="contain">
	
	<?php
	$host = 'dragon.ukc.ac.uk';
	$dbname = 'wz57';
	$user = 'wz57';
	$pwd = 'eleamwa';
	$temp="no";
	$booked=Array();
	$priceA=Array();
	$price=0;


	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select basic_price from production where title='".$_POST['performance']."'";
		$handle = $conn->prepare($sql);
		$handle->execute();
		$conn = null;
		$priceA = $handle->fetchAll();
		foreach($priceA as $temp){$price=$temp['basic_price'];}
		
		
		$conntemp = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
		$conntemp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select row_no from booking where date_time='".$_POST['dateOnShow']."' and performance='".$_POST['performance']."'";
		$handle = $conntemp->prepare($sql);
		$handle->execute();
		$conntemp = null;
		$res = $handle->fetchAll();
		//create booked array
		$booked=$res;
		
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "select distinct s.row_no,s.area_name,t.price_multiplier from (seat s,tarea t )where s.area_name=t.name order by s.area_name,s.row_no ";
		$handle = $conn->prepare($sql);
		$handle->execute();
		$conn = null;
		$res = $handle->fetchAll();
		
		//echo image
		echo'
		<table class="containbox">
		<tr>
			<td rowspan=2>
				<div class="boximage">
					<img src="images/'.$_POST['performance'].'.jpg" width="100%" alt="fame"/>
				</div>
			</td>
			<td valign=top>
		';
		
		foreach($res as $row) {
			if($temp!=$row['area_name']){
				$temp=$row['area_name'];
				echo'<div class="seattitle">'.$row['area_name'].'</div>';}
			
				$n=false;
				foreach($booked as $reserved){
					if($reserved['row_no']==$row['row_no']){$n=true;}
				}
				//echo "<p>"+$n+"</p>";
			if($n){
				echo'<input class="seatbox2" type="button" name="'.$row['price_multiplier']*$price.'" title="'.$row['area_name'].'" value="'.$row['row_no'].'" onclick="seatReserved()" >';
			}else{
				echo'<input class="seatboxAvaliable" type="button" id="'.$row['row_no'].'" name="'.$row['price_multiplier']*$price.'" value="'.$row['row_no'].'" title="'.$row['area_name'].'" onclick="addtoBusket(this.value,this.title,this.name)"  >';
			}
		
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
	<div id="list" class="submit">

	</div>
	
	<div id="statement" >
	
	<div id="state" class="state">
	You have booked 0 tickets.<br/>
	Total amount is 0 Pounds.
	</div>
	<?php
	echo '
	<button id="submitbutton" class="redbutton red submitbutton" name="'.$_POST['performance'].'"  title="'.$_POST['dateOnShow'].'" onclick="checkout(this.name,this.title)">Check Out!</button> '
	?>
	</div>
	
	<div class="copyright">
		CopyRight 2014 Ree All Rights Reserved.
	</div>
</div>



</body>
</html>