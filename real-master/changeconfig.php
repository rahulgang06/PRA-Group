<?php
require "create.php";
session_start();

$access_token=$_SESSION['access_token'];

  $user_name=$_SESSION['user'];
  echo($user_name);
  echo($access_token);
//$user_name="lekhana3003";
//$access_token="9ef6f907b8c4deb29052f04ccbae7c1bed725c9a";

                                       $characters=getusers($user_name,$access_token);
                                       
                                      foreach ($characters as $character) {
                                        echo $character['name'];
                                      }

if (isset($_GET['all_repo']))   //$repo_name=$_GET['repo_name'];
  $pre=$_GET['pre'];
   $post=$_GET['post'];
    $dev=$_GET['dev'];  
foreach ($characters as $character)
 {   
$repo_name=$character['name'];
$description=$character['description'];
$git_url=$character['git_url'];
$path_name=$repo_name.".yaml";
$date=date("M,d,Y h:i:s A");
 $yamlData="
    Metadata:
      Author:".$user_name."
      Git-repo".$git_url."
      Approval:
                Approved by:".$user_name."
                Approval-date:".$date."
    Job:
      Job-name:".$repo_name."
      Config:
          Preunit-test :".$pre.
          "Postunit-test :".$post.
          "Dev :".$dev;

$sha=getsha($user_name,$access_token,$repo_name,$path_name);

if ($sha!='') {
$sha=create_files_data($access_token,$username,$name,$url,$username,$yamlData);

}
 }
 }  
if (isset($_GET['change'])) {
  //$repo_name=$_GET['repo_name'];
  $pre=$_GET['pre'];
   $post=$_GET['post'];
    $dev=$_GET['dev'];  
  
$repo_name=$_GET['name'];
$description=$_GET['description'];
$git_url=$_GET['git_url'];
$path_name=$repo_name.".yaml";
$date=date("M,d,Y h:i:s A");
 $yamlData="
    Metadata:
      Author:".$user_name."
      Git-repo".$git_url."
      Approval:
                Approved by:".$user_name."
                Approval-date:".$date."
    Job:
      Job-name:".$repo_name."
      Config:
          Preunit-test :".$pre.
          "Postunit-test :".$post.
          "Dev :".$dev;

$sha=getsha($user_name,$access_token,$repo_name,$path_name);

if ($sha!='') {
$sha=create_files_update($access_token,$username,$name,$url,$username,$yamlData,$sha);
}
 }
  
echo(date("M,d,Y h:i:s A"));

?>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<style>
.form-control-borderless {
   border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
   border: none;
   outline: none;
   box-shadow: none;
}
body {
 font-family: Arial;
}

* {
 box-sizing: border-box;
}

div.card{
 margin-left: 200px;
 margin-top: 100px;
}

form.example input[type=text] {
 padding: 10px;
 font-size: 17px;
 border: 1px solid grey;
 float: left;
 width: 80%;
 background: #f1f1f1;
 /*border-top: 1800;*/
}

form.example button {
 float: left;
 width: 20%;
 padding: 10px;
 background: #2196F3;
 color: white;
 font-size: 17px;
 border: 1px solid grey;
 border-left: none;
 cursor: pointer;
}

form.example button:hover {
 background: #0b7dda;
}

form.example::after {
 content: "";
 clear: both;
 display: table;
}
.card{
 margin-right: 100px;
 box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}
#outer{
   width:100%;
   text-align: center;
   }
.inner{
   display: inline-block;
} 
</style>
</head>
<body>
 

  <div class="card">
   <div class="card-body" style="width:100%;">
     <div class="container">
       <br/>
     <div class="row justify-content-center">
                           <div class="col-12 col-md-10 col-lg-8">
                               <form class="card card-md" action="search2.php" method="GET">
                                   <div class="card-body row no-gutters align-items-center">
                                       <select class="custom-select" name="dir_id">
                                      
                                     </select>
                                   </div>
                               </form>
                           </div>
                       </div>
   </div>
   
   <br>
   <br>
   </div>
 </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   
</body>

