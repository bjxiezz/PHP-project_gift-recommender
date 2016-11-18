<?php
include("inc/functions.php");
$message = "<p>Have more accurate information about this item? Modify the details of this item in our catalog.</p><p>Please modify following information of this item.</p>";

if (isset($_GET["id"])) {
    $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);//filter input
    $item = single_item_array($id);
	//var_dump($item);//testing code
	
	//determine gender case
	$gender_case = 0;
	if (($item["boy"] == 0) && ($item["girl"] == 1)){
		$gender_case = 0;
	} else if (($item["boy"] == 1) && ($item["girl"] == 0)){
		$gender_case = 1;
	} else if (($item["boy"] == 1) && ($item["girl"] == 1)){
		$gender_case = 2;
	}
}
//echo "gender_case=". $gender_case;




if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$id = trim(filter_input(INPUT_POST,"id",FILTER_SANITIZE_NUMBER_INT));
    $name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
    $price = trim(filter_input(INPUT_POST,"price",FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
    $gender = trim(filter_input(INPUT_POST,"gender",FILTER_SANITIZE_NUMBER_INT));
    $age_low = trim(filter_input(INPUT_POST,"age_low",FILTER_SANITIZE_NUMBER_INT));
    $age_high = trim(filter_input(INPUT_POST,"age_high",FILTER_SANITIZE_NUMBER_INT));
	$description = trim(filter_input(INPUT_POST,"description",FILTER_SANITIZE_SPECIAL_CHARS));
    $img = trim(filter_input(INPUT_POST,"img",FILTER_SANITIZE_URL, FILTER_FLAG_QUERY_REQUIRED));
   
    //setting gender 
	if (isset($gender)){
		$girl = 0; $boy = 0;
		if ($gender == 0) {
			$girl = 1; $boy = 0;
		} else if ($gender == 1){
			$girl = 0; $boy = 1;
		} else if ($gender == 2){
			$girl = 1; $boy = 1;
		}
	}
	
	
	$update = array (
		"id" => $id,
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
		$message = update_one_record($update);		
	}  
}


include("inc/header.php");
?>



<article>
	<section>
		<h1>Modification of an item</h1>
		
		<?php echo $message?>
		
		</form>
		
		<form  <?php if ($message =="Database updated. Thank you for your input.") {echo "style='display:none'";}?> class = "edit" method="post" action="edit.php">
		<table>
            <tr>
			<th><label for="name">Name:</label></th>
			<td><input type="text" name="name" id="name" cols="35" value = "<?php  echo $item["name"]?>" > </td>
			</tr>
			
			<tr>
			<th><label for="price">Price: </label></th>
			<td><input type="number" step="0.01" name="price" id="price"value = "<?php  echo $item["price"]?>"/> </td>
			</tr>
			
			<tr>
			<th><label for="gender">Gender:</label></th>
			<td><select  name="gender" id="gender">
				<option value="0" <?php if($gender_case == 0){echo "selected";}?>>Only for girls  </option>
				<option value="1" <?php if($gender_case == 1){echo "selected";}?>>Only for boys  </option>
				<option value="2" <?php if($gender_case == 2){echo "selected";}?>>For both boys and girls</option>
				
			</select></td>
			</tr>
			
			<tr>
			<th><label for="age_low">Age from</label></th>
				<td><input type="number" name="age_low" id="age_low" value = "<?php  echo $item["age_low"]?>"/></td>
				
			</tr>
				<th><label for="age_high">Age to</label></th>
				<td><input type="number" name="age_high" id="age_high" value = "<?php  echo $item["age_high"]?>"/></td>
			<tr>
			
			</tr>
				
			<tr>
			<th><label for="description">Description</label></th>
                <td><textarea name="description" id="description" rows="7" cols="26" ><?php  echo $item["description"]?></textarea>	</td>
				
			<tr>
			<th><label for="img">Imagine address</label></th>
                <td><textarea name="img" id="img" rows="5" cols="26" ><?php  echo $item["img"]?></textarea>	</td>
			</tr>
			
			</table>
			<br>
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<input type="submit" value="Update this item in the catalog">
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