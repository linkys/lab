<?php
header('Content-Type: text/html; charset=utf-8');
if( $curl = curl_init() ) {
    curl_setopt($curl,CURLOPT_URL,'http://www.gismeteo.ua/weather-kharkiv-5053/hourly/');
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    $out = curl_exec($curl);
    curl_close($curl);

    $arr = array();

    preg_match('/<h3 class="typeM">(.*)<\/h3>/i', $out,$a);
    $arr['city'] = $a[1];

    preg_match('/<span class="icon date_bottom">(.*?)<\/span>/i', $out,$a);
    $arr['time'] = $a[1];
    
    preg_match('/<li><strong>Восход<\/strong> (.*?)<\/li>/i', $out,$a);
    $arr['voshod'] = $a[1];
    
    preg_match('/<li><strong>Заход<\/strong> (.*?)<\/li>/i', $out,$a);
    $arr['zahod'] = $a[1];
    
    preg_match('/<li><strong>Долгота<\/strong> (.*?)<\/li>/i', $out,$a);
    $arr['dolgota'] = $a[1];
    
    preg_match_all('/(\d{1,}:00)(?=\t<\/th>)/i', $out,$a);
    $arr['day_times'] = array_slice($a[1], 0, 8);
    
    preg_match_all('{<td class\="temp"[\s\S]*?<span.*?>(\-?\+?\d{1,2})<\/span>}', $out,$a);
    $arr['day_temps'] = array_slice($a[0], 0, 8);

//    echo '<pre>';print_r($arr);echo '</pre>';
    
    $v = strtotime($arr['voshod']);
    $z = strtotime($arr['zahod']);
    
    $duration = date('G:i', $z - $v);

    $val = array();
    for($i = 0; $i < 8; $i++){
        $val[$i][0] = $arr['day_times'][$i];
        $val[$i][1] = $arr['day_temps'][$i];
    }
//    echo '<pre>';var_dump($val[0][0]);echo '</pre>';

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <p>г. <?php echo $arr['city'] ?></p>
    <p><?php echo $arr['time'] ?></p>
    <p>Восход солнца: <?php echo $arr['voshod'] ?></p>
    <p>Заход солнца: <?php echo $arr['zahod'] ?></p>
    <p>Продолжительность дня: <?php echo $duration ?></p>
    <p>Температура в течении дня: 
        <?php 
            foreach($val as $item){
                echo substr($item[0], 0, -3)."ч: ";
                echo $item[1]."&deg;&nbsp;&nbsp;&nbsp;&nbsp;";
            }
        ?>
    </p>
</body>
</html>