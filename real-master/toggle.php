<?php
require "create.php";
session_start();

$access_token=$_SESSION['access_token'];

  $user_name=$_SESSION['user'];
$disp_snack=FALSE;

$snack_text = "";  
//$user_name="lekhana3003";
//$access_token="e80842a7732d141bc13c3545d926a1781c2f9613";
if (isset($_GET['save_all']))  
{ //$repo_name=$_GET['repo_name'];


  if(isset($_GET['pre']))
  {
    $pre="Yes";
  }
  else
  {
    $pre="No";
  }
   if(isset($_GET['post']))
  {
    $post="Yes";
  }
  else
  {
    $post="No";
  }
   if(isset($_GET['dev']))
  {
    $dev="Yes";
  }
  else
  {
    $dev="No";
  } 
     $characters=getusers($user_name,$access_token);
foreach ($characters as $character)
 {   
        $path_name=$character['name'].".yaml";
  $content=getcontents($user_name,$access_token,$character['name'],$path_name);
      if ($content=="") {
      continue;
      }
$repo_name=$character['name'];

$git_url=$character['git_url'];
//$path_name=$repo_name.".yaml";
$date=date("M,d,Y h:i:s A");
$yamlData="
    Metadata:
      Author:".$user_name."
      Git-repo:".$git_url."
      Approval:
                Approved by:".$user_name."
                Approval-date:".$date."
    Job:
      Job-name:".$repo_name."
      Config:
          Preunit-test :".$pre.
          "\n  Postunit-test :".$post.
          "\n  Dev :".$dev;

$sha="";
$shav=getsha($user_name,$access_token,$repo_name,$path_name);
if (!empty($shav)) {
  $sha=$shav['sha'];
}

if ($sha!='')
 {
  $url=$repo_name.".yaml";
$code=create_files_update($access_token,$user_name,$repo_name,$url,$yamlData,$sha);
  if($code!=200)
  {
    $disp_snack=true;
    $snack_text=" Not Updated successfully";
  }
  else
  {
  $disp_snack=true;
  $snack_text="Updated successfully";
   }
 }

else if (is_null($sha)) {
  # code...

$disp_snack=true;
$snack_text="Not Updatedmmm successfully";
}
 }
}
 



if (isset($_GET['save'])) {


  //$repo_name=$_GET['repo_name'];
  if(isset($_GET['pre']))
  {
    $pre="Yes";
  }
  else
  {
    $pre="No";
  }
   if(isset($_GET['post']))
  {
    $post="Yes";
  }
  else
  {
    $post="No";
  }
   if(isset($_GET['dev']))
  {
    $dev="Yes";
  }
  else
  {
    $dev="No";
  }
   
  
$repo_name=$_GET['repo_name'];
//$description=$_GET['description'];
$git_url=$_GET['git_url'];
$path_name=$repo_name.".yaml";
$date=date("M,d,Y h:i:s A");
 $yamlData="
    Metadata:
      Author:".$user_name."
      Git-repo:".$git_url."
      Approval:
                Approved by:".$user_name."
                Approval-date:".$date."
    Job:
      Job-name:".$repo_name."
      Config:
          Preunit-test :".$pre.
          "\n  Postunit-test :".$post.
          "\n  Dev :".$dev;
$sha="";
$shav=getsha($user_name,$access_token,$repo_name,$path_name);
if (!empty($shav)) {
  $sha=$shav['sha'];
}

if ($sha!='')
 {
  $url=$repo_name.".yaml";
$code=create_files_update($access_token,$user_name,$repo_name,$url,$yamlData,$sha);
  if($code!=200)
  {
    $disp_snack=true;
    $snack_text=" Not Updated successfully";
  }
  else
  {
  $disp_snack=true;
  $snack_text="Updated successfully";
   }
 }

else if (is_null($sha)) {
  # code...

$disp_snack=true;
$snack_text="Not Updated successfully";
}

}

  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Team Elites</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
   
    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
   
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
   
    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   
    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
   <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js" charset="UTF-8"></script><script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!------ Include the above in your HEAD tag ---------->
   
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
   <style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}
