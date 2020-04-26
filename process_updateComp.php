<?php
session_start();
# [START use_cloud_storage_tools]
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]
		// Instantiate your DB using the database host, port, name, username, and password
		$dsn = getenv('MYSQL_DSN');
        $user = getenv('MYSQL_USER');
        $pw = getenv('MYSQL_PASSWORD');

        $db = new PDO($dsn, $user, $pw);
        
        #update value from form inputs
        $computerid = $_POST['productID'];
        $pcname = $_POST['pcname'];
        $pctype = $_POST['pctype'];  
        $pccond = $_POST['pccond'];  
        $pcbrand = $_POST['pcbrand'];
        $pcgpu = $_POST['pcgpu']; 
        $pccpu = $_POST['pccpu']; 
        $pcram = $_POST['pcram']; 
        $pcstorage = $_POST['pcstorage'];   
        $pcos = $_POST['pcos'];  
        $pccolor = $_POST['pccolor'];  
        $description = $_POST['description']; 
        $price = $_POST['price'];
        
        //updating
		$statement = $db->prepare("UPDATE computer SET pcname='$pcname', pctype='$pctype', pccond='$pccond', pcbrand='$pcbrand', pcgpu='$pcgpu',pccpu='$pccpu', pcram='$pcram', pcstorage='$pcstorage', pcos='$pcos', pccolor='$pccolor', description='$description', price='$price' WHERE computerid = '$computerid'");
        
        if($statement->execute())
        {
			print "<script type='text/javascript'>
			alert('You have updated the product: $pcname');
			window.location.href = 'myProfilePage.php';
            </script>";
        }
        else
        {
            print "<script type='text/javascript'>
			alert('Update failed, try again later.');
			window.location.href = 'myProfilePage.php';
            </script>";
        }
		
?>