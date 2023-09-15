<?php
$repo_name = $_GET['repo_name'];
if (isset($_POST['createYaml']))
{
  $keepDependencies = $_POST['keepDependencies'];
  $canRoam = $_POST['canRoam'];
  $disabled = $_POST['disabled'];
  $Downstream = $_POST['Downstream'];
  $Uptream = $_POST['Uptream'];
  $concurrentBuild = $POST['concurrentBuild'];

 $yamlData = '<project>
<actions/>
<description/>
<keepDependencies>false</keepDependencies>
<properties/>
<scm class="hudson.scm.NullSCM"/>
<canRoam>true</canRoam>
<disabled>false</disabled>
<blockBuildWhenDownstreamBuilding>false</blockBuildWhenDownstreamBuilding>
<blockBuildWhenUpstreamBuilding>false</blockBuildWhenUpstreamBuilding>
<triggers class="vector"/>
<concurrentBuild>false</concurrentBuild>
<builders/>
<publishers/>
<buildWrappers/>
</project>';

}

?>

<script>
var xhr = new XMLHttpRequest();
var url = "127.0.0.1:12346/predict";
xhr.open("POST", url, true);
xhr.setRequestHeader("Content-Type", "application/json");
var data = JSON.stringify({"repo_name": <?php echo $repo_name ?>, "yamlData": "<?php echo $yamlData ?>"});
//xhr.send(data);
</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Team Elites</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
         margin-top: 100px;
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
       .navigation{
           margin-top:10px;
           margin-left:100px;
       }
       h3{
           margin-top:20px;
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
                  <a class="navbar-brand text-brand" href="index.php" font size="6">The<span class="color-b"  font size="6">Dragas</span></a><br/><br/><br/>
                  <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
                    data-target="#navbarTogglerDemo01" aria-expanded="false">
                    <span class="fa fa-search" aria-hidden="true"></span>
                  </button>
                </div>
              </nav>
<div class="card">
  <div class="card-body" style="width:100%;">
  <div class="container">
<div class="navigation">
<h3>CONFIGURE FILE SETTINGS</h3>
<form>
  <h4>Keep Dependencies</h4>
  <input type="radio" name="keepDependencies" value="true" checked> TRUE<br>
  <input type="radio" name="keepDependencies" value="false" > FALSE<br>
  <h4>Can Roam</h4>
  <input type="radio" name="canRoam" value="true" checked> TRUE<br>
  <input type="radio" name="canRoam" value="false" > FALSE<br>
  <h4>Disabled</h4>
  <input type="radio" name="disabled" value="true" checked> TRUE<br>
  <input type="radio" name="disabled" value="false" > FALSE<br>
  <h4>Block build downstream building</h4>
  <input type="radio" name="Downstream" value="true" checked> TRUE<br>
  <input type="radio" name="Downstream" value="false" > FALSE<br>
  <h4>Block build upstream building</h4>
  <input type="radio" name="Uptream" value="true" checked> TRUE<br>
  <input type="radio" name="Uptream" value="false" > FALSE<br>
  <h4>Concurrent Build</h4>
  <input type="radio" name="concurrentBuild" value="true" checked> TRUE<br>
  <input type="radio" name="concurrentBuild" value="false" > FALSE<br>
  <br>
  <input type="submit"  class="btn btn-lg btn-success" style="margin-left:400px;margin-top:20px; " name="createYaml" value="Create Template">
</form>    
</div>
</div>
</div>
</div>  
</body>
</html>