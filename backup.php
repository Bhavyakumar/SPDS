

          
        
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SPDS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="css/jquery.min.js"></script>
  <script src="css/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so   .sidenav can be 100% (adjust if needed) */
    body {
  font-family: Arial, Helvetica, sans-serif;
}
    .row.content {
        height: 100vh;


    }
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      display:none;
      position: absolute;
      left: 0;
      bottom: 0;
      height: 200px;
      width: 100%;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }

    .navbar {
  overflow: hidden;
  background-color: #333;
  }

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

  </style>
  <script>
    function footerAlign() {
          $('.footer').css('display', 'block');
          $('.footer').css('height', '50px');
          var footerHeight = $('footer').outerHeight();
          $('body').css('padding-bottom', footerHeight);
          $('.footer').css('height', footerHeight);
        }
      $(document).ready(function(){
        footerAlign();
      });
      $( window ).resize(function() {
        footerAlign();
      });
  </script>
</head>
<body>

<div class="container-fluid">
<div class="row content"> 

    <div class="col-sm-3 sidenav">
          <a href="https//www.aau.in"><img src="image/logo.jpg" style="width:20%;"></a><br>
          <h3><b>SPDS</b></h3>
          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="#section2">About</a></li>
              <li><a href="#section3">Contact us</a></li>
          </ul><br>
    </div>
    <div class="col-sm-9 ">
          <h1><b>Student Project Distribution System</b></h1>
    </div>
     <div class="navbar">
        <a href="#home">Home</a>
        <a href="#news">News</a>
        <div class="dropdown">
        <button class="dropbtn">Dropdown 
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
        </div> 
</div>

          
        


