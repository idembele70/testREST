<?php
$url = "http://localhost/Clay/testREST/produits/1";
$data = array('name' => 'MAC', 'description' => 'Ordinateur portable', 'price'=> '9658', 'category' => '2');

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

$reponse = curl_exec($ch);

var_dump($reponse);

if (!$reponse) {
    return false;
}
?>