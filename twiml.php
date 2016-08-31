<?php

header('Content-type: text/xml');

// put a phone number you've verified with Twilio to use as a caller ID number
//$callerId = "+420721643596";
$callerId = "+12019879457";

// put your default Twilio Client name here, for when a phone number isn't given
$number   = "jenny";

// get the phone number from the page request parameters, if given
if (isset($_REQUEST['PhoneNumber'])) {
    $number = htmlspecialchars($_REQUEST['PhoneNumber']);
}

// wrap the phone number or client name in the appropriate TwiML verb
// by checking if the number given has only digits and format symbols
if (preg_match("/^[\d\+\-\(\) ]+$/", $number)) {
    $numberOrClient = "<Number>" . $number . "</Number>";
} else {
    $numberOrClient = "<Client>" . $number . "</Client>";
}
?>

<Response>
    <Dial callerId="<?php echo $callerId ?>">
          <?php echo $numberOrClient ?>
    </Dial>
    <Say>Hello, how are you? I would like to order 3 menus.</Say>
</Response>