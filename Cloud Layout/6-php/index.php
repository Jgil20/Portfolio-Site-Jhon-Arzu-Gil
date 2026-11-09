<?php 

	$weather = "";
	$error = "";

	if (array_key_exists('city', $_GET)) {
	   
	  $city =  preg_replace('/\s+/', '', $_GET['city']);
	  
	  $file_headers = @get_headers("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
	  
      if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
          
		 $error = "That city could not be found";
   
   } else { 

	   
	  $forecastPage = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
	   
	   $pageArray = explode('description b-forecast__hide-for-small days-summaries"><th></th><td class="b-forecast__table-description-cell--js" colspan="9"><span class="b-forecast__table-description-title">', $forecastPage);
	    
		if (sizeof($pageArray) > 1) {
	   
	   $secondPageArray = explode('/span></p></td></tr><tr class="b-forecast__table-days js-forecast-header js-daynames"><th class="b-forecast__table-units"><div class="b-forecast__table-units-container">',$pageArray[1]);
	   
		if(sizeof( $secondPageArray) > 1 ) {
			
			
	   	 $weather = $secondPageArray[0];
		 
		} else {
			
			$error = "that city could not be found.";
		}
		  
   } else {
	   
	   
		$error = "that city could not be found.";
		
   }   
   
     }
   }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Weather Scraper</title>
	
	<style type="text/css">
	
	 html { 
background: url("http://arzugil.com/6-php/nikolas-noonan-682177-unsplash.jpg") no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}

body {
	background:none;
	
}

.container{
	width:450px;
	text-align:center;
	margin-top:200px;
	
	}
	
	input {
		
		margin:20px 0;
		
	}
	
	#weather {
		
		margin: 20px 0;
		
	}
	
	
	</style>
  </head>
  <body>
    <div class="container">
	<h1><font color="white"> Whats The Weather? </font> </h1>
	
	
	<form>
  <div class="form-group">
    <label for="city"> <font color="white"> Enter the name of the city </font> </label>
    <input type="text" name="city" class="form-control" id="city" aria-describedby="emailHelp" placeholder=" U.S.Ionia, Houston" value ="<?php 
	if (array_key_exists('city', $_GET)) {
	
	echo $_GET['city'];
	}
	
	?> ">
    
  </div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
	<div id="weather"><?php
			
			if($weather) {
				
				echo '<div class="alert alert-primary" role="alert">'
                .$weather. '</div>';
				} else if ($error) {
					echo '<div class="alert alert-primary" role="alert">'.$error.' </div>';
				}
		?>
		
		
		
		</div>

       

	</div>
	
		
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>