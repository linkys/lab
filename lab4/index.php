<?php header('Content-Type: text/html; charset=utf-8'); // задаем правильную кодировку ?>

<?php 
    $handle = file('./napr.txt', FILE_IGNORE_NEW_LINES); //записываем поочередно строки в массив
    sort($handle); // сортировка масива
    $i = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
  <form action="./data.php" method="post">
    <?php foreach($handle as $item) { ?>
        <input type="radio" name="napr" value="<?php echo $item ?>" id="<?php echo ++$i ?>"><label for="<?php echo $i ?>"><?php echo $item ?></label><br>
    <?php } ?>
    <input type="submit" value="Отправить запрос">
   </form>
</body>
</html>