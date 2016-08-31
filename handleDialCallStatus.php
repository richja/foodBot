<?php
if (isset($_REQUEST["DialCallStatus"]) && $_REQUEST["DialCallStatus"] == "in-progress") {

	include "vendor/autoload.php";

	$dotenv = new Dotenv\Dotenv(__DIR__);
	$dotenv->load();

	$dotenv->required(['ACCOUNT_ID', 'AUTH_TOKEN', 'APP_SID']);

	use Twilio\Jwt\ClientToken;

	// put your Twilio API credentials here
	$accountSid = getenv('ACCOUNT_ID');
	$authToken  = getenv('AUTH_TOKEN');

	// put your TwiML Application Sid here
	$appSid = getenv('APP_SID');

	use Twilio\Rest\Client;

	$client = new Client($accountSid, $authToken);

	// Get an object from its sid. If you do not have a sid,
	// check out the list resource examples on this page
	$call = $client
	    ->calls($appSid)
	    ->update(
	        array(
	            "url" => "http://phpstack-11471-43062-148344.cloudwaysapps.com/say.xml",
	            "method" => "POST"
	        )
	    );

	echo $call->to;
}