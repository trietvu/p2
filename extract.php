<!DOCTYPE HTML>

<html>
	<head>
		<title>P2 - xkcd Password Generator</title>
		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link href="css/styles.css" rel="stylesheet" type="text/css" />
	</head>

	<body>

					 <?php
								$words =	explode(',',file_get_contents('files/crosswd.txt'))[rand(1,138000)];
								echo $words;
					 ?>
	</body>
</html>
