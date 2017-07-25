<?php

	include 'connection.php';
	
	if( $_POST ){
		$mob_id_name = $_POST['mob_id_name'];
	}

	$sql = "select 	restartmap.map.map_name
			from	restartmap.map, restartmap.map_monster, restartmap.monster
			where 	restartmap.map.map_id = restartmap.map_monster.map_monster_map_id and
	  				restartmap.monster.monster_id = restartmap.map_monster.map_monster_monster_id and
      				restartmap.monster.monster_id = '$mob_id_name' 
      				or restartmap.monster.monster_name = '$mob_id_name';"
    $result = $conn->query($sql);
    
    $conn->close();
?>


<div id="result-container">
	<?php
		if($result->num_rows > 0 ){
			while($row = $result->fetch_assoc()){
				print "map: " . $row["restartmap.map.map_name"] . "<br>";
			}
		}else{
			print "<p> nothing :( </p>";
		}


	?>
</div>
