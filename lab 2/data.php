<?php
//var_dump($_POST['name1']);
$name1 = $_POST['name1'];
$name2= $_POST['name2'];
$name3 = $_POST['name3'];
$year = $_POST['year'];
if($name1 != '' && $name2 != '' && $name3 != '' && $year != '') {
    $bd = new mysqli("localhost","root","root","labs");
    
    if ($result = $bd->query("SELECT * FROM labw5")) {
        while($r = $result->fetch_row()){
            $row[] = $r;
        }
        $result->close();
        echo '<pre>';print_r($row);echo '</pre>';
        foreach($row as $item){
            if($item[1] == $name1 && $item[2] == $name2 && $item[3] == $name3) {
                $result = $bd->query("UPDATE `labw5` SET `name1` = '$name1',
                                                        `name2`= '$name2',
                                                        `name3` = '$name3',
                                                        `old` = '$year'
                                                    WHERE
                                                        `name1` = $name1,
                                                        `name2`= $name2,
                                                        `name3` = $name3
                ");
                $result->close();
            } else {
                $result = $bd->query("INSERT INTO labw5 (name1, name2, name3, old) VALUES ('$name1', '$name2', '$name3', '$year')");
                $result->close();
            }
        }
        
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
</body>
</html>