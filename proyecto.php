<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="StyleSheet1.css">
</head>
<body>

	<div class="center">
		<form method="post">
			<br><br>
			<input type="text" id="fname" name="fname">
			<input type="submit" value="Submit">
		</form>
	</div>

	<div class="extra1" id="info1" style="width: 49.68%; float:left">
		<?php include "extra.php"; ?>
	</div>

	<div class="extra2" id="info2" style="width: 49.68%; float:right">
		<?php include "extra2.php"; ?>
	</div>

	<div class="extra3" id="info3">
		<?php include "extra3.php"; ?>
	</div>

	<script>
			$('#submit').on('click', function(e) {
			e.preventDefault();
			$("#info1").load('extra.php');
			$("#info2").load('extra2.php');
			$("#info3").load('extra3.php');
		});

	</script>

	

</body>
</html>
