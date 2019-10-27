<?php
//ob_start();
$sql =NULL; 
session_start();
if($_SESSION["login_id"])
{
 
}
else
{
  header("Location: index.php", TRUE, 301);
  die();
}


$db = mysqli_connect("localhost", "root", "", "vega");

  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
 // echo "Connected successfully";
 // try {

if ($_SESSION["who"] == "customer")
{
  // echo "in";
  //$_SESSION["login_id"] = $cust_id;
  // echo $_SESSION["login_id"];
  //echo $cust_id;
  $sql = "SELECT * from customer where cust_id = " .$_SESSION["login_id"]. "" ;
}
else if($_SESSION["who"] == "agent")
{
  // echo "in";
  //$_SESSION["login_id"] = $agent_id;
  // echo $_SESSION["login_id"];
  //echo $agent_id;
  $sql = "SELECT * from agent where agent_id = " .$_SESSION["login_id"]. "" ;
}
// else
// {
//   $id = $_SESSION["login_id"];
// }
// if (!isset($_SESSION['login_id']) ){
//  $id = $_SESSION["login_id"];  
// }
// else
// {
//   header("Location: index.php");
//   die();
// }
//$id = $_SESSION["login_id"];  
 //    $sql = "SELECT * from customer where cust_id = " . $login_id. "" ;
 // } catch (Exception $e) {
    
 // }
 // $sql = "SELECT * from customer where cust_id = " . $login_id. "" ;
 //  if ($db->query($sql) === TRUE) {x
 //       echo "Registration done";
 //       // header("Location: login_customer.php");
 //       // die();

 //   } else {
 //       echo "Error: " . $sql . "<br>" . $db->error;
 //       //$sql = "SELECT * from agent where agent_id = " . $login_id. "" ;
 //   }
 
 // if ($db->query($sql) === TRUE && $sql) {
    if ($sql != NULL)
    {
       // echo "Registration done";
       $result = $db->query($sql);
       // header("Location: login_customer.php");
       // die();
       if (($result->num_rows > 0))
      {
      // echo "in";
      // output data of each row
      while($row = $result->fetch_assoc()) 
        {
         // print_r($row);
         $_SESSION["name"] = $row["firstname"];
         // echo $_SESSION["name"];
        }
      } 
   } else {
       // echo "Error: " . $sql . "<br>" . $db->error;
   }


// print_r($_SESSION["login_id"]);
// print_r($_SESSION);
//session_destroy();
?>

<?php  
if(isset($_POST['life_bttn'])){
  $_SESSION['type_insurance'] =  $_POST['life_bttn'];
  header("Location: insurance_detail.php");
  die();
}
else if(isset($_POST['home_bttn'])){
  $_SESSION['type_insurance'] =  $_POST['home_bttn'];
  header("Location: insurance_detail.php");
  die();
}
else if(isset($_POST['car_bttn'])){
  $_SESSION['type_insurance'] = $_POST['car_bttn'];
  header("Location: insurance_detail.php");
  die();
}
// else{
//   $_SESSION['type_insurance'] = NULL;
//   header("Location: homepage_after.php");
//   die();
// }
?>

<!DOCTYPE html>
<html>
<head>
    <title>VEGA INSURANCE</title>
    <link rel="stylesheet" type="text/css"href="index.css">
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
                        <a class="nav-link" href="homepage_after.php">Home</a>
                    </li>
                                    <?php  
                      if($_SESSION['who'] == 'customer'){
                        echo " <li class='nav-item'>
                        <a class='nav-link' href='#our_policy'>Buy a Policy</a>
                        </li>
                        ";
                      }
                      ?>
        
                    <li class="nav-item">
                      <?php  
                      if($_SESSION['who'] == 'customer'){
                        echo "<a class='nav-link' href='contact_an_agent.php'>contact an agent</a>";
                      }
                      else if($_SESSION['who'] == 'agent'){
                        echo "<a class='nav-link' href='new_customer.php'>my customers</a>";
                      }
                      ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">about</a>
                    </li>
                    <li class="nav-item">
                      <?php
                      if($_SESSION['who'] == "customer")
                      {
                        echo "<button type='button' class='btn btn-primary' id='myBtn'>Welcome ".$_SESSION['name']."</button>";
                      }
                      else if($_SESSION['who'] == "agent")
                      {
                        echo "<button type='button' class='btn btn-primary' id='myBtn'>Welcome Agent ".$_SESSION['name']." </button>";
                      }
                      ?>                    
                    </li>
                </ul> 
        </div>
        </nav>
        
        
        
      
    
    </section>    
    
  <!------------------POPUP Register-------------->
     <!-- Button trigger modal-->


