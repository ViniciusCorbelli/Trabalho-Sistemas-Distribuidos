<!DOCTYPE html>
<html>
<head>
    <title>Conversor de Temperatura</title>
</head>
<body>
    <h1>Conversor de Temperatura</h1>
    <form action="index.php" method="GET">
        <label for="celsius">Digite o valor em Celsius:</label>
        <input type="text" name="valor">
        <button type="submit">Converter</button>
    </form>
    <br>
    <label for="result">Valor em Kelvin:</label>
    <span><?= getResponse($_GET['valor']) ?></span>
</body>
</html>



<?php

function getResponse($value) {
  if (empty($value)) {
    return '';
  }

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8081/temperature-converter',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:exam="http://ufjf.com/">
      <soapenv:Header/>
      <soapenv:Body>
          <exam:celsiusToKelvin>
              <celsius>' . $value .'</celsius>
          </exam:celsiusToKelvin>
      </soapenv:Body>
  </soapenv:Envelope>
  ',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/xml'
    ),
  ));
  
  $soapResponse = curl_exec($curl);
  $value = str_replace(['<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"><soap:Body><ns2:celsiusToKelvinResponse xmlns:ns2="http://ufjf.com/"><return>', '</return></ns2:celsiusToKelvinResponse></soap:Body></soap:Envelope>'], '', $soapResponse);

  return $value;
}