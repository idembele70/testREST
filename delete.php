<?php

$url = 'http://localhost/Clay/testREST/produits';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($ch);
var_dump($response);
curl_close($ch);
?>