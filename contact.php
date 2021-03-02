<?php
$adresse = "webdesign@chloecollinet.com";

$TO = $adresse;
$head = "From: ".$adresse."\n";
$head .= "X-Sender: <".$adresse.">\n";
$head .= "X-Mailer: PHP\n";
$head .= "Return-Path: <".$adresse.">\n";
$head .= "Content-Type: text/plain; charset=iso-8859-1\n";


$informations = "
Civilité: ".$_POST['Civilite']." \r\n 
Name: ".$_POST['name']." \r\n
Email: ".$_POST['email']." \r\n
Subject: ".$_POST['subject']." \r\n
Message: ".$_POST['message']."\r\n

";
$res = mail($TO,$informations);

?>
