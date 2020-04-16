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
        $computerid = $_SESSION['computerid'];
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

    //fileupload
    $imgname = $_FILES['image']['name']; //define name from img -> name
    $location = $_FILES['image']['tmp_name']; //store in tmp location and move later
  //Move uploaded image to google bucket: computer

    move_uploaded_file($location, 'gs://computerimg/'. $imgname); 
        //updating
		$statement = $db->prepare("UPDATE computer SET pcname=$pcname, images=$imgname,pctype=$pctype,pccond=$pccond,pcbrand=$pcbrand,pcgpu=$pcgpu,pccpu=$pccpu,pcram=$pcram,pcstorage=$pcstorage,
        pcos=$pcos,pccolor=$pccolor,description=$description,price=$price WHERE phoneid=$phoneid);
		$statement->execute();
			print "<script type='text/javascript'>
			alert('You have updated the product with, $phonename');
			window.location.href = 'index.php';
	        </script>";
		
?>