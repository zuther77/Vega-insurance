<?php
    // error_reporting(E_ERROR)// | E_WARNING | E_PARSE | E_NOTICE);
    session_start();
    print_r($_SESSION);
    $id = isset($_SESSION['city']);
    

    $db = mysqli_connect("localhost", "root", "", "vega");
      // Check connection
      if ($db->connect_error) {
       die("Connection failed: " . $db->connect_error);
      } 
      

    //   $new_sql = "SELECT agent_id FROM agent
    //           ORDER BY RAND()
    //               LIMIT 1";
    //   $new_result = $db->query($new_sql);
    //   // echo "number of rows: " . $new_result->num_rows;
    //   $new_row = $new_result->fetch_assoc();
    //   print_r($new_row);
    // $_SESSION['agent_assigned'] = $new_row['agent_id'];
            
?>
<!DOCTYPE html>
<html>
<head>
    <title>VEGA INSURANCE</title>
    <link rel="stylesheet" type="text/css"href="contact_agent.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</head>
<body>
    
<!------------------MENU------------------------------>
    <section id="nav-bar">
        
        <nav class="navbar navbar-expand-lg navbar">
        <a class="navbar-brand" href="#"><img src="img\logo.PNG"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <?php
                        if (isset($_SESSION["login_id"])){
                                                echo "<a class='nav-link' href='homepage_after.php'>Home</a>";
                                                }
                        else{
                                                echo "<a class='nav-link' href='index.php'>Home</a>";
                                                }?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">our policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_an_agent.php">contact an agent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">about</a>
                    </li>
                    <li class="nav-item">
                    <?php
                        if(isset($_SESSION['name'])   &&      $_SESSION['who'] == "customer"){
                                                echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalPush'>Welcome ".$_SESSION['name']."</button>" ;
                         }
                         else if(isset($_SESSION['name']) && $_SESSION['who'] == "agent")
                      {
                        echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalPush'>Welcome Agent ".$_SESSION['name']."</button>" ;
                      }
                        else{
                                                echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalPush'>Login/Register</button>" ; 
                        }
                    ?>
                    </li>
                </ul> 
        </div>
        </nav>
        
        
        
      
    
    </section>    
    
  <!------------------POPUP Register-------------->
     <!-- Button trigger modal-->


<!--Modal: modalPush-->
    <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content text-center">
        <div class="modal-header" style=" justify-content: center; text-align: center;align-content: center ; border: none">
         <?php
                        if(isset($_SESSION['name'])){
         echo "<h3>What can we do for you ".$_SESSION['name']."</h3>";
                    }
                    else{
         echo "<h3>Log in/Register As</h3>";               
                    }?>
        </div>
      <!--Body-->
      <div class="modal-body">
                 <?php
                        if(isset($_SESSION['name'])){
        echo "<div class='modal-body-customer'><a href='cust-form.php' ><img style='width: 50%' src='img\user.png'></a> <h3>My Profile</h3></div>
                  <div class='modal-body-agent'><a href='index.php'><img style='width: 50%' src='img\agenticon.png'></a> <h3>Logout</h3></div>" ;
              }
              else{
                 echo "<div class='modal-body-customer'><a href='cust-form.php' ><img style='width: 50%' src='img\user.png'></a> <h3>Customer</h3></div>
                  <div class='modal-body-agent'><a href='agent-form.php'><img style='width: 50%' src='img\agenticon.png'></a> <h3>Agent</h3></div>" ;
              }
          ?> 
      </div>

    </div>
  <!--/.Content-->
  </div>
</div>


<!------------------Banner------------------>
 <section id="banner">
     <div class="container">
     <div class="row">
     <div class="col-md-6">
        <p class="something">You have registered for <?php echo $_SESSION['type_insurance'];?> insurance</p>  
        <h3>Contact our agent</h3>
     </div>  
         
