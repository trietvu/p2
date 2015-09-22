<!DOCTYPE HTML>

<html>
	<head>
		<title>P2 - xkcd Password Generator</title>
		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link href="css/styles.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div class="topBar">&nbsp;</div>
		<div class="container">
				<h1>xkcd Password Generator</h1>
				<div class="password">
					 <?php
							//Created function to pull random words from crosswd.txt file.
							function extractWord(){
								$words =	explode(',',file_get_contents('files/crosswd.txt'))[rand()];
								return $words;
								}

								//Condition to allow users to submit the number of words for the password.
								$i = 0;
								if(isset($_POST['numberWords'])){
									$numberWords = $_POST['numberWords'];
									//Condition to determine if the number of words field input is an integer
									if(ctype_digit($numberWords) == false){
										print '<p>Please type in a <u>whole number</u> between 1-9.</p>';
									}
								}
								else{
									//Default number of words when page is first loaded.
									$numberWords = 4;
								}

								//Checkbox option to add a number at the end of the string.
								if(isset($_POST['addNumber'])){
									$num = rand(1,9);
								}
								else{
									$num = '';
								}

								//Checkbox option to add a symbol at the end of the string.
								if(isset($_POST['addSymbol'])){
									$sym = array('!', '@', '#', '$', '%', '^', '&', '*', '(', ')');
									$symbol = $sym[array_rand($sym)];
								}
								else{
									$symbol = '';
								}

								//Condition to allow user to choose the type of spacing between words
								if(isset($_POST['spacing'])){
									$spacing = $_POST['spacing'];
									if($spacing == 'hyphen'){
										$sp = '-';
									}
									elseif ($spacing == 'space') {
										$sp = '&nbsp;';
									}
									else {
										$sp = '';
									}
								}
								else{
									$sp = '-';
								}

								//Loop to cycle through function to generate the number of words that user has inputted.
								while ($i++ < $numberWords){
									$wordy = extractWord();
									$wordy = preg_replace('/\s+/', '', $wordy);
									if($numberWords > 9){
										//Restricts user to no more than 9 words.
										echo 'Please select a number between 1-9.';
										break;
									}
									elseif($i < $numberWords ){
										//Condition to add a capital letter to each word
										if(isset($_POST['addCapital'])){
											$wordy = ucwords($wordy);
										}
										//Condition to remove spacing for CamelCase option
										elseif(isset($_POST['spacing'])){
										  $spacing = $_POST['spacing'];
										  if($spacing == 'camelCase'){
										    $wordy = ucwords($wordy);
										  }
										}
										else{
										}
										//Condition to make all words capital letters
										if(isset($_POST['allCaps'])){
											$wordy = strtoupper($wordy);
										}
										else{
										}
										print $wordy.$sp;
									}
									//Condition to add a capital letter in front of each word
									elseif($i = $numberWords){
										if(isset($_POST['addCapital'])){
											$wordy = ucwords($wordy);
										}
										//Condition to add a capital letter in front of each word for CamelCase option
										elseif(isset($_POST['spacing'])){
										  $spacing = $_POST['spacing'];
										  if($spacing == 'camelCase'){
										    $wordy = ucwords($wordy);
										  }
										}
										else{
										}
										//Condition to make all words all caps
										if(isset($_POST['allCaps'])){
											$wordy = strtoupper($wordy);
										}
										else{
										}
										print $wordy.$num.$symbol;
									}
									else
									print $wordy;
								}
					 ?>
				 </div>
				 <div class='conditions'>
					 <form method='POST' action='index.php'>
						<p>
					 		<label for='numberWords'>Number of words:</lable> <input type='int' name='numberWords'> (Max. of 9)<br><br>
						</p>
						<p>
							<input type='checkbox' name='addNumber' id='addNumber' value='1'>
							<label for='addNumber'>Add a number to the end of the password</label><br>
						</p>
						<p>
							<input type='checkbox' name='addSymbol' id='addSymbol' value='1'>
							<label for='addSymbol'>Add a symbol to the end of the password</label><br>
						</p>
						<p>
							<input type='checkbox' name='addCapital' id='addCapital' value='1'>
							<label for='addCapital'>Add a capital letter to the beginning of each word</label><br>
						</p>
						<p>
							<input type='checkbox' name='allCaps' id='allCaps' value='1'>
							<label for='allCaps'>Make all caps</label><br><br>
						</p>
						<p>
							<label for='allCaps'>Please choose the type of spacing between each word:</label><br><br>
							<input type='radio' name='spacing' id='spacing' value='hyphen' checked>
							<label for='hyphen'>Hyphen (Default)</label> &nbsp;&nbsp;&nbsp;&nbsp;
							<input type='radio' name='spacing' id='spacing' value='space'>
							<label for='space'>Space</label> &nbsp;&nbsp;&nbsp;&nbsp;
							<input type='radio' name='spacing' id='spacing' value='camelCase'>
							<label for='camelCase'>Camel Case (No space, first letter capitalize)</label><br><br>
						</p>
					 	<div class='submit'><input type='submit' value='Submit' class='pill'></div>
				 </form>bumpers1
			 </div>
		</div>
	</body>
</html>
