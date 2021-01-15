<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		
		<title>
		Visit Trim Castle
		</title>
		
		<style rel="stylesheet" type="text/css">
						#button{
				text-align:center
			}
		</style>	
			<link href="styles/common.css" rel="stylesheet" type="text/css" />
			<link href="styles/visit.css" rel="stylesheet" type="text/css" />
			<link href="styles/history.css" rel="stylesheet" type="text/css" />
			<link href="images/icon1.png" rel="shortcut icon" type="image/x-icon" />
	</head>
	
	<body>
	
		<main>
		
			<header>
				<img src="images/1.jpg" >
			</header>
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="history.html">History</a></li>
						<li><a href="gallery.php">	Gallery</a></li>
						<li><a href="places.html">Places</a></li>
						<li><a href="visitcastle.php">Raffle</a></li>
					</ul>
				</nav>
					<article>	
						<form action="visitcastle1.php" method="post">
							<fieldset>
								<legend>Personal Detail</legend>
								
								<label class="identity" for="name" >Your First Name :</label>
								<input id="name" name="name" autofocus required required  placeholder=" your first name" > <br /><br />
								
								<label class="identity" for="surname" >Your Surname :</label>
								<input id="surname" name="surname" autofocus required required placeholder=" your Surname" > 	<br /><br />
								
								<label class="identity" for="adress" >Your address :</label>
								<input id="adress" name="adress" autofocus required required placeholder=" your adress" > <br /><br />
								
								<label class="identity" for="mobile" >Your mobile number :</label>
								<input id="mobile" name="mobile" autofocus required required  placeholder=" your mobile" > <br /><br />
								
								<label class="identity" for="email" >Your email address :</label>
								<input id="email" name="email" autofocus required required  placeholder=" Your email" > <br /><br />

								<label>County</label>
								<select id="county" name="county">
								<option value="Antrim">Antrim</option>
								<option value="Armagh">Armagh</option>
								<option value="Carlow">Carlow</option>
								<option value="Cavan">Cavan</option>
								<option value="Clare">Clare</option>
								<option value="Cork">Cork</option>
								<option value="Derry">Derry</option>
								<option value="Donegal">Donegal</option>
								<option value="Down">Down</option>
								<option value="Dublin">Dublin</option>
								<option value="Fermanagh">Fermanagh</option>
								<option value="Galway">Galway</option>
								<option value="Kerry">Kerry</option>
								<option value="Kildare">Kildare</option>
								<option value="Kilkenny">Kilkenny</option>
								<option value="Laois">Laois</option>
								<option value="Leitrim">Leitrim</option>
								<option value="Limerick">Limerick</option>
								<option value="Longford">Longford</option>
								<option value="Louth">Louth</option>
								<option value="Mayo">Mayo</option>
								<option value="Meath">Meath</option>
								<option value="Monaghan">Monaghan</option>
								<option value="Offaly">Offaly</option>
								<option value="Roscommon">Roscommon</option>
								<option value="Sligo">Sligo</option>
								<option value="Tipperary">Tipperary</option>
								<option value="Tyrone">Tyrone</option>
								<option value="Waterford">Waterford</option>
								<option value="Westmeath">Westmeath</option>
								<option value="Wexford">Wexford</option>
								<option value="Wicklow">Wicklow</option>
								</select><br/ >											
							</fieldset>
						
							<p id="button">
								<input id="submit" type="submit" value="Submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<input type="reset" value="RESET" />
							</p>	


								<h1> Raffle Attendance </h1>
								<?php
								require 'aws/aws-autoloader.php';
								use Aws\DynamoDb\DynamoDbClient;
								use Aws\DynamoDb\Exception\DynamoDbException;
								use Aws\DynamoDb\Marshaler;

								
								$sdk = new Aws\Sdk([
									'region'   => 'us-east-1',
									'version'  => 'latest'
								]);
								
								$dynamodb = $sdk->createDynamoDb();

								$marshaler = new Marshaler();

								$tableName = 'Raffles';
								$params = [
									'TableName' => $tableName
										];
									$a = 1;
								try {
									
									$result = $dynamodb->scan($params);
									foreach ($result['Items'] as $i) {
									$raffle = $marshaler->unmarshalItem($i);
									echo  "|".$a++."|". $raffle['firstName'] . $raffle['surName'] . "|" ."<br>";
									}


									} catch (DynamoDbException $e) {
									echo "Unable to add item:\n";
									echo $e->getMessage() . "\n";
									}
								
								?>
						
						</form>
					</article>
						<footer>
						&rarr;Trim&rarr;Co.meath&rarr;Trim Castle
						</footer>

		</main>
		<script>

		</script>	
	</body>
</html>