
<?php
  header('location : election.php');
  session_start();

  if(!isset($_SESSION['compter'])){
     $_SESSION['compter'] = 1;
  }else{
  	 $_SESSION['compter']++; 
  }
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		html, body{
			margin: 0px;
		}
		img{
			margin: auto;
		}
		form{
			width : 50%;
			text-align: center;
			margin: auto;
			margin-left: 25%;
		}
		#input input{
			width: 120%;
		}
		#text{
			margin-right: 30px;
			float: left;
		}
	</style>
	<!--bootstrap css-->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Login Page Using PHP</title> 
</head>
<body>

	<div>
	<img src="undraw_election_day_w842.png" width="40%" height="40%">
	<form method="get" style="margin-top: -15%;">
		<p>Select a name :</p>

  <input type="radio" id="huey" name="nom" value="Russell">
  <label for="huey">Russell crowe</label>
<br>
  <input type="radio" id="dewey" name="nom" value="Denzel">
  <label for="dewey">Denzel Wachington</label>
<br>
  <input type="radio" id="louie" name="nom" value="Mill">
  <label for="louie">Mill Gibson</label>
<br>
  <input type="radio" id="louie" name="nom" value="Jhonny">
  <label for="louie">Jhonny Deep</label>
<br>
  <input type="submit" name="voter" value="Vote !!" onclick="myFunction()">
  <input type="submit" name="Statistique" value="Statistique">
 
	</form>
	<?php
	   if(isset($_GET['voter'])){
          $selected_radio = $_GET['nom'];

          if($selected_radio == "Russell"){
	    	$_SESSION['Russell']++;
	      }else if($selected_radio == 'Jhonny'){
	    	  $_SESSION['Jhonny']++;
	      }else if($selected_radio == 'Mill'){
	    	  $_SESSION['Mill']++;
	      }else if($selected_radio == 'Denzel'){
	    	  $_SESSION['Denzel']++;
	      }
	   }

	    $data = "le nombre de personnes qui ont visité le systéme : ".$_SESSION['compter'];
	    $data .= "\r\nRussell a le nombre de vote suivants : ".$_SESSION['Russell'];
	    $data .= "\r\nDenzel a le nombre de vote suivants : ".$_SESSION['Denzel'];
	    $data .= "\r\nMill a le nombre de vote suivants : ".$_SESSION['Mill'];
	    $data .= "\r\nJhonny a le nombre de vote suivants : ".$_SESSION['Jhonny'];

	    $nbr_total = $_SESSION['Russell']+$_SESSION['Denzel']+$_SESSION['Mill']+$_SESSION['Jhonny'];

       
	    if(isset($_GET['Statistique'])){
          echo "le pourcentage de Russell est : ".(($_SESSION['Russell']/$nbr_total)*100)."%";
          echo "<br>le pourcentage de Denzel est : ".(($_SESSION['Denzel']/$nbr_total)*100)."%";
          echo "<br>le pourcentage de Mill est : ".(($_SESSION['Mill']/$nbr_total)*100)."%";
          echo "<br>le pourcentage de Jhonny est : ".(($_SESSION['Jhonny']/$nbr_total)*100)."%";
	   }
   
        $fp = fopen('vote.txt', 'w');
        flock($fp, LOCK_EX);
        fwrite($fp, $data);
        flock($fp, LOCK_UN);
        fclose($fp);
   	?>
	</div>


	<script>
    function myFunction() {
      alert("merci beaucoup pour votre participation, clique ok!!");
    }
    </script>
   
</body>
</html>