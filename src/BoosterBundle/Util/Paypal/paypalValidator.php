<?php

// read form and add 'cmd'
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

$req = 'cmd=_notify-validate';

foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}

// send informations back to paypal to verrify
$header = '';
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);

$item_name = $_POST['item_name'];
$item_number = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];
$id_user = $_POST['custom'];

$status = '';

//header('Location: http://localhost:8002/transaction/9/edit');
if (!$fp) {

    $status = 'http error';

} else {
    fputs ($fp, $header . $req);

    while (!feof($fp)) {

        $res = fgets ($fp, 1024);

        if (strcmp ($res, "VERIFIED") == 0) {
            // transaction valide
            // vérifier que payment_status a la valeur Completed

            if ( $payment_status == "Completed") {
                // vérifier que txn_id n'a pas été précédemment traité: Créez une fonction qui va interroger votre base de données

                if (VerifIXNID($txn_id) == 0) {
                    // vérifier que receiver_email est votre adresse email PayPal principale

                    if ( "votreEmailSeller" == $receiver_email) {
                        // vérifier que payment_amount et payment_currency sont corrects


                        $status = 'success';

                    } else {

                        $status = 'wrong email address';
                    }
                } else {

                    $status = 'duplicated Id';
                }
            } else {

                $status = 'payment failed';
            }
        } else if (strcmp ($res, "INVALID") == 0) {

            $status = 'invalid transaction';

        }
    }
    fclose ($fp);
}