<!---------------IMAGE SLIDER---------------->
         <span class="col-md-6 text-center">
             
         <div id='slides' class="carousel slide" data-ride="carousel" data-interval="2000" data-wrap="true">
        <ol class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img src="img\home-banner.png">
             <div class="carousel-caption">
                <h3>HOME INSURANCE</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img\retirement-banner.png">
             <div class="carousel-caption">
                <h3>TRAVEL INSURANCE</h3>
            </div>
        </div>     
        <div class="carousel-item">
            <img src="img\startup-banner.png">
             <div class="carousel-caption">
                <h3>SOME INSURANCE</h3>
            </div>
        </div>
        </div>
        </div>
         </span>    
     </div>
     </div>
     
     <img src="img\wave.png" class="wave">
</section>
<!----------------------CONTENT--------------------->
    <div class="limiter">
        <div class="container-table100">

            <div class="wrap-table100">
                    <p>Note: Working hours of Office employees are 9 A.M. to 5 P.M.</p>
                    <div class="table">

                        <div class="rowheader">
                            <div class="cell">
                                First Name
                            </div>
                            <div class="cell">
                                Middle Name
                            </div>
                            <div class="cell">
                                Last Name
                            </div>
                            <div class="cell">
                                Phone No
                            </div>
                            <div class="cell">
                                Email
                            </div>
                            <div class="cell">
                                Works from
                            </div>
                        </div>
 <?php
 // echo "SELECT * FROM agent where city = '".$_SESSION['city']." '";
 $sql = "SELECT * FROM agent where city = '".$_SESSION['city']."' ";
      $result = $db->query($sql);
while($row = $result->fetch_assoc()) {
     if ($id == $row['city'] ){               
    echo "              

                        <div class='row_content'>
                            <div class='cell' data-title='Full Name'>
                                ".$row["firstname"]."
                            </div>
                            <div class='cell' data-title='Age'>
                                ".$row["middlename"]."
                            </div>
                            <div class='cell' data-title='Job Title'>
                                ".$row["lastname"]."
                            </div>
                            <div class='cell' data-title='Job Title'>
                                ".$row["phoneno"]."
                            </div>
                            <div class='cell' data-title='Job Title'>
                                ".$row["email"]."
                            </div>
                            <div class='cell' data-title='Job Title'>
                                ".$row["workfrom"]."
                            </div>
                        </div>";
                    }
                }
?>                       

                            
                    </div>
            </div>
        </div>
    </div>

<!----------------------------FOOTER------------------------------> 
     <footer class="footer-distributed">


            <div class="footer-left">



                <p class="footer-links">
                    <a href="#">Home</a>
                    ·
                    <a href="#">Blog</a>
                    ·
                    <a href="#">Pricing</a>
                    ·
                    <a href="#">About</a>
                    ·
                    <a href="#">Faq</a>
                    ·
                    <a href="#">Contact</a>
                </p>

                <p class="footer-company-name">Company Name &copy; 2015</p>
            </div>

            <div class="footer-center">

                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>21 Mahashankar Street</span> Mumbai, India</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>+1 555 123456</p>
                </div>

                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:support@company.com">support@company.com</a></p>
                </div>

            </div>

            <div class="footer-right">

                <p class="footer-company-about">
                    <span>Our Social Media</span>
                </p>

                <div class="footer-icons">

                    <a href="#"><i class="fa fa-facebook"></i><img src="img\instagram.png" height= "15" width = "15"></a>
                    <a href="#"><i class="fa fa-twitter"></i><img src="img\twitter.png" height= "15" width = "15"></a>
                    <a href="#"><i class="fa fa-linkedin"></i><img src="img\facebook.png" height= "15" width = "15"></a>
                    <a href="#"><i class="fa fa-github"></i><img src="img\google-plus.png" height= "15" width = "15"></a>

                </div>

            </div>

        </footer>
<script src="homepage.js"></script>

</body>
</html>