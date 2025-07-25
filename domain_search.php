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
*term (string) for "create_search", term to search for,
*GET:
*action (string) must be "create_search" or "check_search"
*ref (string) for "check_search", search reference to return.
*/

$action=$_GET["action"] ?? "";

switch($action) {

	//This is meant to start a new search. The search is done in an 
	//asynchronous way: this call returns a reference to the search that
	//will be run in another server. Periodically we must call "check_search"
	//with the given reference to see how it goes.
	case "create_search":

		$term=$_POST["term"] ?? "";

		//The search will also fail when the search input cannot be parsed
		//as a domain.
		if(0===strlen($term)) {

			reply_json(
				400,
				"bad search term"
			);
		}

		$response_tlds=array_map(
			function(string $_tld) : array {

				return [
					"tld" => $_tld,
						//If any of these two appear they must be shown as 
						//tooltips for the given TLD.
						"domain_conditions" => "",
						"sale_conditions" => "",
						//Both the id and price will change with each Tld.
						"register" => ["id" => 1, "price" => 10.],
						"transfer" => ["id" => 2, "price" => 11.4]
					];
			},
			["com", "es", "com.es", "org", "net", "info", "eu", "me", "shop", "art"]
		);

		//The domain name will be the input term, or the input term + .com if
		//nothing was specified. The returned reference will change with each
		//call to create_search.
		reply_json(
			201,
			[
				"reference" => "referencestring",
				"domain_name" => $term,
				"tlds"=> $response_tlds
			]
		); 
	break;

	//This is meant to check the status of a search. We can call it as long
	//as "finished" is false in the reply. Searches expire after a certain
	//period. 
	case "check_search":

		$ref=$_GET["ref"] ?? "";

		if(0===strlen($ref)) {

			reply_json(
				400,
				"bad reference"
			);
		}

		//The following three are examples of possible responses we can get
		//if the reference if bad, if we posted too many requests to this 
		//endpoint or if something failed. You can safely assume that a 
		//status code of 200 is the only operation that worked.
		if($ref==="bad") {

			reply_json(
				401,
				"unauthorized"
			);
		}

		if($ref==="too_many") {

			reply_json(
				429,
				["msg" => "too many requests"]
			);
		}

		if($ref==="error") {

			reply_json(
				500,
				["msg" => "internal error: XXXX"]
			);
		}

		//This is a search that is still in process... Each TLD will have a
		//status which can be:
		//status_not_started=-100;
		//status_waiting=-101;
		//status_failed=-102;
		//status_in_comvive=-2;
		//status_error=-1; //registrar error, maybe
		//status_registered=0;
		//status_free=1;
		//status_forbidden=2;
		//status_reserved=3;
		//status_blocked=4;
		//status_free_with_request=5;
		//status_manual=6;

		if($ref==="unfinished") {

			$now=new \DateTime();
			$status=array_map(
				function(string $_tld) : array {

					return [
						"tld" => $_tld,
						//As long as one TLD is waiting or not started the 
						//search is not over.
						"status" => -101
					];
				},
				["com", "es", "com.es", "org", "net", "info", "eu", "me", "shop", "art"]
			);

			reply_json(
				200,
				[
					//The domain name comes WITHOUT TLD.
					"domain" => "domain-name",
					"finished" => false,
					//In the real API this is also a real moment when this was last updated.
					"last_updated" => $now->format("Y-m-d H:i:s"),
					"status" => $status
				]
			);
		}

		//And this is a finished search.
		$now=new \DateTime();
		$status=array_map(
			function(string $_tld) : array {

				return [
					"tld" => $_tld,
					//Depending on the status, the domain search will show different
					//statuses, such as "cannot be registered", "transfer", 
					//"buy"...A 1 means "free, can be bought".
					"status" => 1
				];
			},
			["com", "es", "com.es", "org", "net", "info", "eu", "me", "shop", "art"]
		);

		reply_json(
			200,
			[
				//The domain name comes WITHOUT TLD.
				"domain" => "domain-name",
				"finished" => true,
				//In the real API this is also a real moment when this was last updated.
				"last_updated" => $now->format("Y-m-d H:i:s"),
				"status" => $status
			]
		);

	break;
	default:

		//The real endpoint just returns silence with a status code of 200
		reply_json(
			400,
			"bad action"
		);
}

