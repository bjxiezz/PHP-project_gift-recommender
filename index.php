<?php
include("inc/functions.php");
include("inc/header.php");
?>





<div class="search full_Catalog">
	<h2 class = "center"> Please give us some information about the recipient</h2>
	
	<form method="get" class = "center" action="catalog.php">
		
		<label for="gender">Gender:</label>
		<select  name="gender" id="gender" >
			<option value="1">Boy</option>
			<option value="0">Girl</option>
		</select>
		
		
		
		<label for="age">Age:</label>
		<input type="number" name="age" id="age" value= "0"/>
		
		
		
		<label for="price">Price range:</label>
		<select  name="price" id="price" >
			<option value="20">Less than $20 </option>
			<option value="50">Less than $50 </option>
			<option value="100">Less than $100 </option>
			<option value="1000">Less than $1000 </option>
		</select>
		
		
		<input type="submit" value="search" /> 
		
	</form>

	
</div>


 

<div class="section catalog random full_Catalog">
	<div class="wrapper">
		<br><br><br>
		<h2 class = "center"> Some samples from our catalog:</h2>
		<ul class= "items">
			<?php
			$random = random_catalog_array();
			foreach ($random as $item) {
				echo get_item_html($item);
			}
			?>							
		</ul>
	</div>
</div>








<?php
include("inc/footer.php");;
?>