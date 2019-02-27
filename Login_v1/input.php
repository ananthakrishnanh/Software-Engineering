<!DOCTYPE html>
<head>
	<style type="text/css">
		table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

.bottom{
	position:relative;
	left: 50%;
	margin-top:50%;
}

.box {
    
    padding: 2%;
    display: table-cell;
    text-align: center;
    vertical-align: bottom;
}

.search{
  padding 0 10px;
  font-size:0.8em;
  **line-height: 0.8em;**
  float:bottom;
  height:100%;
  display:table;
  vertical-align:bottom;
}

	</style>


</head>
<?php
if (isset($_POST['upload'])) {
	$valuee=$_POST['number'];
	
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	
}


echo "<table border='1' align='center' class='test'>";
	

/*echo "<tr>";
		echo "<td>" . "chembl_id" . "</td>";
    	echo "<td>" . $valuee . "</td>";
echo "</tr>";*/

$sql1 = "SELECT * from chembl_id_lookup where chembl_id='$valuee' ";
$result1 = mysqli_query($conn, $sql1);


//echo $result;
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)) {

    	echo "<tr>" . "<td>" . "chembl_id" . "</td>" . "<td>" .  $row1['chembl_id'] ."</td>" . "</tr>";
		echo "<tr>" . "<td>" . "entity_id" . "</td>" . "<td>" .  $row1['entity_id'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "entity_type" . "</td>" . "<td>" .  $row1['entity_type'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "status" . "</td>" . "<td>" .  $row1['status'] ."</td>" . "</tr>";
		
		echo "<h2 style='text-align:center'> Data Found </h2>";
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
		echo "<h2 style='text-align:center'> Data Not Found </h2>";
    
}



$sql = "SELECT * from assays where chembl_id='$valuee' ";
$result = mysqli_query($conn, $sql);


//echo $result;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    	echo "<tr>" . "<td>" . "assay_id" . "</td>" . "<td>" .  $row['assay_id'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "doc_id" . "</td>" . "<td>" .  $row['doc_id'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "assay_organism" . "</td>" . "<td>" .  $row['assay_organism'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "assay_tissue" . "</td>" . "<td>" .  $row['assay_tissue'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "confidence_score" . "</td>" . "<td>" .  $row['confidence_score'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "src_id" . "</td>" . "<td>" .  $row['src_id'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "tissue_id" . "</td>" . "<td>" .  $row['tissue_id'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "variant_id" . "</td>" . "<td>" .  $row['variant_id'] ."</td>" . "</tr>";
    	
    	
    	    	$assay_idd = $row['assay_id'];
		

		$sql4 = "SELECT * from activities where assay_id = '$assay_idd'";
		$result4 = mysqli_query($conn, $sql4);


		//echo $result;
		if (mysqli_num_rows($result4) > 0) {
    		// output data of each row
    		while($row4 = mysqli_fetch_assoc($result4)) {

    	
				echo "<tr>" . "<td>" . "activity_id" . "</td>" . "<td>" .  $row4['activity_id'] ."</td>" . "</tr>";
				echo "<tr>" . "<td>" . "record_id" . "</td>" . "<td>" .  $row4['record_id'] ."</td>" . "</tr>";
				echo "<tr>" . "<td>" . "molregno" . "</td>" . "<td>" .  $row4['molregno'] ."</td>" . "</tr>";

				$molregno = $row4['molregno'];

        		$sql6 = "SELECT * from compound_properties where molregno='$molregno' ";
				$result6 = mysqli_query($conn, $sql6);


				//echo $result;
				if (mysqli_num_rows($result6) > 0) {
   	 				// output data of each row
    				while($row6 = mysqli_fetch_assoc($result6)) {

    	
						echo "<tr>" . "<td>" . "hba_lipinski" . "</td>" . "<td>" .  $row6['hba_lipinski'] ."</td>" . "</tr>";
    					echo "<tr>" . "<td>" . "hbd_lipinski" . "</td>" . "<td>" .  $row6['hbd_lipinski'] ."</td>" . "</tr>";
    					echo "<tr>" . "<td>" . "num_lipinski_ro5_violations" . "</td>" . "<td>" .  $row6['num_lipinski_ro5_violations'] ."</td>" . "</tr>";
		
				
        				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    				}
				} else {
    
				}
    	
    			$record_id=$row4['record_id'];

    			$sql7 = "SELECT * from compound_records where record_id='$record_id'";
    			$result7 = mysqli_query($conn, $sql7);




				//echo $result;
				if (mysqli_num_rows($result7) > 0) {
    				// output data of each row
    				while($row7 = mysqli_fetch_assoc($result7)) {

    	
						echo "<tr>" . "<td>" . "compound_name" . "</td>" . "<td>" .  $row7['compound_name'] ."</td>" . "</tr>";
    					
		
						
        				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    				}
				} else {
    
			}

				$sql8 = "SELECT * from drug_mechanism where record_id='$record_id' ";
				$result8 = mysqli_query($conn, $sql8);


				//echo $result;
				if (mysqli_num_rows($result8) > 0) {
    				// output data of each row
    				while($row8 = mysqli_fetch_assoc($result8)) {

    	
						echo "<tr>" . "<td>" . "mec_id" . "</td>" . "<td>" .  $row1['mec_id'] ."</td>" . "</tr>";
    					echo "<tr>" . "<td>" . "action_type" . "</td>" . "<td>" .  $row1['action_type'] ."</td>" . "</tr>";
    					echo "<tr>" . "<td>" . "molecular_mechanism" . "</td>" . "<td>" .  $row1['molecular_mechanism'] ."</td>" . "</tr>";
						echo "<tr>" . "<td>" . "disease_efficacy" . "</td>" . "<td>" .  $row1['disease_efficacy'] ."</td>" . "</tr>";
						echo "<tr>" . "<td>" . "binding_site_comment" . "</td>" . "<td>" .  $row1['binding_site_comment'] ."</td>" . "</tr>";
					
        				//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    				}
				} else {
    
				}


		
        		//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    		}
		} 	else {
    
				}
		
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    
}









$sql2 = "SELECT * from molecule_dictionary where chembl_id='$valuee'";
$result2 = mysqli_query($conn, $sql2);


//echo $result;
if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row2 = mysqli_fetch_assoc($result2)) {

    	
		
		echo "<tr>" . "<td>" . "molregno" . "</td>" . "<td>" . $row2['molregno'] . "</td>";
		echo "<tr>" . "<td>" . "pref_name" . "</td>" . "<td>" . $row2['pref_name'] . "</td>";
		echo "<tr>" . "<td>" . "max_phase" . "</td>" . "<td>" . $row2['max_phase'] . "</td>";
		echo "<tr>" . "<td>" . "therapeutic_flag" . "</td>" . "<td>" . $row2['therapeutic_flag'] . "</td>";
		echo "<tr>" . "<td>" . "dosed_ingredient" . "</td>" . "<td>" . $row2['dosed_ingredient'] . "</td>";
		echo "<tr>" . "<td>" . "structure_type" . "</td>" . "<td>" . $row2['structure_type'] . "</td>";
		echo "<tr>" . "<td>" . "chebi_par_id" . "</td>" . "<td>" . $row2['chebi_par_id'] . "</td>";
		echo "<tr>" . "<td>" . "molecule_type" . "</td>" . "<td>" . $row2['molecule_type'] . "</td>";
		echo "<tr>" . "<td>" . "first_approval" . "</td>" . "<td>" . $row2['first_approval'] . "</td>";
		echo "<tr>" . "<td>" . "oral" . "</td>" . "<td>" . $row2['oral'] . "</td>";
		echo "<tr>" . "<td>" . "parenteral" . "</td>" . "<td>" . $row2['parenteral'] . "</td>";
		echo "<tr>" . "<td>" . "topical" . "</td>" . "<td>" . $row2['topical'] . "</td>";
		echo "<tr>" . "<td>" . "black_box_warning" . "</td>" . "<td>" . $row2['black_box_warning'] . "</td>";
		echo "<tr>" . "<td>" . "natural_product" . "</td>" . "<td>" . $row2['natural_product'] . "</td>";
		echo "<tr>" . "<td>" . "first_in_class" . "</td>" . "<td>" . $row2['first_in_class'] . "</td>";
		echo "<tr>" . "<td>" . "chirality" . "</td>" . "<td>" . $row2['chirality'] . "</td>";
		echo "<tr>" . "<td>" . "prodrug" . "</td>" . "<td>" . $row2['prodrug'] . "</td>";
		echo "<tr>" . "<td>" . "inorganic_flag" . "</td>" . "<td>" . $row2['inorganic_flag'] . "</td>";
		echo "<tr>" . "<td>" . "usan_year" . "</td>" . "<td>" . $row2['usan_year'] . "</td>";
		echo "<tr>" . "<td>" . "availability_type" . "</td>" . "<td>" . $row2['availability_type'] . "</td>";
		echo "<tr>" . "<td>" . "usan_stem" . "</td>" . "<td>" . $row2['usan_stem'] . "</td>";
		echo "<tr>" . "<td>" . "polymer_flag" . "</td>" . "<td>" . $row2['polymer_flag'] . "</td>";
		echo "<tr>" . "<td>" . "usan_substem" . "</td>" . "<td>" . $row2['usan_substem'] . "</td>";
		echo "<tr>" . "<td>" . "usan_stem_definition" . "</td>" . "<td>" . $row2['usan_stem_definition'] . "</td>";
		echo "<tr>" . "<td>" . "indication_class" . "</td>" . "<td>" . $row2['indication_class'] . "</td>";
		echo "<tr>" . "<td>" . "withdrawn_flag" . "</td>" . "<td>" . $row2['withdrawn_flag'] . "</td>";
		echo "<tr>" . "<td>" . "withdrawn_year" . "</td>" . "<td>" . $row2['withdrawn_year'] . "</td>";
		echo "<tr>" . "<td>" . "withdrawn_country" . "</td>" . "<td>" . $row2['withdrawn_country'] . "</td>";
		echo "<tr>" . "<td>" . "withdrawn_reason" . "</td>" . "<td>" . $row2['withdrawn_reason'] . "</td>";
		echo "</tr>";
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

    


    }
} else {
    
}


$sql3 = "SELECT * from target_dictionary where chembl_id = '$valuee'";
$result3 = mysqli_query($conn, $sql3);


//echo $result;
if (mysqli_num_rows($result3) > 0) {
    // output data of each row
    while($row3 = mysqli_fetch_assoc($result3)) {

    	
		
    	echo "<tr>" . "<td>" . "target_type" . "</td>" . "<td>" .  $row3['target_type'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "pref_name" . "</td>" . "<td>" .  $row3['pref_name'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "tax_id" . "</td>" . "<td>" .  $row3['tax_id'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "organism" . "</td>" . "<td>" .  $row3['organism'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "species_group_flag" . "</td>" . "<td>" .  $row3['species_group_flag'] ."</td>" . "</tr>";
		
		/*echo "<div class='Center' align='center'>
    		<button class='btn-bot'>button-bottom</button>
			</div>";*/
		
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        
    }
} else {
    
}

$sql23 = "SELECT * from assays where chembl_id='$valuee' ";
$result23 = mysqli_query($conn, $sql23);

//echo $result;
if (mysqli_num_rows($result23) > 0) {
    // output data of each row
    while($row23 = mysqli_fetch_assoc($result23)) {

    	$score = $row23['confidence_score'];
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

    	$sql50 = "SELECT * from confidence_score_lookup where confidence_score='$score'";
		$result50 = mysqli_query($conn, $sql50);


			//echo $result;
		if (mysqli_num_rows($result50) > 0) {
    		// output data of each row
    		while($row50 = mysqli_fetch_assoc($result50)) {

    			//echo "<tr>" . "<td>" . "confidence_score" . "</td>" . "<td>" .  $row50['confidence_score'] ."</td>" . "</tr>";
				echo "<tr>" . "<td>" . "description" . "</td>" . "<td>" .  $row50['description'] ."</td>" . "</tr>";
    			echo "<tr>" . "<td>" . "target_mapping" . "</td>" . "<td>" .  $row50['target_mapping'] ."</td>" . "</tr>";
    			
		}
		} else {
			
    
		}


        //echo "$score";
    }
} else {
		

    
}


echo "</table>";

?>

<form action="index.php" style="text-align: center;padding-top: 50px;">
	<input type="submit" name="recheck" value="CheckAgain">
</form>

</html>