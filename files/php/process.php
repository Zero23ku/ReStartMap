<?php

	include 'connection.php';
	
	$return = array();

	if( !empty($_POST['formData'])){
		
		parse_str($_POST['formData'],$data);
		$mob_id_name = $data['mob_id_name'];
		
		$sql = "select 	restartmap.map.map_name, restartmap.map.map_id
			from	restartmap.map, restartmap.map_monster, restartmap.monster
			where 	restartmap.map.map_id = restartmap.map_monster.map_monster_map_id and
	  				restartmap.monster.monster_id = restartmap.map_monster.map_monster_monster_id and
      				(restartmap.monster.monster_id = '$mob_id_name' 
      				or restartmap.monster.monster_name like '$mob_id_name')";
   		
   		$result = $conn->query($sql);

   		$conn->close();

   		if($result->num_rows > 0){

   			while($row = $result->fetch_assoc()){
   				$return['maps'][] = $row['map_id'];
   			}
   		}

	}

	echo json_encode($return);
	die();
?>




