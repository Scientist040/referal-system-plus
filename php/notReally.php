
<?php
// caution - dont remove these two lines. Thanks
// dev - unkownwallet404@gmail.com - allinonehausa@gmail.com - Khalifa Ali Ahmad Facebook
 include ('connect.php');
 include('questions.php');
if($_SERVER['REQUEST_METHOD'] == "POST")
{

  $password = $_POST['password'];

    if(!empty($password) &&  $password !== "1' or '1'='1")
      {
    
      $query = "select * from volunteers where password = '$password' limit 1";
    
      $result = mysqli_query($con,$query);

       if(mysqli_num_rows($result) > 0)
          {
        
           while($row = $result->fetch_assoc())
            {
             $user = $row;
            }
           if($user['status'] !== "Certified"){
            echo "<script>alert('volunteer not approved, wait for admin approval!'); window.history.back();</script>";
            die;
           }
          }
        else {
             echo "<script>alert('This volunteer is not available!'); window.history.back();</script>";
             die;
             }
     }
  else {
    echo "<script>alert('Type user info!'); window.history.back();</script>";
    die;
    }
}
  else {
    echo "<script>alert('Wrong request!'); window.location.assign('../volunteer-login.html');</script>";
    die;
  }   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1a54d23b69.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "css/scroll.css">
    <link rel = "stylesheet" type = "text/css" href = "css/volunteer.css">
    <title>Volunteer | Dashboard</title>
</head>
<body>
<img  class="logo" src="../fav.png">
<span class="user">
<i class = "far fa-user"></i>
  <span>
    <?php echo $user['fullname']?>
  </span>
  <i class = "fa-solid fa-arrow-down"></i>
</span>

<span class="title">Volunteer Dashboard</span>

<hr>
<br>
 <center>--- Questions ---</center>
    <br><br>
        <div class="question">
        <?php
        
    if(mysqli_num_rows($results) > 0)
    {
     while($rows = $results->fetch_assoc())
      {
        echo "<div class='details'><small><code>".$rows['id']."</code></small><br><br><b>".$rows['question']."</b><hr><small><i>question by ".$rows['contact']."</i></small></div><br>";
      }
 
 }
 else {
     echo "<div class='details'><small><code>null</code></small><br><br><b>null</b><hr><small><i>question by null</i></small></div>";
 }
 ?>
        </div>
     
    <br><br>
    <center>--- Write Answer ---</center>
    <br><br>
    
    <div class="answer">
        <input type="hidden" name="volunteer" id="volunteer" value="<?php echo $user['fullname']?>">
        <textarea  id="question" placeholder="write question here!"></textarea><br><br>
        <textarea placeholder="write answer here!" id="answer"></textarea><br><br>
        <button id="transac"><i class="fa fa-paper-plane"></i></button><br>
    <span id="a"></span>
    </div>
    <br>

<hr>
<br>
  <div class="copyright">
  Open Source<br><br><a href="https://github.com/Scientist040/tutorial"><i class="fa-brands fa-github "></i></a>
</div>
    <script src="transfer_qa.js"></script>
</body>
</html>