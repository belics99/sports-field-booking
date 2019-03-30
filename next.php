<?php 
require 'config/db.php';
$getDay=strtotime($_POST['getDay'] . "+1 days");

 ?>

 <div class="calendar_dan">
 				<h3>Day: <?php
					$day="";
					switch (date('D',$getDay)) {
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

					echo $day.' <span id="dayGet">'.date('d-m-Y',$getDay).'</span>' ?></h3>

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
	 							populate($dbFUNS->getFields(date('Y-m-d',$getDay),'1'),date('Y-m-d',$getDay));
	 						 ?>
	 				</table>
	 				<table>
	 					<tr>
	 						<td>Field 2</td>
	 						<?php 
	 							populate($dbFUNS->getFields(date('Y-m-d',$getDay),'2'),date('Y-m-d',$getDay));
	 						 ?>
	 					</tr>
	 					
	 				</table>
	 				<table>
	 					<tr>
	 						<td>Field 3</td>
	 						<?php 
	 							populate($dbFUNS->getFields(date('Y-m-d',$getDay),'3'),date('Y-m-d',$getDay));
	 						 ?>
	 					</tr>
	 					
	 				</table>
	 				<table>
	 					<tr>
	 						<td>Field 4</td>
	 						<?php 
	 							populate($dbFUNS->getFields(date('Y-m-d',$getDay),'4'),date('Y-m-d',$getDay));
	 						 ?>
	 					</tr>
	 					
	 				</table>
	 				<table>
	 					<tr>
	 						<td>Field 5</td>
	 						<?php 
	 							populate($dbFUNS->getFields(date('Y-m-d',$getDay),'5'),date('Y-m-d',$getDay));
	 						 ?>
	 					</tr>
	 					
	 				</table>
	 				<table>
	 					<tr>
	 						<td>Field 6</td>
	 						<?php 
	 							populate($dbFUNS->getFields(date('Y-m-d',$getDay),'6'),date('Y-m-d',$getDay));
	 						 ?>
	 					</tr>
	 					
	 				</table> 					
 				</div>
 			</div> 	