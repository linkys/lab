<?php
//var_dump($_POST);
$name1 = $_POST['name1'];
$name2= $_POST['name2'];
$name3 = $_POST['name3'];
$year = $_POST['year'];
$j = false;

if($name1 != '' && $name2 != '' && $name3 != '' && $year != '') {
    $bd = new mysqli("localhost","root","root","labs");
    $row = array();
    
    if ($result = $bd->query("SELECT * FROM labw5")) {
        while($r = $result->fetch_row()){
            $row[] = $r;
        }
        $result->close();
        
        foreach($row as $item){
            if($item[1] == $name1 && $item[2] == $name2 && $item[3] == $name3) {
                $bd->query("UPDATE `labw5` SET `name1` = '$name1',
                                                        `name2`= '$name2',
                                                        `name3` = '$name3',
                                                        `old` = '$year'
                                                    WHERE
                                                        `id` = $item[0]
                ");
                $msg = 'Данные в таблице изменены';
                $j = true;
            } 
        }
        if($j != true) {
            $bd->query("INSERT INTO labw5 (name1, name2, name3, old) VALUES ('$name1', '$name2', '$name3', '$year')");
            $msg = 'Добавлена новая запись в таблицу';

        }
        
        
    }
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
    <p><?php echo $msg ?></p>
    <p><a href="index.php">Сделать еще одну запись</a></p>
</body>
</html>