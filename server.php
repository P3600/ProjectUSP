<?php
	include 'phone_class.php';

	function getSearchList()
	{

		$list = array();
		$db = mysqli_connect('localhost','root','','phone_shop') or die('Could not connect to Database');

		$search_check = false;

		$query = "SELECT phone.* FROM phone WHERE ";		
		
		if(isset($_POST['opsys']) && !empty($_POST['opsys'])){
			$opsys = '"'.implode('","',$_POST['opsys']).'"';
			$query .= "phone.opsys IN ($opsys) AND ";
			$search_check = true;
		}

		if(isset($_POST['manufacturer']) && !empty($_POST['manufacturer'])){
			$manufacturer = '"'.implode('","',$_POST['manufacturer']).'"';
			$query .= "phone.manufacturer IN ($manufacturer) AND ";
			$search_check = true;
		}

		if(isset($_POST['ram']) && !empty($_POST['ram'])){
			$ram = '"'.implode('","',$_POST['ram']).'"';
			$query .= "phone.ram IN ($ram) AND ";
			$search_check = true;
		}

		if(isset($_POST['rom']) && !empty($_POST['rom'])){
			$rom = '"'.implode('","',$_POST['rom']).'"';
			$query .= "phone.rom IN ($rom) AND ";
			$search_check = true;
		}

		if(isset($_POST['camera']) && !empty($_POST['camera'])){
			$camera = '"'.implode('","',$_POST['camera']).'"';
			$query .= "phone.camera IN ($camera) AND ";
			$search_check = true;
		}

		if(isset($_POST['processor']) && !empty($_POST['processor'])){
			$processor = '"'.implode('","',$_POST['processor']).'"';
			$query .= "phone.processor IN ($processor) AND ";
			$search_check = true;
		}

		if(isset($_POST['color']) && !empty($_POST['color'])){
			$color = '"'.implode('","',$_POST['color']).'"';
			$query .= "phone.color IN ($color) AND ";
			$search_check = true;
		}

		if(isset($_POST['display']) && !empty($_POST['display'])){
			$display = $_POST['display'];
			$query .= "(";

			if(in_array(0,$display)){
				$query .= "(phone.display <= 4) ";
				if(count($display)>1 && $display[count($display)-1] != 0){
					$query .= "OR ";
				}
			}
			if(in_array(1,$display)){
				$query .= "(phone.display BETWEEN 4.6 AND 5) ";
				if(count($display)>1 && $display[count($display)-1] != 1){
					$query .= "OR ";
				}
			}
			if(in_array(2,$display)){
				$query .= "(phone.display BETWEEN 5.1 AND 5.5) ";
				if(count($display)>1 && $display[count($display)-1] != 2){
					$query .= "OR ";
				}
			}
			if(in_array(3,$display)){
				$query .= "(phone.display BETWEEN 5.6 AND 6) ";
				if(count($display)>1 && $display[count($display)-1] != 3){
					$query .= "OR ";
				}
			}
			if(in_array(4,$display)){
				$query .= "(phone.display >= 6.1) ";
				if(count($display)>1 && $display[count($display)-1] != 4){
					$query .= "OR ";
				}
			}

			$query .= ") AND ";
			$search_check = true;
		}

		if(isset($_POST['battery']) && !empty($_POST['battery'])){
			$battery = $_POST['battery'];
			$query .= "(";

			if(in_array(0,$battery)){
				$query .= "(phone.battery <= 2500) ";
				if(count($battery)>1 && $battery[count($battery)-1] != 0){
					$query .= "OR ";
				}
			}
			if(in_array(1,$battery)){
				$query .= "(phone.battery BETWEEN 2501 AND 3000) ";
				if(count($battery)>1 && $battery[count($battery)-1] != 1){
					$query .= "OR ";
				}
			}
			if(in_array(2,$battery)){
				$query .= "(phone.battery BETWEEN 3001 AND 3999) ";
				if(count($battery)>1 && $battery[count($battery)-1] != 2){
					$query .= "OR ";
				}
			}
			if(in_array(3,$battery)){
				$query .= "(phone.battery >= 4000) ";
				if(count($battery)>1 && $battery[count($battery)-1] != 4){
					$query .= "OR ";
				}
			}

			$query .= ") AND ";
			$search_check = true;
		} 
		
		$query .= "1";
		
		//echo "<pre>" . print_r($query, true) . "</pre>";

		$res = mysqli_query($db,$query);
		$res_count = mysqli_num_rows($res);

		if($res_count>0){
			while ($row = mysqli_fetch_assoc($res)) {

				$e = new Phone();
				$e->Name = $row['name'];
				$e->Price = $row['price'];
				$e->Display = $row['display'];
				$e->Ram = $row['ram'];
				$e->Rom = $row['rom'];
				$e->Battery = $row['battery'];
				$e->Processor = $row['processor'];
				$e->Color = $row['color'];
				$e->Manufacturer = $row['manufacturer'];
				$e->Camera = $row['camera'];
				$e->Opsys = $row['opsys'];

				$list[] = $e;
			}
		}

		return $list;
		
	}

	function checkAnimalTypeId($id = 0,$get_name=false)
	{
		if($id<=0){
			return false;
		}

		$check = false;

		$list = array();
		$db = mysqli_connect('localhost','root','','phone_shop') or die('Could not connect to Database');

		$query = "SELECT * FROM type WHERE id = '$id';";

		$res = mysqli_query($db,$query);
		$res_count = mysqli_num_rows($res);
		if($res_count == 1){
			$check = true;
		}
		
		if($get_name && $check){
			$row = mysqli_fetch_assoc($res);
			return $row['type_name'];
		}
		return $check;		
	}

	//echo "<pre>" . print_r(getListAnimalTypes(), true) . "</pre>";
?>



