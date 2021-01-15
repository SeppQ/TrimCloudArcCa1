<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		
		<title>
		Trim
		</title>
		
		<style rel="stylesheet" type="text/css">
	
		</style>	
			<link href="styles/common.css" rel="stylesheet" type="text/css" />
			<link href="images/icon1.png" rel="shortcut icon" type="image/x-icon" />
			<link href="styles/gallery.css" rel="stylesheet" type="text/css" />
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
						<h1><u>Here is Some Pictures of Trim</u></h1>	
						<iframe src="images/trimcastle.jpg" name="gallery" id="gallery">
						<p>iframes are not supported by your browser.</p>
						</iframe>

						<table>
							<tr>
								<td><a href="images/oldprison.jpg" target="gallery"><img src="images/oldprison.jpg"/></a></td>
								<td><a href="images/church.jpg" target="gallery"><img src="images/church.jpg" /></a></td>
								<td><a href="images/yellowsteeple.jpg" target="gallery"><img src="images/yellowsteeple.jpg" /></a></td>
								<td><a href="images/town.jpg" target="gallery"><img src="images/town.jpg" /></a></td>
							</tr>
							<tr>
								<td><a href="images/cannon.jpeg" target="gallery"><img src="images/cannon.jpeg" /></a></td>
								<td><a href="images/trimhotel.jpg" target="gallery"><img src="images/trimhotel.jpg" /></a></td>
								<td><a href="images/angle.jpg" target="gallery"><img src="images/angle.jpg" /></a></td>
								<td><a href="images/sheepsgate.jpg" target="gallery"><img src="images/sheepsgate.jpg" /></a></td>
							</tr>
			
							<tr>
								
								<td><a href="images/maingate.jpg" target="gallery"><img src="images/maingate.jpg" />	</a></td>
								<td><a href="images/night.jpeg" target="gallery"><img src="images/night.jpeg" /></a></td>
								<td><a href="images/churchruins.jpg" target="gallery"><img src="images/churchruins.jpg" /></a></td>
								<td><a href="images/fishandchips.jpg" target="gallery"><img src="images/fishandchips.jpg" /></a></td>
							</tr>
							<tr>
								<td><a href="images/souhans.jpg" target="gallery"><img src="images/souhans.jpg" /></a></td>
								<td><a href="images/malthouse.jpg" target="gallery"><img src="images/malthouse.jpg" /></a></td>
								<td><a href="images/street1.jpg" target="gallery"><img src="images/street1.jpg" /></a></td>
								<td><a href="images/street2.jpg" target="gallery"><img src="images/street2.jpg" /></a></td>
							</tr>
							
						</table>		
						<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">         
							<input type="file" name="image" />
							<input type="submit" value="Upload Image"/>
						</form>      
					<hr>
					
					<?php
					require 'aws/aws-autoloader.php';

					use Aws\S3\S3Client;  
					use Aws\Exception\AwsException;
					
					
					try {

	
						
						
					$s3Client = new S3Client([						
						'region' => 'us-east-1',
						'version' => 'latest'
					]);	
						
					if(isset($_FILES['image'])){
						$file_name = $_FILES['image']['name'];   
						$temp_file_location = $_FILES['image']['tmp_name']; 
						
					$result = $s3Client ->putObject([
						'Bucket' => 'd00214215-bucket',
						'Key'    => $file_name,
						'SourceFile' => $temp_file_location			
					]);


					}
					} catch (S3Exception $e) {
					echo  $e->getMessage() . "\n";
					}
					
				
							
					try {						
						
						$results = $s3Client->getPaginator('ListObjects', [
						'Bucket' => 'd00214215-bucket'
						]);
					
						echo "<h1>Pictures Submited for publish </H1>";
						foreach ($results as $result) {
							foreach ($result['Contents'] as $object) {
								
								echo $object['Key'] . PHP_EOL . "<br>";
							}
						}
				
					}
					 catch (S3Exception $e) {
						echo $e->getMessage() . PHP_EOL;
					}							
							
								
								
								?>					
					
					
					
							<h2><u>Video on Trim</u></h2>	
							
							<iframe id="youtube" src="https://www.youtube.com/embed/dtnv8qF45Cs" frameborder="0" allowfullscreen></iframe>
	
					</article>
						<footer>
							&rarr;Trim&rarr;Co.meath&rarr;Trim Castle
						</footer>

		</main>
		<script>
		</script>	
	</body>
</html>