<?php 
session_start();
$page_title= "Register";
	
include "./header.php"; 
include "./navbar.php";
?>

<div class="registerContainer">
	<h2>Register</h2>
	<div class="row">
	<form action="" method="post">
    <input type='text' id='username' name='username' value='$username - User Name Can Not Be Changed ' placeholder='Username' readonly><br>
	<tbody>
        <tr>
            <th scope='row'>Profile Picture</th>
            <input class= "myAvatar" type="image" src='imgs/profilePic.png' style="height:200px">
            <input type="file" name="newAvatar" id="newAvatar" style="display:none;">
        </tr>
    </tbody>
    <input type="submit" name="submit" value="Register"/><br/>
	</form> 
</div>
<script>
$(".myAvatar").click(function() {
    $("#newAvatar").trigger("click");
});
</script>

<?php include "./footer.php" ?>
</body>
</html>