<?php
    $bd = new mysqli("localhost","root","root","labs");
    $row = array();

    if ($result = $bd->query("SELECT * FROM labw5")) {
        while($r = $result->fetch_row()){
            $row[] = $r;
        }
        $result->close();
    }
    header('Content-Type: text/html; charset=utf-8'); // задаем правильную кодировку

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style type="text/css">
        label {width: 120px; display:inline-block}
        table {border: 1px #f50 dashed; margin: 10px}
        td {border: 1px #f60 solid; padding: 5px}
        tr:hover {background-color:#f60; color: blue}
    </style>
</head>
<body>
    <form action="./data.php" method="post">
        <label for="1">Фамилия</label><input id="1" type="text" name="name1"><br>
        <label for="2">Имя</label><input id="2" type="text" name="name2"><br>
        <label for="3">Отчество</label><input id="3" type="text" name="name3"><br>
        <label for="4">Год рождения</label><input id="4" type="text" name="year"><br>
        <input type="submit" value="Добавить">
    </form>
    <div>
        <?php if(count($row) > 0) { ?>
            <table>
                <?php foreach($row as $item) { ?>
                    <tr>
                        <td><?php echo $item[1] ?></td>
                        <td><?php echo $item[2] ?></td>
                        <td><?php echo $item[3] ?></td>
                        <td><?php echo $item[4] ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>В базе данных еще нет записей</p>
        <?php } ?>
    </div>
    <p><a href="pre.php">Код программы в виде текста</a></p>
</body>
</html>