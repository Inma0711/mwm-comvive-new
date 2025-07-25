<?php
declare(strict_types=1);

function reply_json(
	int $_status_code,
	mixed $_body
) {

	http_response_code($_status_code);
	echo json_encode($_body);
	exit(0);
}

/**
*input parameters:
*POST:
*action (string) must be "num_items" or "insert_item"
*ssid (string) for num_items or insert_item
*product_id (int) for insert_item
*concept (string) for insert_item
*detail (string) for insert_item
*periodicity (int) for insert_item
*/

if(!array_key_exists("action", $_POST)) {

	reply_json(400, "missing action param");
}

$action=$_POST["action"] ?? "";

switch($action) {

	//This is meant to check how many items are in the cart, so that we can
	//show them along the cart icon.
	case "num_items":

		$ssid=$_POST["ssid"] ?? null;

		//The SSID refers to the cart id. It is compulsory if one wants to
		//retrieve the number of items from a cart.
		if(null===$ssid) {

			reply_json(401, ["msg" => "missing session id"]);
		}

		//If the SSID cannot be found, we get this.
		if("not_found"===$ssid) {

			reply_json(404, ["msg" => "cart not found"]);
		}

		//A successful response will return both the ssid and the
		//number of items.
		reply_json(
			200,
			[
				"ssid" => $ssid,
				"num_items" => 3
			]
		);

	//This is meant to insert anything in the cart. Depending on what we are
	//inserting we will need to provide different values to the arguments.
	//If no cart exists yet, we post this call with no SSID and a new one
	//will be returned to us.
	case "insert_item":

		//For domains, must be the product id of the TLD and the action 
		//(renewal or new register). For other products this is a fixed value.
		$product_id=$_POST["product_id"] ?? 0;
		//For domains this must be the domain name we are inserting, with the
		//full TLD. It can be empty for other products.
		$concept=$_POST["concept"] ?? "";
		//This is mainly legacy stuff. Can be empty.
		$detail=$_POST["detail"] ?? "";
		//In months.
		$periodicity=$_POST["periodicity"] ?? 12;
		//Identifier for our current cart. If none was given a new cart will be
		//started.
		$ssid=$_POST["ssid"] ?? "new-ssid";

		//Product id is compulsory. If I remember correctly, an invalid
		//product id will also produce this.
		if(0===$product_id) {

			reply_json(401, ["msg" => "bad product id"]);
		}

		//Only certain periodicities are valid.
		if(!in_array($periodicity, [1,12,24,36])) {

			reply_json(401, ["msg" => "bad periodicity"]);
		}

		//It may happen that we cannot create the cart, but if we get this
		//it must be a catastrophic error and there's nothing we can do here.
		if(false) {

			reply_json(500, ["msg" => "error creating the cart"]);
		}

		//If we attempt to refer to a non existing cart, we will get this.
		if("not_found"===$ssid) {

			reply_json(404, ["msg" => "cart not found"]);
		}

		//And if everything is ok...
		reply_json(201, ["ssid" => $ssid, "num_items" => 3]);

	default:
		reply_json(400, "unknown action param");
}


