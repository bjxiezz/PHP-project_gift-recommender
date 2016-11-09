<?php
include("inc/functions.php");
$message = "<p>Not satisfied with our recommendations? Put your own prefered gifts in our catalog.</p><p>Please put information for this gift (all fields required).</p>";

$add = null;
$gender = null; 
$boy = 0;
$girl = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
    $name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
    $price = trim(filter_input(INPUT_POST,"price",FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
    $gender = trim(filter_input(INPUT_POST,"gender",FILTER_SANITIZE_NUMBER_INT));
    $age_low = trim(filter_input(INPUT_POST,"age_low",FILTER_SANITIZE_NUMBER_INT));
    $age_high = trim(filter_input(INPUT_POST,"age_high",FILTER_SANITIZE_NUMBER_INT));
	$description = trim(filter_input(INPUT_POST,"description",FILTER_SANITIZE_SPECIAL_CHARS));
    $img = trim(filter_input(INPUT_POST,"img",FILTER_SANITIZE_URL, FILTER_FLAG_QUERY_REQUIRED));
   
   
	if (isset($gender)){
		switch ($gender){
			case 0: $girl = 1;
			case 1: $boy = 1;
			case 2: $girl = 1;$boy = 1;			
		}		
	}
	
	$add = array (
		"name" => $name,
		"price" => $price,
		"boy" => $boy,
		"girl" => $girl,
		"age_low" => $age_low,
		"age_high" => $age_high,
		"description" => $description,
		"img" => $img);  
	    
    if ($name == "" || $price == "" || $gender == "" || $age_low == "") {
        $message = "Please fill in the required fields.";
    } else {		
		$message = insert_one_record($add);		
	}  
}



include("inc/header.php");
?>



<article>
	<section>
		<h1>Your thoughts</h1>
		
		<?php echo $message?>
		
		</form>
		<form method="post" action="suggest.php">
		<table>
            <tr>
			<th><label for="name">Name:</label></th>
			<td><input type="text" name="name" id="name"> </td>
			</tr>
			
			<tr>
			<th><label for="price">Price: </label></th>
			<td><input type="number" step="0.01" name="price" id="price"/> </td>
			</tr>
			
			<tr>
			<th><label for="gender">Gender:</label></th>
			<td><select  name="gender" id="gender" >
				<option value="0">Only for girls  </option>
				<option value="1">Only for boys  </option>
				<option value="2">For both boys and girls</option>
				
			</select></td>
			</tr>
			
			<tr>
			<th><label for="age_low">Age from</label></th>
				<td><input type="number" name="age_low" id="age_low"/></td>
				
			</tr>
				<th><label for="age_high">Age to</label></th>
				<td><input type="number" name="age_high" id="age_high"/></td>
			<tr>
			
			</tr>
				
			<tr>
			<th><label for="description">Description</label></th>
                <td><textarea name="description" id="description">
				</textarea>	</td>
				
			<tr>
			<th><label for="img">Imagine address</label></th>
                <td><textarea name="img" id="img">
				</textarea>	</td>
			</tr>
			
			</table>
			<br>
			
			<input type="submit" value="Add this into the catalog">
		</form>

	</section>
 </article>

 
<aside>
	<h3><br>Contact</h3>
	<p>Please contact us for any suggestions to improve this website. <br>
	<br>
	Our email address is: <br> email@giftforkids.org<br><br><br><br><br><br><br><br></p>
					
</aside>


<?php
include("inc/footer.php");;
?>