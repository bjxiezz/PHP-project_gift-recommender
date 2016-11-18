<?php 
include("inc/functions.php");

if (isset($_GET["id"])) {
    $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);//filter input
    $item = single_item_array($id);
	//var_dump($item);//testing code
}
//var_dump ($id);
if (empty($item)) {
    header("location:index.php");
    exit;
}

$pageTitle = $item["name"];
$section = null;

include("inc/header.php"); ?>

<div class="section page">

    <div class="wrapper">
	    <div class="media-picture">
    		<span>
				<img src="<?php echo $item["img"]; ?>" alt="<?php echo $item["name"]; ?>" />
			</span>          
        </div>
        
        <div class="media-details">
        
            <h1><?php echo $item["name"]; ?></h1>
            <table>
            
                <tr>
                    <th>Price</th>
                    <td><?php echo "$".$item["price"]; ?></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><?php echo "From ". $item["age_low"] . " to " . $item["age_high"]; ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php 
						if ( $item["boy"] && $item["girl"]) {
							$gender = "Both boys and girls";
						} else if ($item["boy"]) {
							$gender = "Boys only";
						} else if ($item["girl"]) {
							$gender = "Girls only";
						} else {
							$gender = "Not defined";
						}
						echo $gender; 
					?></td>
                </tr>
                <tr>
                    <th valign="top">Description</th>
                    <td><?php echo $item["description"]; ?></td>
                </tr>
                   
            </table><br><br><br>
			</form>
		<form form method="get" class = "center" action="deleted.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<input type="submit" value="Delete this item from our catalog"/>
        </form><br><br>
		
		<form form method="get" class = "center" action="edit.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<input type="submit" value="    Modify  details  of  this  item    "/>
        </form>
        </div>
    
    </div>

</div>