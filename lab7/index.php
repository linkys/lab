<?php
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
    
    preg_match('/<tr class="wrow"[\s\S]*?\d*:00[\s\S]*?<span class="value m_temp c">(.*?)<\/span>[\s\S]*?<\/tr>/i', $out,$a);
    $arr['aa'] = $a[1];
    echo $arr['aa'];
//    print_r($a);
    
}
