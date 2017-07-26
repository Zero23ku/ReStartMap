<?php

	include 'connection.php';
	
	if( $_POST ){
		$mob_id_name = json_decode($_POST['mob_id_name']);
	}

	$sql = "select 	restartmap.map.map_name, restartmap.map.map_id
			from	restartmap.map, restartmap.map_monster, restartmap.monster
			where 	restartmap.map.map_id = restartmap.map_monster.map_monster_map_id and
	  				restartmap.monster.monster_id = restartmap.map_monster.map_monster_monster_id and
      				(restartmap.monster.monster_id = '$mob_id_name' 
      				or restartmap.monster.monster_name like '$mob_id_name')";
    $result = $conn->query($sql);

    $rows = array();

    while($data = $result->fetch_assoc()){
    	$rows[] = $data;
    }

    $json_result = json_encode($rows);
    
    $conn->close();
	*/

    /*
    <div id="result-container">
		<?php
			if($result->num_rows > 0 ){
				while($row = $result->fetch_assoc()){
					print "map: " . $row["map_name"] . " map_id: " .$row["map_id"] . "<br>";
				}
			}else{
				print "<p> nothing :( </p>";
			}


		?>
	</div>
	*/

	print($json_result);
?>




