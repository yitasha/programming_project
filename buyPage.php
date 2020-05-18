<?php
session_start(); 
$page_title= "Home";
# [START use_cloud_storage_tools] So images cant be retrieved from bucket
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]

	// Instantiate your DB using the database host, port, name, username, and password
   # $dsn = getenv('MYSQL_DSN');
   # $user = getenv('MYSQL_USER');
   # $pw = getenv('MYSQL_PASSWORD');

    //DB connection
   # $db = new PDO($dsn, $user, $pw);

include "./header.php"; 
include "./navbar.php";
?>
<script>
    $(document).ready(function(e){
	      $('.search-panel .dropdown-menu').find('a').click(function(e) {
				e.preventDefault();
				var param = $(this).attr("href").replace("#","");
				var concept = $(this).text();
				$('.search-panel span#search_concept').text(concept);
				$('.input-group #search_param').val(param);
		   	});
	      });
var a = document.getElementByTagName('a').item(0);
$(a).on('keyup', function(evt){
  console.log(evt);
  if(evt.keycode === 13){
    
    alert('search?');
  } 
}); 
    </script>

<!-- Search bar -->
<div class="container">
  <div class="row">    
   <div class="col-xs-8 col-xs-offset-2">
    <form action="buy_process.php" method="post">
    <div class="input-group">
     <div class="input-group-btn search-panel">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        <span id="search_concept">Select Category</span> <span class="caret"></span>
      </button>
      <ul class="dropdown-menu scrollable-dropdown" role="menu">
        <li><a href="#">Phones </a></li>
        <li><a href="#">Computer</a></li>
      </ul>
     </div>
        <input type="hidden" name="search_param" value="all" id="search_param">
        <input type="text" class="form-control" name="x" id="search" placeholder="Item i am looking for">
        <span class="input-group-btn"><button class="btn btn-default" type="button"> <span class="glyphicon glyphicon-search"></span></button></span>
    </form>
    </div>
   </div>
  </div>
</div>

	

</div>
	<?php include "./footer.php"; ?>
</body>
</html>



