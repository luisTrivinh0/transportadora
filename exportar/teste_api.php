<?php
require 'inc/funcoes.php';
$url = 'http://localhost:8000/pedidos/cadastro';
$dados = array(
  "token"    => "api",
  "data_envio" =>   "2022-08-30",
  "descricao" =>    "TesteAPI",
  "id_cliente" =>   "1",
  "data_entrega" => "2022-08-30",
  "valor_frete" =>  "60"
);
$ch = curl_init($url);
$dados = json_encode($dados);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = array(
  "Content-Type: application/json",
  "Accept: application/json",
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
$result = curl_exec($ch);
curl_close($ch);
$dados = json_decode($result);
echo $result;
?>