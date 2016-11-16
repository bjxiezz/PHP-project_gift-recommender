<?php
$message = "";

include("inc/functions.php");
if (isset($_GET["id"])) {
    $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
	var_dump($id);//testing code
}


$message = delete_one_record($id);	

include("inc/header.php");

?>



<header>
	<h1><?php echo $message?></h1>
	<p>Currently, our catalog includes following items: </p>
	<div class="full_Catalog">
		<ul class="items">
			<?php
			$all = all_catalog_array();
			foreach ($all as $item) {
				echo get_item_html($item);
			}
			?>							
		</ul>
	</div>
</header>
	



<?php
include("inc/footer.php");;
?>