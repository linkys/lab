<?php
$ch = curl_init();

// установка URL и других необходимых параметров
curl_setopt($ch, CURLOPT_URL, "http://www.gismeteo.ua/city/hourly/5053/");
curl_setopt($ch, CURLOPT_HEADER, false);

// загрузка страницы и выдача её браузеру
curl_exec($ch);

// завершение сеанса и освобождение ресурсов
curl_close($ch);

echo($out);