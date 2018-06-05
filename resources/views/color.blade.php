<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="">
		<legend>HEllo</legend>
		<p>
			Color:
		<input type="color" name="color">
		</p>
<p>
	Date:
	<input type="date" name="date"	>

</p>
<p>
	Month:
	<input type="month">
</p>
	</form>
	<form action="">
		Enter date before 1991: <br>
		<input type="date" name="bday" max="1991-01-06"><br><br>
		Enter a date after 2018: <br>
		<input type="date" name="bday" min="2018-12-12"><br>
		<input type="email" name="email"><br><br>
		<input type="datetime-local" name="bday"><br>
		Time:
		<input type="time"><br>
		<input type="submit" value="xac nhan">
	</form>
</body>
</html>