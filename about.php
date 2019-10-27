<?php
session_start();
$id = isset($_SESSION["login_id"]);
// print_r($_SESSION);


// // session_unset();

?>
<!DOCTYPE html>
<html>
<head>
    <title>VEGA INSURANCE</title>
    <link rel="stylesheet" type="text/css"href="about.css">
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
                                                }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                                        if(isset($_SESSION['who'])){
                                                  if($_SESSION['who'] == 'customer'){
                                                    echo "<a class='nav-link' href='#'>our policy</a>";
                                                  }
                                                  else if($_SESSION['who'] == 'agent'){
                                                    echo "";
                                                  }}
                                        else
                                        {
                                            echo "<a class='nav-link' href='#'>our policy</a>";
                                        }
                        
                        ?>
                    </li>
                    <?php 
                    if(isset($_SESSION['who'])){
                    echo "<li class='nav-item'>";
                         
                        
                                                  if($_SESSION['who'] == 'customer'){
                                                    echo "<a class='nav-link' href='contact_an_agent.php'>contact an agent</a>";
                                                  }
                                                  else if($_SESSION['who'] == 'agent'){
                                                    echo "<a class='nav-link' href='new_customer.php'>my customers</a>";
                                                  }
                      
                    echo "</li>";}
                    else{

                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">about</a>
                    </li>
                     <li class="nav-item">
                      <?php
                      if(isset($_SESSION['who'])){
                      if($_SESSION['who'] == "customer")
                      {
                        echo "<button type='button' class='btn btn-primary' id='myBtn'>Welcome ".$_SESSION['name']."</button>";
                      }
                      else if($_SESSION['who'] == "agent")
                      {
                        echo "<button type='button' class='btn btn-primary' id='myBtn'>Welcome Agent ".$_SESSION['name']." </button>";
                      }
                      }
                      else{
                        echo "<button type='button' class='btn btn-primary' id='myBtn'>Login/Register</button>";
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
<?php
if(isset($_SESSION['who'])){
echo "
        <div class='row'>
            <div class='col'> 
                <div class='modal-body-customer'><a href='#' ><img style='width: 70%' src='img\user.png'></a> <h3>My profile</h3>
                </div>  
            </div>
            <div class='col'> 
                <div class='modal-body-agent'><a href='index.php'><img style='width: 70%' src='img\agenticon.png'></a> <h3>Logout</h3>
                </div> 
            </div>
        </div>    ";
}
else{
echo "
     
        <div class='row'>
            <div class='col'> 
                <div class='modal-body-customer'><a href='cust-form.php' ><img style='width: 70%' src='img\user.png'></a> <h3>Customer</h3>
                </div>  
            </div>
            <div class='col'> 
                <div class='modal-body-agent'><a href='agent-form.php'><img style='width: 70%' src='img\agenticon.png'></a> <h3>Agent</h3>
                </div> 
            </div>
        </div>    ";
}

?>       

       </div>
      </div>
</div>



<!------------------Banner------------------>
 <section id="banner">
     <div class="container">
     <div class="row">
     <div class="col-md-6">
        <p class="something"> About</p>  
        <h3>Vega INSURANCE</h3>
     </div>  
         
<!---------------IMAGE SLIDER---------------->
    
     </div>
     </div>
     
     <img src="img\wave1.png" class="wave">
</section>
    

<div class = "para">
        <p>Vega Allianz Life Insurance Company Limited is one of India’s leading private life insurance companies. It is a joint venture between Vega Finserv Limited, the holding company for the businesses dealing with financial services of the Vega Group, and Allianz SE, the world’s leading insurance conglomerate and one of the largest asset managers in the world.
        Vega Allianz Life Insurance Company Limited began its operations in 2001, and today has a pan-India presence with 604 branches as on 31 March, 2019. The company offers life insurance solutions through its strong product portfolio, which includes traditional insurance products and ULIPs for enabling customers fulfill their LifeGoals. The company also offers group insurance and health insurance plans.</p>
        <p>Vega traces its roots to 19 December 1919 when Cornelius Vander Starr founded what was then known as American Asiatic Underwriters in Shanghai, China (later American International Underwriters). Starr eventually expanded his business throughout the world. In 21 January 1939, Starr relocated his head office from Shanghai to New York City after the Japanese invasion of China and again in 5 April 1949 with the communist takeover of mainland China, and the Asian Vega became a subsidiary of New York-based American International Group (AIG).

        In 4 December 2009, AIG sold preferred equity interests in two newly formed international life insurance subsidiaries, American International Assurance Company, Limited (Vega) and American Life Insurance Company (ALICO), to the Federal Reserve Bank of New York to reduce its debt by US$25 billion.

        Vega had planned to be listed company in Hong Kong Stock Exchange in 3 April 2010. However, in 2 March 2010, Prudential PLC, a UK-based financial services and securities company, announced that it would buy Vega for US$35.5 billion. The purchase later fell through, and Vega held an IPO in October 2010, raising approximately HK$159.08 billion (US$20.51 billion), the world's third largest IPO ever.

        In 11 September 2012, Vega acquired a 92.3% stake in Sri Lankan insurer Aviva NDB Insurance from British insurer Aviva and Sri Lanka's National Development Bank (NDB). Vega also entered into an exclusive 20-year bancassurance agreement with NDB, one of Sri Lanka's largest financial conglomerates with a nationwide bank branch network.

        In 7 October 2012, Vega acquired ING Group's Malaysian insurance subsidiaries for a cash consideration of €1.336 billion (US$1.73 billion).

        In 21 December 2012, AIG sold all of its 13.69% shareholding in Vega.

        Since 2 June 2013, Vega has had an exclusive bancassurance agreement with Citibank that encompasses 11 Vega markets in the Asia-Pacific region, namely Hong Kong, Singapore, Thailand, China, Indonesia, Philippines, Vietnam, Malaysia, Australia, India, and Korea.</p>
 </div>        
<!----------------------------FOOTER------------------------------> 
     <footer class="footer-distributed">


            <div class="footer-left">



                <p class="footer-links">
                    <a href="#">Home</a>
                    ·
                    <a href="#">About</a>
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
</body>
</html>