<div id="myModal" class="modal">
      <div class="modal-body">
        <div class="modal-content">
        <span class="close">&times;</span>
            <div class="modal-header" style=" justify-content: center; text-align: center;align-content: center ; border: none">
            <h3>Getting in touch with us easily</h3>
            </div>
        <div class="row">
            <div class="col"> 
                <div class="modal-body-customer"><a href="#" ><img style="width: 70%" src="img\user.png"></a> <h3>My profile</h3>
                </div>  
            </div>
            <div class="col"> 
                <div class="modal-body-agent"><a href="index.php"><img style="width: 70%" src="img\agenticon.png"></a> <h3>Logout</h3>
                </div> 
            </div>
        </div>    
       </div>
      </div>
</div>

<!------------------Banner------------------>
 <section id="banner">
     <div class="container">
     <div class="row">
     <div class="col-md-6">
        <p class="something"> You're in good hands...</p>  
        
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
     
     <img src="img\wave1.png" class="wave">
</section>
    

<?php  
if($_SESSION['who'] == 'customer'){
  echo "<section id='services'>
    <div  class='container'>
        <h3 class='service-h3'>Service your Policy</h3>
        
        
     <!--     <section id='policy_form'>
    <div class='container'>
        <div class='row'>
            <form class='policy_form'>
                <label style='font-size: 1.5rem; ' >Select the policy you want to service :       </label>
                <select>
                    <option>Life</option>
                    <option>House</option>
                    <option>Car</option>
                </select>
            </form>
        </div>
    </div>
    </section> -->
    
    <div class='row'>
            
           
        
        <div class='col-md-3 services'>
            <img src='img/renew.png' class='service-icon' data-modal='myModal1'>
            <p> Renew My Policy</p>
        </div>   <div class='col-md-3 services'>
            <img src='img/claim-status.png' class='service-icon' data-modal='myModal2'>
            <p> Claim Status</p>
        </div>  
        <div class='col-md-3 services'>
            <img src='img/fund-statement.png' class='service-icon' data-modal='myModal3'>
            <p>Fund Statement</p>
        </div>   <div class='col-md-3 services'>
            <img src='img/certificate.png' class='service-icon' data-modal='myModal4'>
            <p> Premium paid Certificate</p>
        </div>   
    </div>
    </div> 
</section>
    
    

<!----------------------POPUP-------------------------->
    <div id='myModal1' class='modal'>
      <div class='modal-body'>
        <div class='modal-content'>
        <span class='close'>&times;</span>
            <div class='modal-header' style=' justify-content: center; text-align: center;align-content: center ; border: none'>
            <h3>Policy Renwal</h3>
            </div>
        <div class='row'>
            <div class='col'> 
                <div class='modal-body-customer'>
                    <input type='date'>
                </div>  
            </div>
            <div class='col'> 
                <div class='modal-body-agent'><input type='date'>
                </div> 
            </div>
        </div>    
       </div>
      </div>
</div>
    <div id='myModal2' class='modal'>
      <div class='modal-body'>
        <div class='modal-content'>
        <span class='close'>&times;</span>
            <div class='modal-header' style=' justify-content: center; text-align: center;align-content: center ; border: none'>
            <h3>Claim Policy Status</h3>
            </div>
        <div class='row'>
            <div class='col'> 
                <div class='modal-body-customer'>
                    
                </div>  
            </div>
            <div class='col'> 
                
                </div> 
            </div>
        </div>    
       </div>
      </div>

    <div id='myModal3' class='modal'>
      <div class='modal-body'>
        <div class='modal-content'>
        <span class='close'>&times;</span>
            <div class='modal-header' style=' justify-content: center; text-align: center;align-content: center ; border: none'>
            <h3>Get Fund Statement</h3>
            </div>
        <div class='row'>
            <div class='col'> 
                <div class='modal-body-customer'>
            
                </div>  
            </div>
            <div class='col'> 
            
                </div> 
            </div>
        </div>    
       </div>
      </div>

    <div id='myModal4' class='modal'>
      <div class='modal-body'>
        <div class='modal-content'>
        <span class='close'>&times;</span>
            <div class='modal-header' style=' justify-content: center; text-align: center;align-content: center ; border: none'>
            <h3>Get Premium paid Certificate</h3>
            </div>
        <div class='row'>
            <div class='col'> 
                <div class='modal-body-customer'>
                    
                </div>  
            </div>
            <div class='col'> 

            </div>
        </div>    
       </div>
      </div>
</div>
<!-------------------WHY US?-------------------------->
<section id='about-us'>
    <div class='container'>
    <h3 class='service-h3'>Why Choose Us?</h3>
        <div class='row'>
        <div class='col-md-6 about-us'>
            <p class='about-title'> Why we are different</p>
                <ul>
                    
                    <li>Quicker Updates</li>
                    <li>Modifiable Policies</li>
                    <li>Quick Statement Retrival</li>
            
                </ul>
             
        </div>
        <div class='col-md-6'>
            <img src='img\whyus.png' class='img-fluid'>  
        </div>
        </div>
    </div>
</section>    
<!---------------------- Meet the Team--------------->
 <!---------------------- Meet the Team--------------->
     
    <div id='our_policy'></div>
        
    <section>
    <div class='container' style='align-content: center;justify-content: center;'>
        <div class='row welcome text-center'>
            <div class='col-12'>
                <h1 class='display-5'>Our Policies</h1>
            </div>
            <hr>
        </div>
    </div>
        
    <br>
<!---------------------Cards-------------------------------->
   <div class='contaier-fluid'>
    <div class='row'>
        <div class='col'>
            <div class='card'>
               <img class='card-imd-top' src='img\life-insurance.png'>
               <div class='card-body'>
                    <h4 class='card-title'>Life Insurance</h4>
                        <p class='card-text'>Elson is an well know agent who has been working with us since 4 years.</p>
                        <form  method='POST'  enctype='multipart/form-data'>
                          <!-- <a  onclick='loginalert()'>See Profile</a> -->
                          <button class='btn btn-outline-secondary' type='submit' value = 'life' name='life_bttn'>Buy Policy</button>

                        </form>
               </div>
            </div>
        </div>
        
        
          <div class='col'>
            <div class='card'>
               <img class='card-imd-top image-responsive' src='img\home-insurance.png'>
               <div class='card-body'>
                    <h4 class='card-title'>House Insurance</h4>
                        <p class='card-text'>Arushi is an well know agent who has been working with us since 4 years.</p>
                        <form  method='POST'  enctype='multipart/form-data'>
                          <!-- <a class='btn btn-outline-secondary' onclick='loginalert()'>See Profile</a> -->
                          <button class='btn btn-outline-secondary' class='button' type='submit' value = 'home' name='home_bttn'>Buy Policy</button>
                        </form>
               </div>
            </div>
        </div>
        
          <div class='col'>
            <div class='card'>
               <img class='card-imd-top' src='img\car-insurance.png'>
               <div class='card-body'>
                    <h4 class='card-title'>Car Insurance</h4>
                        <p class='card-text'>Arushi is an well know agent who has been working with us since 4 years.</p>
                       <form  method='POST'  enctype='multipart/form-data'>
                          <!-- <a class='btn btn-outline-secondary' onclick='loginalert()'>See Profile</a> -->
                          <button class='btn btn-outline-secondary' class='button' type='submit' value = 'car' name='car_bttn'>Buy Policy</button>
                        </form>
               </div>
            </div>
        </div>
        
        
    
        </div> </div>
    </section>";                
}
else if($_SESSION['who'] == 'agent'){
  echo "<p>Philosophy (from Greek φιλοσοφία, philosophia, literally 'love of wisdom')[1][2][3][4] is the study of general and fundamental questions[5][6][7] about existence, knowledge, values, reason, mind, and language. Such questions are often posed as problems[8][9] to be studied or resolved. The term was probably coined by Pythagoras (c. 570 – 495 BCE). Philosophical methods include questioning, critical discussion, rational argument, and systematic presentation.[10][11] Classic philosophical questions include: Is it possible to know anything and to prove it?[12][13][14] What is most real? Philosophers also pose more practical and concrete questions such as: Is there a best way to live? Is it better to be just or unjust (if one can get away with it)?[15] Do humans have free will?[16]

Historically, 'philosophy' encompassed any body of knowledge.[17] From the time of Ancient Greek philosopher Aristotle to the 19th century, 'natural philosophy' encompassed astronomy, medicine, and physics.[18] For example, Newton's 1687 Mathematical Principles of Natural Philosophy later became classified as a book of physics. In the 19th century, the growth of modern research universities led academic philosophy and other disciplines to professionalize and specialize.[19][20] In the modern era, some investigations that were traditionally part of philosophy became separate academic disciplines, including psychology, sociology, linguistics, and economics.

Other investigations closely related to art, science, politics, or other pursuits remained part of philosophy. For example, is beauty objective or subjective?[21][22] Are there many scientific methods or just one?[23] Is political utopia a hopeful dream or hopeless fantasy?[24][25][26] Major sub-fields of academic philosophy include metaphysics ('concerned with the fundamental nature of reality and being'),[27] epistemology (about the 'nature and grounds of knowledge [and]...its limits and validity'[28]), ethics, aesthetics, political philosophy, logic and philosophy of science.</p>";
}
?>
<!------------------SERVICES------------------------------->
    

   


    
    
    
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

                <p class="footer-company-name">Vega Insurance &copy; 2015</p>
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
<script>
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function loginalert(){
    window.scroll(0,0);
    window.alert("Login to access these Servies");
}



</script>

<script>

 var modalBtn = [...document.querySelectorAll(".service-icon")];
    modalBtn.forEach(function(btn){
        btn.onclick = function(){
            var modal = btn.getAttribute('data-modal');
            document.getElementById(modal).style.display = "block";
        }
    })
    
    
var closeBtn = [...document.querySelectorAll(".close")];
    closeBtn.forEach(function(btn){
       btn.onclick = function(){
           var modal = btn.closest('.modal');
           modal.style.display = "none";
       } 
    });


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target.className == "modal") {
    event.target.style.display = "none";
  }
}
    

    
    </script>
</body>
</html>