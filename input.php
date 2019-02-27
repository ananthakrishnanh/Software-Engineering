<!DOCTYPE html>
<?php
if (isset($_POST['upload'])) {
	$valuee=$_POST['number'];
	echo $valuee;
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chembl_23";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	echo "success";
}


echo "<table border='1'>";
	

echo "<tr>";
		echo "<td>" . "chembl_id" . "</td>";
    	echo "<td>" . $valuee . "</td>";
echo "</tr>";



$sql = "SELECT * from assays where chembl_id='$valuee' ";
$result = mysqli_query($conn, $sql);


//echo $result;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

    	echo "<tr>" . "<td>" . "assay_id" . "</td>" . "<td>" .  $row['assay_id'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "assay_organism" . "</td>" . "<td>" .  $row['assay_organism'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "assay_tissue" . "</td>" . "<td>" .  $row['assay_tissue'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "confidence_score" . "</td>" . "<td>" .  $row['confidence_score'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "tissue_id" . "</td>" . "<td>" .  $row['tissue_id'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "variant_id" . "</td>" . "<td>" .  $row['variant_id'] ."</td>" . "</tr>";
    	
    	$assay_idd = $row['assay_id'];
		
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    
}




$sql1 = "SELECT * from chembl_id_lookup where chembl_id='$valuee' ";
$result1 = mysqli_query($conn, $sql1);


//echo $result;
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)) {

    	
		echo "<tr>" . "<td>" . "entity_id" . "</td>" . "<td>" .  $row1['entity_id'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "entity_type" . "</td>" . "<td>" .  $row1['entity_type'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "status" . "</td>" . "<td>" .  $row1['status'] ."</td>" . "</tr>";
		
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

    	
		echo "<tr>" . "<td>" . "tid" . "</td>" . "<td>" .  $row3['tid'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "target_type" . "</td>" . "<td>" .  $row3['target_type'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "pref_name" . "</td>" . "<td>" .  $row3['pref_name'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "tax_id" . "</td>" . "<td>" .  $row3['tax_id'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "organism" . "</td>" . "<td>" .  $row3['organism'] ."</td>" . "</tr>";
    	echo "<tr>" . "<td>" . "species_group_flag" . "</td>" . "<td>" .  $row3['species_group_flag'] ."</td>" . "</tr>";
		
		$tidd = $row3['tid'];
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    
}

$sql4 = "SELECT * from activities where assay_id = '$assay_idd'";
$result4 = mysqli_query($conn, $sql4);


//echo $result;
if (mysqli_num_rows($result4) > 0) {
    // output data of each row
    while($row4 = mysqli_fetch_assoc($result4)) {

    	
		echo "<tr>" . "<td>" . "activity_id" . "</td>" . "<td>" .  $row4['activity_id'] ."</td>" . "</tr>";
    	
    	
		
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    
}

$sql5 = "SELECT * from drug_mechanism where tid = '$tidd'";
$result5 = mysqli_query($conn, $sql5);


//echo $result;
if (mysqli_num_rows($result5) > 0) {
    // output data of each row
    while($row5 = mysqli_fetch_assoc($result5)) {

    	
		echo "<tr>" . "<td>" . "mec_id" . "</td>" . "<td>" .  $row5['mec_id'] ."</td>" . "</tr>";
		echo "<tr>" . "<td>" . "record_id" . "</td>" . "<td>" .  $row5['record_id'] ."</td>" . "</tr>";
		echo "<tr>" . "<td>" . "site_id" . "</td>" . "<td>" .  $row5['site_id'] ."</td>" . "</tr>";
		echo "<tr>" . "<td>" . "action_type" . "</td>" . "<td>" .  $row5['action_type'] ."</td>" . "</tr>";
		echo "<tr>" . "<td>" . "molecular_mechanism" . "</td>" . "<td>" .  $row5['molecular_mechanism'] ."</td>" . "</tr>";
		echo "<tr>" . "<td>" . "disease_efficacy" . "</td>" . "<td>" .  $row5['disease_efficacy'] ."</td>" . "</tr>";
		echo "<tr>" . "<td>" . "binding_site_comment" . "</td>" . "<td>" .  $row5['binding_site_comment'] ."</td>" . "</tr>";
		
    	
    	
		
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    
}
?>

</html>