#snackbar {
    visibility: hidden; /* Hidden by default. Visible on click */
    min-width: 250px; /* Set a default minimum width */
    margin-left: -125px; /* Divide value of min-width by 2 */
    background-color: #333; /* Black background color */
    color: #fff; /* White text color */
    text-align: center; /* Centered text */
    border-radius: 2px; /* Rounded borders */
    padding: 16px; /* Padding */
    position: fixed; /* Sit on top of the screen */
    z-index: 1; /* Add a z-index if needed */
    left: 50%; /* Center the snackbar */
    bottom: 30px; /* 30px from the bottom */
}
/* Show the snackbar when clicking on a button (class added with JavaScript) */
.show_snack {
    visibility: visible !important; /* Show the snackbar */

/* Add animation: Take 0.5 seconds to fade in and out the snackbar.
However, delay the fade out process for 2.5 seconds */
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
.active, .collapsible:hover {
  background-color: #555;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding: 0 18px;
  max-height: 0;
  margin-top: 100px;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
.collapse1{
  margin-top: 200px;
  margin-left: 150px;
  margin-right: 150px;
}
.card{
 margin-right: 100px;
 box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.container1{
  margin-top: 20px;
  margin-bottom: 40px;
}
.yamlb{
  margin-top: 40px;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.menubar{
  margin-top:200px;
  margin-left:70px;
}
.card{
  margin-left: 100px;
 margin-right: 100px;
 box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

</style>
</head>
<body>
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
            aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
          </button>
          <a class="navbar-brand text-brand" href="index.php" font size="6">The<span class="color-b"  font size="6">Dragas</span></a><br/><br/><br/><br/>
          <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
            data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
          </button>
          <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
       <ul class="navbar-nav">
           <li class="nav-item">
           <a class="nav-link" href="logout.php">logout</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="home.php">Home</a>
         </li>
       </ul>
     </div> 
        </div>
      </nav>
<div class="card">
<div class="card-body" style="width:100%;">
<div class="container">
  <div class='menubar'>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name of Repository</th>
        <th>Post Test</th>
        <th>Pre Test</th>
        <th>Dev</th>
        <th>Update</th>
        <th>Update All</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $characters=getusers($user_name,$access_token);
                                     
    foreach ($characters as $character) {
      $content=""; 
      $path_name=$character['name'].".yaml";
      $content=getcontents($user_name,$access_token,$character['name'],$path_name);
      if ($content=="") {
      continue;
      }
      $content=base64_decode($content);
         $matches=explode(":",$content);  
         $pre=explode(" ",$matches[13])[0];
         $post=explode(" ",$matches[14])[0];  
         $dev=$matches[15]; 
         $pre=preg_replace('/\s+/', '', $pre);
         $post=preg_replace('/\s+/', '', $post);              
                                      ?>
      <tr>
        <form action="toggle.php" method="get">
        <td><?php echo $character['name']; ?></td>
        <td><label class="switch">
  <input type="checkbox" name="pre" <?php if ($pre=='Yes') {echo "checked";}?>>
  <span class="slider round"></span>&nbsp;
</label></td>
        <td><label class="switch" >
  <input type="checkbox" name="post" <?php if ($post=='Yes') { echo "checked";}?>  >
  <span class="slider round"></span>&nbsp;
</label></td>
        <td><label class="switch" >
  <input type="checkbox" name="dev" <?php if ($dev=='Yes') { echo "checked";}?>  >
  <span class="slider round"></span>&nbsp;
</label></td>
        <td> 
          <input type="hidden" name="git_url" value="<?php echo $character['git_url']; ?>">
          <input type="hidden" name="repo_name" value="<?php echo $character['name']; ?>">
          <input type="submit"  class="btn btn-lg btn-success"   name="save" value="Update"></td>
        <td><input type="submit"  class="btn btn-lg btn-success"  name="save_all" value="Update for all Repository"></td>
        </form>
      </tr>
      <?php 
    }


    ?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>
<div id="snackbar"><?= $snack_text ?></div>
</body>
<script type="text/javascript">
  <?php
  if($disp_snack)
{
  echo 'snack();';
}
?>
  function snack() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar")

    // Add the "show" class to DIV
    x.className = "show_snack";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show_snack", ""); }, 3000);
}

</script>
</html>

