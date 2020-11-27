<?php 
session_start();
	$username = $_SESSION['username'];

$page_title= "contact user";


include "./header.php"; 
include "./navbar.php";
?>
    <div class="container">
        <form action="mailto:someone@example.com" method="post" enctype="text/plain" class = "emailForm">
        <div class="row email_form_row">
            <div class="col-md-6 emailColumn">
                E-mail:
                <input type="text" name="mail">
                <small id="emailHelp" class="form-text text-muted">Required</small>
            </div>
            <div class="col-md-6 emailColumnTwo">
                Name:
                <input type="text" name="name">
            </div>
        </div>
        <div class="row email_form_row">
            Subject:
            <input type="text" name="subject" class ="subject">
        </div>
        <div class="row email_form_row">
            Comment:
            <textarea class="form-control" name="comment" rows="4" style="width:98%"></textarea>
        </div>
        <div class ="row email_form_row">
            <input type="submit" value="Send">
        </div>
        </form>
    </div>

    

	<?php include "./footer.php"; ?>
</body>
</html>



