<?php 
require 'config/db.php';
$check=1;
//Only for this form: Field 1, Field 2, ...
$field =(preg_match('/^[a-zA-Z]{5}[\s]{1}[0-9]+$/', $_POST['field_x']))? $_POST['field_x'] : $check=0;
$date =(preg_match('/^[0-9:\/\s-]+$/', $_POST['date_x']))? $_POST['date_x'] : $check=0;
//Only for this form: 08:00 08:30 ... to 21:30
$start =(preg_match('/^[0-9]{2}[:]{1}[0-9]{2}$/', $_POST['start_x']))? $_POST['start_x'].':00' : $check=0; 
$end =(preg_match('/^[0-9]{2}[:]{1}[0-9]{2}$/', $_POST['end_x']))? $_POST['end_x'].':00' : $check=0;
$user =(preg_match('/^[^:;\/|<>]+$/', $_POST['user_x']))? $_POST['user_x'] : $check=0;
//getting a field number
$field_num=substr($field,5,strlen($field)-5);
$notIn=1;
if($check){
	if($start>=$end){
		echo 102;
	}
	else{
		//getting all info about booked field for $date and $field_num
		$arr=$dbFUNS->getFields($date,$field_num);
		//if function return 'empty' we only need to check $date and $start
		if($arr=="empty"){
			/*checks if $date isn't equal to 'today', cause if it's equal then we need to check that the $start time be greater than 'now', cause if not greater it means that we need to return 'already booked or past' (104)*/
			if($date!=date('Y-m-d')){
				$res=$dbFUNS->insertBook($field_num,$date,$start,$end,$user);
				//all cool
				echo 101;
			}else{
				if(strtotime($start)>strtotime(date('H:i:s'))){
					$res=$dbFUNS->insertBook($field_num,$date,$start,$end,$user);
					//all cool
					echo 101;
				}else{
					//booked or past
					echo 104;
				}
			}
		}
		else{			
			/*checks if $date isn't equal to 'today', cause if it's equal then we need to check that the $start time be greater than 'now', cause if not greater it means that we need to return 'already booked or past' (104)*/
			if($date!=date('Y-m-d')){
				foreach ($arr as $key) {
					//checks if  time period($start - $end) is free to be booked
					if(
						(strtotime($end) > strtotime($key['start']) && strtotime($end) <= strtotime($key['end'])) ||
						(strtotime($start) >= strtotime($key['start']) && strtotime($start) < strtotime($key['end'])) ||
						(strtotime($start) <= strtotime($key['start']) && strtotime($end) >= strtotime($key['end'])) ||
						(strtotime($start) > strtotime($key['start']) && strtotime($end) < strtotime($key['end']))
						){	
						$notIn=0;					
					}		
				}				
			}
			else{
				foreach ($arr as $key) {	
					//checks if  time period($start - $end) is free to be booked and if $start greater than 'now'	
					if(
						strtotime($start)<=strtotime(date('H:i:s')) ||
						(strtotime($end) > strtotime($key['start']) && strtotime($end) <= strtotime($key['end'])) ||
						(strtotime($start) >= strtotime($key['start']) && strtotime($start) < strtotime($key['end'])) ||
						(strtotime($start) <= strtotime($key['start']) && strtotime($end) >= strtotime($key['end'])) ||
						(strtotime($start) > strtotime($key['start']) && strtotime($end) < strtotime($key['end']))
					){	
						$notIn=0;					
					}		
				}
			}
			if($notIn){
				$res=$dbFUNS->insertBook($field_num,$date,$start,$end,$user);
				//all cool
				echo 101;
			}else{
				//booked or past
				echo 104;
			}
		}		
	}
}
else{
	//smart guy tried to break in
	echo 103;
}

 ?>

