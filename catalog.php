<?php 
include("inc/functions.php");
$search = null;
$message = "";
$genderWord = "";

if (isset($_GET["price"])||isset($_GET["gender"])||isset($_GET["age"])) {
	//sanitize input values
	$price = filter_input(INPUT_GET,"price",FILTER_SANITIZE_NUMBER_INT);
	$gender = filter_input(INPUT_GET,"gender",FILTER_SANITIZE_NUMBER_INT);
	$age = filter_input(INPUT_GET,"age",FILTER_SANITIZE_NUMBER_INT);
	  
	$search = array (
	"price" => $price,
	"gender" => $gender,
	"age" => $age);
	
	if ($gender == 1){$genderWord = "boy";} else {$genderWord = "girl";}
}

if (!empty($search)) {
	$message = "We found following item(s) for a "
				. $age . " year old " . $genderWord 
				. " with a price less than $". $price . ":"; 
	$catalog = search_catalog_array($search);
} else {
	$message = "Please input some information. All fields are required!";
	$catalog = all_catalog_array();
}
	



include("inc/header.php"); ?>


<header>
	<h2><?php echo $message;?></h2>
	<div class="full_Catalog">
		<ul class="items">
			<?php
			//$catalog = all_catalog_array();
			foreach ($catalog as $item) {
				echo get_item_html($item);
			}
			?>							
		</ul>
	</div>
</header>

<?php
include("inc/footer.php");;
?>