<?php
function all_catalog_array() {
    include("connection.php");

    try {
       $results = $db->query(
         "SELECT id, name, img 
         FROM gift_detail"
       );
    } catch (Exception $e) {
       echo "Unable to retrieved results";
       exit;
    }
    //retrive all the item information
    $catalog = $results->fetchAll();
    return $catalog;
}

function get_item_html($item) {
    $output = "<li><a href='details.php?id="
        . $item["id"] . "'><img src='" 
        . $item["img"] . "' alt='" 
        . $item["name"] . "' />" 
        . "<p>View Details</p>"
        . "</a></li>";
    return $output;
}

function single_item_array($id) {
    include("connection.php");

    try {
      $results = $db->prepare(
          "SELECT * FROM gift_detail WHERE id = ?"
      );
      $results->bindParam(1,$id,PDO::PARAM_INT);//$id should be an integer
      $results->execute();//load the result set
    } catch (Exception $e) {
      echo "bad query";
      echo $e;
    }
    
	//retrive the item information which matches $id
    $item = $results->fetch(PDO::FETCH_ASSOC);
  

    return $item;//return flase if not found
}

function random_catalog_array() {
    include("connection.php");

    try {
       $results = $db->query(
         "SELECT id, name, img 
         FROM gift_detail
		 ORDER BY RAND()
         LIMIT 4"
       );//SQLite using "ORDER BY RANDOM()"
    } catch (Exception $e) {
       echo "Unable to retrieved results";
       exit;
    }
    //retrive all the item information
    $catalog = $results->fetchAll();
    return $catalog;
}


function search_catalog_array($search) {
    include("connection.php");
    
	//redefine value of gender into a query
	$genderQuery = "";
	if ($search["gender"] == 1) {
		$genderQuery = "AND boy = true";
	} else if ($search["gender"] == 0) {
		$genderQuery = "AND girl = true";
	}
	
	
	//SELECT * FROM `gift_detail` WHERE `price` < 20 AND `boy` = true AND `age_low` < 5 AND `age_high` > 5
    try {
		$results = $db->prepare( 
			"SELECT * FROM gift_detail
				WHERE price < ?	   
				AND age_low < ?
				AND age_high > ?"
				. $genderQuery
				." ORDER BY RAND()"
		);
		
        $results->bindParam(1,$search["price"],PDO::PARAM_INT);
        $results->bindParam(2,$search["age"],PDO::PARAM_INT);
		$results->bindParam(3,$search["age"],PDO::PARAM_INT);

		$results->execute();
    } catch (Exception $e) {
       echo "Unable to retrieved results";
       exit;
    }
    //retrive all the item information
    $catalog = $results->fetchAll();
    return $catalog;
}

		
function insert_one_record($add) {
    include("connection.php");

    try {
		$insert = $db->prepare("INSERT INTO gift_detail(name, price,boy, girl, age_low,age_high, description, img) VALUES(:name,:price,:boy,:girl,:age_low,:age_high,:description, :img)");

		$insert->execute($add);
    } catch (Exception $e) {
       return "Unable to insert the record";
       exit;
    }
     return "Database updated. Thank you for your input.";
}


function delete_one_record($id) {
    include("connection.php");

    try {
		$delete = $db->prepare("DELETE FROM gift_detail 
								WHERE `id` = :id_to_delete");

		$delete->execute( array( ":id_to_delete" => $id ) );
    } catch (Exception $e) {
       return "Unable to delete the record";
       exit;
    }
     return "One item has been deleted from our catalog.";
}
