<?php
include("inc/functions.php");
include("inc/header.php");
?>



<header>
	<h1>All items</h1>
	<p>Do you want some fun gifts for kids? Check out the full catalog of our recommendations!</p>
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