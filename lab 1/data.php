<?php
header('Content-Type: text/html; charset=utf-8');
    
if(isset($_POST['napr'])){
    $var = $_POST['napr'];
    $fp = file('./data.txt', FILE_IGNORE_NEW_LINES);
    $check = false;
    foreach($fp as $item){
        if($item == $var) {
            $check = true; continue;
        }
        if($check == true){
            if($item == '') break;
            $arr[] = $item;
        }
    }
    array_shift($arr);
    $arr = array_chunk($arr, 4);
    $i = 1;
} else {
header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>    
<body>

    <p><?php echo $var ?></p>
    <pre><?php //print_r($arr) ?></pre>
    <p><a href="./index.php">Назад</a></p>
    
    <table>

       <td>N</td>
       <td>Средний балл</td>
       <td>Бюджет</td>
       <td>Недобор</td>
       <td>Контракт</td>
       <td>ВУЗ</td>
        <?php foreach($arr as $val) { ?>
           <tr>
               <td><?php echo $i++ ?></td>
               <td><?php echo $val[0] ?></td>
               <td><?php echo $val[1] ?></td>
               <td><?php echo ($val[2] < 0) ? abs($val[2]) : '-' ; ?></td>
               <td><?php echo ($val[2] <= 0) ? '-' : $val[2]; ?></td>
               <td><?php echo $val[3] ?></td>
           </tr>
        <?php } ?>
    </table>
    
</body>
</html>