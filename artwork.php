<?php 
session_start();
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]
	$dsn = getenv('MYSQL_DSN');
    $user = getenv('MYSQL_USER');
    $pw = getenv('MYSQL_PASSWORD');
 	$db = new PDO($dsn, $user, $pw);

		$page_title= "Artwork";
		include "header.php";
		include "nav.inc";?>
		
		<main>
		<div style="text-align: center;">
		<?php
		$filename = $_GET['filename'];
		
		$statement = $db->prepare("select*from artwork where filename = '$filename'");
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		
		while ($r = $statement->fetch()) 
		{
			print "<h2>Image Title: {$r['title']}</h2>";
            print "<h3>Image Category: {$r['category']}</h3>";
			print "<h3>Author: {$r['username']}</h3>";
            print "<h3>Tags: {$r['tags']}</h3>";
			print "<img src = 'https://storage.googleapis.com/rocket-imgs/{$r['filename']}' style='max-width:1000px;'/>";
			print "<h3>Description:</h3>";
            print "<h4>{$r['description']}</h4>";
		}
		?>
	</div>
		</main>
		
		<?php include "footer.php"; ?>
	</div>
	</body>
</html>





