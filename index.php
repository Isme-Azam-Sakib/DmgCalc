<?php

	

	if (isset($_POST['submit'])) {
		$hp = $_POST['hp'];
		$cd = $_POST['cd'];
		$cdmg = $cd/100;
		$char = $_POST['drop'];

		switch ($char) {
			case "furina":
				$ult = $hp*0.298*(1 + $cdmg);
				$bonus = (($hp / 1000) * 0.007) / 100;
				$heal = ($hp*0.0816) + 940;
				$s1 = $hp * 0.1013 * (1 + $cdmg) * (1 + $bonus);
				$s2 = $hp * 0.0549 * (1 + $cdmg) * (1 + $bonus);
				$s3 = $hp * 0.1409 * (1 + $cdmg) * (1 + $bonus);
				break;
			case "yelan":
				// op
				break;
			default : "furina"  ;
		}
	}



?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="css/app.css" rel="stylesheet">
	<title>Damage Calculator</title>
</head>

<body>
	<div id="full-width">
		<h1>Damage Calculator</h1>
	</div>


	<div id="box" class="row text-center ">
		<div class="col-lg-4 col-sm-12container-sm inputs ">
			<h3>Inputs</h3>
			<form action="index.php" method="POST">
				<select name="drop"class="mb-3">
					<option value="furina">Furina</option>
					<option value="yelan">Yelan</option>
					<option value="raiden">Raiden</option>
					<option value="bennet">Bennet</option>
				</select>
				<input name="hp" type="text" class="form-control form-control-lg mb-3 " id="hp" value="<?php echo @$hp ; ?>" placeholder="Max Hp">
				<input name="cd" type="text" class="form-control form-control-lg mb-3 " id="cd" value="<?php echo @$cd ; ?>" placeholder="Crit DMG%">
				<button type="submit" class="btn col-lg-12" name="submit">Calculate</button>
			</form>
		</div>

		<div class="col-lg-4 col-sm-12container-sm skill">
			<h3>Skills</h3>
			<p>Summon 1 Dmg:  <span style="color:darkblue; font-weight:bold"><?php echo  "<br>". @$s1 ; ?> </span> </p>
			<p>Summon 2 Dmg:  <span style="color:darkblue; font-weight:bold"><?php echo  "<br>". @$s2 ; ?> </span> </p>
			<p>Summon 3 Dmg:  <span style="color:darkblue; font-weight:bold"><?php echo  "<br>". @$s3 ; ?> </span> </p>
			<p>Healing: <?php echo @$heal; ?> </p>
		</div>

		<div class="col-lg-4 col-sm-12container-sm burst">
			<h3>Burst</h3>
			<p>Raw Hydro Dmg: <?php echo "<br>". @$ult; ?></p>
			<p>Vaporize Dmg: <?php echo "<br>". @$ult*2; ?> </p>
		</div>
	</div>









</body>

</html>