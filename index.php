<?php 
require 'config/db.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Title</title>

 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" type="text/css" href="style/style.css">
 	<!--fontawesome-->
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	
	<!--jquery-->
 	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
 </head>
 <body>
 <div class="container">
 	<div class="book_section">
 		<h2>Title</h2>
 		<form class="book_form" id="formRes" method="post">
 			<div>
 				<label><i class="fas fa-map-marker-alt"></i> Choose the field: </label>
 				<select id="field_num">
 					<option>Field 1</option>
 					<option>Field 2</option>
 					<option>Field 3</option>
 					<option>Field 4</option>
 					<option>Field 5</option>
 					<option>Field 6</option>
 				</select>
 			</div>
 			<div>
 				<label><i class="fas fa-calendar-alt"></i> Date: </label>
 				<input type="date" id="date" required>
 			</div>
 			<div>
 				<label><i class="fas fa-clock"></i> Start: </label>
 				<select id="start_time">
 					<option>08:00</option>
 					<option>08:30</option>
 					<option>09:00</option>
 					<option>09:30</option>
 					<option>10:00</option>
 					<option>10:30</option>
 					<option>11:00</option>
 					<option>11:30</option>
 					<option>12:00</option>
 					<option>12:30</option>
 					<option>13:00</option>
 					<option>13:30</option>
 					<option>14:00</option>
 					<option>14:30</option>
 					<option>15:00</option>
 					<option>15:30</option>
 					<option>16:00</option>
 					<option>16:30</option>
 					<option>17:00</option>
 					<option>17:30</option>
 					<option>18:00</option>
 					<option>18:30</option>
 					<option>19:00</option>
 					<option>19:30</option>
 					<option>20:00</option>
 					<option>20:30</option>
 				</select>
 			</div>
 			<div>
 				<label><i class="fas fa-clock"></i> End: </label>
 				<select id="end_time">
 					<option>08:30</option>
 					<option>09:00</option>
 					<option>09:30</option>
 					<option>10:00</option>
 					<option>10:30</option>
 					<option>11:00</option>
 					<option>11:30</option>
 					<option>12:00</option>
 					<option>12:30</option>
 					<option>13:00</option>
 					<option>13:30</option>
 					<option>14:00</option>
 					<option>14:30</option>
 					<option>15:00</option>
 					<option>15:30</option>
 					<option>16:00</option>
 					<option>16:30</option>
 					<option>17:00</option>
 					<option>17:30</option>
 					<option>18:00</option>
 					<option>18:30</option>
 					<option>19:00</option>
 					<option>19:30</option>
 					<option>20:00</option>
 					<option>20:30</option>
 					<option>21:00</option>
 				</select>
 			</div>
 			<div>
 				<label><i class="fas fa-user-alt"></i> Name: </label>
 				<input type="text" id="user" placeholder=" John" required>
 			</div>
 			<button type="submit">Book</button>
 		</form>
 	</div>
 	<div class="calendar_section">
 		<div class="calendar_control">
 			<button id="previous"><i class="fas fa-arrow-circle-left"></i></button>
 			<button id="today"><i class="fas fa-flag"></i> Today</button>
 			<button id="next"><i class="fas fa-arrow-circle-right"></i></button>
 		</div>
 		<div class="calendar_table">
 			<div class="calendar_dan">
 				<h3>Day: <?php
					$day="";
					switch (date('D')) {
					 	case 'Mon':
					 		$day="Moday";					 		
					 		break;
					 	case 'Tue':
					 		$day="Tuesday";					 		
					 		break;
					 	case 'Wed':
					 		$day="Wednesday";					 		
					 		break;
					 	case 'Thu':
					 		$day="Thursday";					 		
					 		break;
					 	case 'Fri':
					 		$day="Friday";					 		
					 		break;
					 	case 'Sat':
					 		$day="Saturday";					 		
					 		break;
					 	case 'Sun':
					 		$day="Sunday";					 		
					 		break;
					 } 

					echo $day.' <span id="dayGet">'.date('d-m-Y').'</span>'; ?></h3>

 			</div>
 			<div class="calendar_color">
 				<div>Past <div class="past"></div></div>
			 	<div>Empty <div class="free"></div></div>
			 	<div>Booked <div class="res"></div></div>
			 </div>
 			<div class="calendar_tb">
 				<div class="calendar_fixed">
 					<li>&nbsp;</li>
 					<li>08:00</li>
 					<li>08:30</li>
 					<li>09:00</li>
 					<li>09:30</li>
 					<li>10:00</li>
 					<li>10:30</li>
 					<li>11:00</li>
 					<li>11:30</li>
 					<li>12:00</li>
 					<li>12:30</li>
 					<li>13:00</li>
 					<li>13:30</li>
 					<li>14:00</li>
 					<li>14:30</li>
 					<li>15:00</li>
 					<li>15:30</li>
 					<li>16:00</li>
 					<li>16:30</li>
 					<li>17:00</li>
 					<li>17:30</li>
 					<li>18:00</li>
 					<li>18:30</li>
 					<li>19:00</li>
 					<li>19:30</li>
 					<li>20:00</li>
 					<li>20:30</li>
 					<li class="last">21:00</li>
 				</div>
 				<div class="tb-div">
	 				<table>
	 					<tr>
	 						<td>Field 1</td>
	 					</tr>
	 						<?php 
	 							//Populate table for field 1 and for today
	 							populate($dbFUNS->getFields(date('Y-m-d'),'1'),date('Y-m-d'));
	 						 ?>
	 				</table>
	 				<table>
	 					<tr>
	 						<td>Field 2</td>
	 						<?php 
	 							//Populate table for field 2 and for today
	 							populate($dbFUNS->getFields(date('Y-m-d'),'2'),date('Y-m-d'));
	 						 ?>
	 					</tr>
	 					
	 				</table>
	 				<table>
	 					<tr>
	 						<td>Field 3</td>
	 						<?php 
	 							//Populate table for field 3 and for today
	 							populate($dbFUNS->getFields(date('Y-m-d'),'3'),date('Y-m-d'));
	 						 ?>
	 					</tr>
	 					
	 				</table>
	 				<table>
	 					<tr>
	 						<td>Field 4</td>
	 						<?php 
	 							//Populate table for field 4 and for today
	 							populate($dbFUNS->getFields(date('Y-m-d'),'4'),date('Y-m-d'));
	 						 ?>
	 					</tr>
	 					
	 				</table>
	 				<table>
	 					<tr>
	 						<td>Field 5</td>
	 						<?php 
	 							//Populate table for field 5 and for today
	 							populate($dbFUNS->getFields(date('Y-m-d'),'5'),date('Y-m-d'));
	 						 ?>
	 					</tr>
	 					
	 				</table>
	 				<table>
	 					<tr>
	 						<td>Field 6</td>
	 						<?php 
	 							//Populate table for field 6 and for today
	 							populate($dbFUNS->getFields(date('Y-m-d'),'6'),date('Y-m-d'));
	 						 ?>
	 					</tr>
	 					
	 				</table>
 				</div>
 			</div> 			
 		</div> 		
 	</div>
 </div>

 <script type="text/javascript" src="script/script.js"></script>
 </body>
 </html>