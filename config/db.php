<?php 
/**
* Class contains Database connection info and some functions for inserting and fetching data
*/
class DB 
{	
	//this info depends on your own setup on your localhost
	const host="localhost";	//localhost
	const user="root";	//root
	const pass="";	//
	const dbName="sf_booking_sys"; //db_name
	const charset="utf8";	//charset

	private $pdo;
	private $options = [
		PDO::ATTR_ERRMODE 				=> PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES		=> false,
	];

	//database connecion
	public function setPDO() {
		$dsn = "mysql:host=".$this::host.";dbname=".$this::dbName.";charset=".$this::charset;
		try {
			$this->pdo = new PDO($dsn, $this::user, $this::pass, $this->options);
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(),(int)$e->getCode());		
		}
	}

	//function for fetching data about booked field
	function getFields($date,$field_num){
		$sql="SELECT * FROM sf_booked WHERE `dan`= ? AND `field_num`= ? ORDER BY `start`,`end`";
		$res=$this->pdo->prepare($sql);
		$res->execute([$date,$field_num]);
		$row=$res->rowCount();
		if($row>0){
			$i=0;
			$arr=array();
			$rows=$res->fetchAll();
			foreach ($rows as $row ) {
				$arr[$i++]=array("id" => $row['id'], "day" => $row['day'], "start" => $row['start'], "end" => $row['end']);
			}			
			return $arr;
		}
		else{
			return "empty";
		}
	}

	//function for inserting book info
	function insertBook($field_num,$date_x,$start_x,$end_x,$user){
		$bookTime=date('Y-m-d H:i:s');
		$sql="INSERT INTO sf_booked (`field_num`,`day`,`start`,`end`,`book_time`,`user`) VALUES (:field_num,:date_x,:start_x,:end_x,:bookTime,:user)";
		$res=$this->pdo->prepare($sql);
		$res->execute(["field_num" => $field_num, "date_x" => $date_x, "start_x" => $start_x, "end_x" => $end_x, "bookTime" => $bookTime, "user" => $user]);
	}	
}

$dbFUNS= new DB();
$dbFUNS->setPDO();
if ($_SERVER["SERVER_ADDR"] != "::1") {
    ini_set('display_errors', 0);
}

//function for populating a table on front-end
function populate($res,$date){
	if ($res=="empty") {
		$hours=8;
 		for($j=0;$j<27;$j++){
 			if($hours > 9){
 				if ($j%2==0) {
 					$xTime=strtotime($hours.":"."00:00");
 					$dt = new DateTime($date." ".$hours.":"."00:00");
 				}else{
 					$xTime=strtotime($hours.":"."30:00");
 					$dt = new DateTime($date." ".$hours.":"."30:00");
 					$hours++;
 				}
 			}else{
 				if ($j%2==0) {
 					$xTime=strtotime("0".$hours.":"."00:00");
 					$dt = new DateTime($date." 0".$hours.":"."00:00");
 					}else{
 						$xTime=strtotime("0".$hours.":"."30:00");
 						$dt = new DateTime($date." 0".$hours.":"."30:00");
 						$hours++;
 					}
 			}
 			$time = $dt->format('Y-m-d H:i:s');
 			if($time<date('Y-m-d H:i:s')){
 				echo "<tr><td class='past'>&nbsp;</td></tr>";
 			}else{
 				echo "<tr><td class='free'>&nbsp;</td></tr>";
 			}
 		}
 	}
 	else{
 		$hours=8; 		
 		for ($j=0;$j<27;$j++) { 
 			if($hours > 9){
 				if ($j%2==0) {
 					$xTime=strtotime($hours.":"."00:00");
 					$dt = new DateTime($date." ".$hours.":"."00:00");
 				}else{
 					$xTime=strtotime($hours.":"."30:00");
 					$dt = new DateTime($date." ".$hours.":"."30:00");
 					$hours++;
 				}
 			}else{
 				if ($j%2==0) {
 						$xTime=strtotime("0".$hours.":"."00:00");
 						$dt = new DateTime($date." 0".$hours.":"."00:00");
 					}else{
 						$xTime=strtotime("0".$hours.":"."30:00");
 						$dt = new DateTime($date." 0".$hours.":"."30:00");
 						$hours++;
 					}
 			}
 			$in="";
 			foreach ($res as $key){
 				if($xTime >= strtotime($key['start']) && $xTime < strtotime($key['end'])) {
 					echo "<tr><td class='res'>&nbsp;</td></tr>";
 					$in="in";
 				}
 			}
 			if($in!="in"){
 				$time = $dt->format('Y-m-d H:i:s');
 				if($time<date('Y-m-d H:i:s')){
 					echo "<tr><td class='past'>&nbsp;</td></tr>";
 				}else{
 					echo "<tr><td class='free'>&nbsp;</td></tr>";
 				}
 			}
 		}
 	}
}

 ?>
