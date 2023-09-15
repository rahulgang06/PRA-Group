
<?php
session_start();
/*
if(isset($_SESSION['login']))
{
if ($_SESSION['login']==false) {

 header("Location: index.php");
}
else
{
  header("Location: home.php");
}
}*/
$html_url=$_GET['html_url'];
$name=$_GET['name'];

?><html>
<head>
  <meta charset="utf-8">
  <title>Team Elites Portfolio</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  
    .finaltestimonial{
      font-family: 'Capriola';
      margin-top:200px;
      margin-left:200px;
    }
  </style>
</head>
 <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">The<span class="color-b">Dragas</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br><br><br><br><br>
  <div class="finaltestimonial">
  <h3>Thank You for using our services!!</h3>
  <h4>Your Github link is: </h4>
  <div class="col-md-12 mg-bt-80">
      <input type="text" class="form-control" id="usr" size=50 value="<?php echo $html_url;?>"><br>
  </div>
  <button type="button" class="btn btn-primary btn-lg" onclick="window.location='http://localhost/real-master/home.php';">Go back to home page</button>
  <button type="button" class="btn btn-primary btn-lg" onclick="window.location='<?php echo $html_url;?>';">Go to URL</button>
  <script>
var xhr = new XMLHttpRequest();
var url = "http://localhost:3000/jenkins_create";
xhr.open("POST", url, true);
xhr.setRequestHeader("Content-Type", "application/json");
var data = JSON.stringify({"repo_name": "<?php echo $name;?>"});
//alert(data);
xhr.send(data);
var xhr = new XMLHttpRequest();
var url = "http://localhost:3000/jenkins_pipeline";
xhr.open("POST", url, true);
xhr.setRequestHeader("Content-Type", "application/json");
var data = JSON.stringify({"repo_name": "<?php echo $name;?>","url":"<?php echo $html_url;?>"});
xhr.send(data);


</script>
  </html>