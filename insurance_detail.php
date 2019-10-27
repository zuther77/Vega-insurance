<?php
// echo "Today is " . date("Y/m/d") . "<br>";
// echo "Today is " . date("Y.m.d") . "<br>";
// echo "Today is " . date("Y-m-d") . "<br>";
// echo "Today is " . date("l");
?>
<?php
$start_date = date("Y/m/d");
// echo $start_date;
// each(array)rror_reporting(0);

session_start();
// print_r($_SESSION);

$db = mysqli_connect("localhost", "root", "", "vega");

if (!$db) {
   die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
  // If uploadl button is clicked ...
if (isset($_POST['upload'])) {
    // echo "IN";
    $term = mysqli_real_escape_string($db, $_POST['term']);
    $insurance_amount = mysqli_real_escape_string($db,$_POST['insurance_amount']);
	if(isset($_SESSION['type_insurance'])== "car"){
		// echo "yes";
	    $modelno = mysqli_real_escape_string($db, $_POST['modelno']);
	    $licenseno = mysqli_real_escape_string($db, $_POST['licenseno']);
	    $carcost = mysqli_real_escape_string($db, $_POST['carcost']);
	   // print_r($_SESSION);
  	}
  	$day = date("d");
  	$month = date("m");
  	$year = date("Y");
  	$year = $year + $term;
  	$date = mktime(11, 14, 54, $month, $day, $year);
  	$end_date =  date("Y-m-d ", $date);
  	// echo $end_date;
   // echo $term;
   // echo $insurance_amount;
}
// $sql = "INSERT INTO agent (firstname, middlename, lastname, dob, sex ,workfrom,   phoneno, email,address, city, password) 
//         VALUES ('$firstname','$middlename','$lastname','$dob','$sex' ,'$workfrom','$phoneno', '$emailid','$address','$city', '$passencrypt')";
$sql = NULL;
if(isset($_SESSION['type_insurance'])== "car" && isset($_POST['upload'])){	
	if(!isset($_SESSION['agent_assigned'])){
		$new_sql = "SELECT agent_id FROM agent
              ORDER BY RAND()
                  LIMIT 1";
      $new_result = $db->query($new_sql);
      // echo "number of rows: " . $new_result->num_rows;
      $new_row = $new_result->fetch_assoc();
      print_r($new_row);
    $_SESSION['agent_assigned'] = $new_row['agent_id'];
	}
	$sql = "INSERT into insurance ( agent_pid, customer_pid, insurance_type, term, amount, model, licenseno, cost_car, start, end) 
		VALUES ('".$_SESSION['agent_assigned']."', '".$_SESSION['login_id']."','".$_SESSION['type_insurance']."','$term','$insurance_amount', '$modelno', '$licenseno', '$carcost','$start_date','$end_date')";
		if ($db->query($sql) === TRUE) {
       // echo "Registration done";
       header("Location: homepage_after.php");
       die();

   } else {
       echo "Error: " . $sql . "<br>" . $db->error;
   }
}
else if(isset($_POST['upload'])){
	$sql = "INSERT into insurance ( agent_pid, customer_pid, insurance_type, term, amount,start, end) 
		VALUES ( '".$_SESSION['agent_assigned']."', '".$_SESSION['login_id']."','".$_SESSION['type_insurance']."',
'$term','$insurance_amount','$start_date','$end_date')";
if ($db->query($sql) === TRUE) {
       // echo "Registration done";
       header("Location: homepage_after.php");
       die();

   } else {
       echo "Error: " . $sql . "<br>" . $db->error;
   }
}



?>
<!DOCTYPE html>
<html>
<head>
  <title>VEGA INSURANCE</title>
  <link rel="stylesheet" type="text/css"href="insurance_detail.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<script>
var term;
var amount;
var prem_rate;
var op;
function term_take() {
term = document.getElementById('term').value;
do_mul();
}
if(term == 5){
	prem_rate = 0.09;
}
else if(term ==10){
	prem_rate = 0.07;
}
else{
	prem_rate = 0.05;
}
function amount_take() {
amount = document.getElementById('amount').value;
do_mul();
}


// alert(prem_rate);
// do_mul();
function do_mul(){
	op = amount*prem_rate;
	var op_term = term*amount*prem_rate;
	// op = +op + +amount;
	// alert(op);
	// op = op/term;
	document.getElementById("op").innerHTML = "Premium per year: "+ op +" lakhs";
	document.getElementById("op_term").innerHTML = "Premium over the term: "+ op_term +" lakhs";
}
</script>
<?php
echo "<h1>".$_SESSION['type_insurance']." insurance</h1>";
?>
<!-- life: occupation, name, address, term, income,insurance amount, premium amount -->
<!-- car: occupation, name, address, term, income, Model ,car cost , calculate insurance amount  -->
<!-- house :occupation, name, address, term, income, insurance amount, premium amount -->

<form method="POST"  enctype="multipart/form-data">
      <div class="occupation">
          <input  placeholder="Occupation" name="occupation">
      </div>
			<div class="term-select">
          <select id ='term' name="term" onChange="term_take()">
              <!-- <option value="city" >City</option> -->
              <option  >Term</option>
              <option value="5" >5 years</option>
              <option value="10" >10 years</option>
              <option value="15" >15 years</option>
              </select> 
      </div>	
      <div class="amount-select">
          <select id ='amount' name="insurance_amount" onChange="amount_take()">>
              <!-- <option value="city" >City</option> -->
              <option >Amount</option>
              <option value="5" >5 lakhs</option>
              <option value="10" >10 lakhs</option>
              <option value="15" >15 lakhs</option>
              </select> 
      </div>
      <div class="output">
          <p id="op"></p>
          <p id="op_term"></p>
      </div>
                


                <?php
                if($_SESSION['type_insurance']=="car"){
                	echo"<input name ='modelno' placeholder='Model ' /><br>";
                	echo"<input name ='licenseno' placeholder='License number' /><br>";
                	echo"<input name ='carcost' placeholder='Cost of car' /><br>";
                }

                ?>
				<button type="submit" name="upload" >Sign Up</button>
</form>

</body>
</html>