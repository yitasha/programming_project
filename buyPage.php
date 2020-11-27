<?php
session_start(); 
$page_title= "Buy";
# [START use_cloud_storage_tools] So images cant be retrieved from bucket
use google\appengine\api\cloud_storage\CloudStorageTools;
# [END use_cloud_storage_tools]
  
	// Instantiate your DB using the database host, port, name, username, and password
  $dsn = getenv('MYSQL_DSN');
  $user = getenv('MYSQL_USER');
  $pw = getenv('MYSQL_PASSWORD');

  //DB connection
  $db = new PDO($dsn, $user, $pw);
  $userid = $_SESSION['userid'];
  $city = $_SESSION['city'];

  if(!isset($_SESSION['userid']))
	{
		print "<script type='text/javascript'>
		alert('Please login first!');
		window.location.href = 'login.php';
	    </script>";
	}

include "./header.php"; 
include "./navbar.php";
?>

<!-- <form method="post">
Search: <input type="text" name="search_item"><br>
<select id="category" name="category">
    <option value="" selected disabled hidden>Choose Category</option>
    <option value="phone">phone</option>
    <option value="computer">computer</option>
  </select>
<input type="submit" name="submit">
</form> -->

<div class="row">
<form method ="post">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="input-group">
      <span class="input-group-addon">
      <select id="category" name="category">
      <option value="" selected disabled hidden>Choose Category</option>
      <option value="phone">phone</option>
      <option value="computer">computer</option>
    </select>
  </span>
      <input id = search type="text" class="form-control" name="search_item" placeholder="Search for an item">
      <span class="input-group-addon"><input id="buy_button"type="submit" name="submit"></span>
    </div>
  </div>
  <div class="col-md-2"></div>
  </form>
</div>

<?php
  if(isset($_POST['submit']))
  {
      $array = array();
      $search_functions_array_phone = array("description","phonename","price", "phonecond","brand","model","phoneos","phonecol");
      $search_functions_array_computer = array("pcname","pctype","pccon","pcbrand","pcgpu","pccpu","pcram","pcstorage","pcost","pccolor","description");

      // connect to database
    // Instantiate your DB using the database host, port, name, username, and password
      $dsn = getenv('MYSQL_DSN');
      $user = getenv('MYSQL_USER');
      $pw = getenv('MYSQL_PASSWORD');

      //DB connection
      $db = new PDO($dsn, $user, $pw);
      $searched_value = $_POST["search_item"];
      $splitWord_array = explode(" ",$searched_value);

      $selected_category = $_POST["category"];

      if($selected_category == 'phone'){
        foreach($splitWord_array as $key => $split_word){
          foreach($search_functions_array_phone as $key => $value){
              $statement = $db->prepare("select phoneid from phone where lower($value) LIKE '%$split_word%'");
              $statement->execute();
              $statement->setFetchMode(PDO::FETCH_ASSOC);
              while ($r = $statement->fetch()) 
              {
                  if (array_key_exists($r['phoneid'],$array)){
                      $counter = $array[$r['phoneid']];
                      $counter += 1;
                      $array[$r['phoneid']] = $counter;
                  }
                  else{
                      $array[$r['phoneid']] = 1;
                  }
              }
          }
        }

        arsort($array);
        $phone_array = array();
        foreach($array as $key => $value){
          $get_phone = $db->prepare("select * from phone where phoneid = $key");
          $get_phone->execute();
          $get_phone->setFetchMode(PDO::FETCH_ASSOC);
          while ($r = $get_phone->fetch()){
            $seller_id = $r['user_userid'];
            $get_seller_id_city = $db->prepare("select * from user where userid = $seller_id");
            $get_seller_id_city->execute();
            $get_seller_id_city->setFetchMode(PDO::FETCH_ASSOC);
            while($d = $get_seller_id_city->fetch()){
              if(strcasecmp($city,$d['city']) == 0){
                if(strcasecmp($userid,$seller_id) != 0)
                {
                  $phone_array[$key] = $key;
                  break;
                } 
              }
            }
          }   
        }
          print("<table class='table'>
          <tbody>");
          foreach($phone_array as $key => $value){
            $phone = $db->prepare("select * from phone where phoneid = $key");
            $phone->execute();
            $phone->setFetchMode(PDO::FETCH_ASSOC);
            while ($r = $phone->fetch()){ 
              print("<tr data-href='phoneProduct.php?productID={$r['phoneid']}&userID={$r['user_userid']}' >
              <td><img class='card-img-top' src='https://storage.googleapis.com/phoneimg/{$r['images']}' alt='productOne'></td>
              <td>{$r['phonename']}</td>
              <td>{$r['price']}</td>
              </tr>");
          }
        }
          print("</tbody>
          </table>");
      }
      elseif($selected_category == 'computer'){
          foreach($splitWord_array as $key => $split_word){
            foreach($search_functions_array_computer as $key => $value){
                $statement = $db->prepare("select computerid from computer where lower($value) LIKE '%$split_word%'");
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                while ($r = $statement->fetch()) 
                {
                    if (array_key_exists($r['computerid'],$array)){
                        $counter = $array[$r['computerid']];
                        $counter += 1;
                        $array[$r['computerid']] = $counter;
                    }
                    else{
                        $array[$r['computerid']] = 1;
                    }
                }
            }
        }
        arsort($array);
        $computer_array = array();
        foreach($array as $key => $value){
          $get_computer = $db->prepare("select * from computer where computerid = $key");
          $get_computer->execute();
          $get_computer->setFetchMode(PDO::FETCH_ASSOC);
          while ($r = $get_computer->fetch()){
            $seller_id = $r['user_userid'];
            $get_seller_id_city = $db->prepare("select * from user where userid = $seller_id");
            $get_seller_id_city->execute();
            $get_seller_id_city->setFetchMode(PDO::FETCH_ASSOC);
            while($d = $get_seller_id_city->fetch()){
              if(strcasecmp($city,$d['city']) == 0){
                if(strcasecmp($userid,$seller_id) != 0)
                {
                  $computer_array[$key] = $key;
                  break;
                } 
              }
            }
          }   
        }

        print("<table class='table'>
        <tbody>");
        foreach($computer_array as $key => $value){
          $comp = $db->prepare("select * from computer where computerid = $key");
          $comp->execute();
          $comp->setFetchMode(PDO::FETCH_ASSOC);
          while ($r = $comp->fetch()){ 
            print("<tr data-href='computerProduct.php?productID={$r['computerid']}&userID={$r['user_userid']}'>
            <td><img class='card-img-top' src='https://storage.googleapis.com/computerimg/{$r['images']}' alt='productOne'></td>
            <td>{$r['pcname']}</td>
            <td>{$r['price']}</td>
            </tr>");
        }
      }
        print("</tbody>
        </table>");
      }
      else{
      }

      // debuggin purpose
      // foreach($array as $key => $value){
      //   printf($key);
      //   printf(" ,Counter: ");
      //   printf($value);
      //   printf("<br>");
      // }
  }

  
?>
	<script>
    document.addEventListener("DOMContentLoaded", ()=>{
      const rows = document.querySelectorAll("tr[data-href]");
      rows.forEach(row =>{
        row.addEventListener("click", () => {
          window.location.href = row.dataset.href;
        });
      });
    });
  </script>

</div>
	<?php include "./footer.php"; ?>
</body>
</html>