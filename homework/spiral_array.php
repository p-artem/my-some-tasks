<?

if(!empty($_GET['rows']) && !empty($_GET['cols'])){
    $rows = $_GET['rows']; // кол-во строк
    $cols = $_GET['cols']; // кол-во столбцов
}else{
    $rows = 10;
    $cols = 10;
}
$counter = 1; // заполнение массива от 1 до x*y

// Определение кол-ва колец
if($rows >= $cols){
    $numbertRing = (int)($cols/2);
}  else {
    $numbertRing = (int)($rows/2);
}


for($countRing = 0; $countRing <=$numbertRing; $countRing++){
    
    for($i = 0; $i < $rows; $i++){
        for($j = 0; $j < $cols; $j++){
            // Направление слева на право
            if($i == $countRing && $j >= $countRing && $j <= $cols-1-$countRing){
                if($counter <= ($rows*$cols)){
                $mass[$i][$j] = $counter++; 
                }
            }
            // Направление сверху вниз
            if(($i > $countRing && $i < $rows-1-$countRing) && $j == $cols-1-$countRing){
                  if($counter <= ($rows*$cols)){
                $mass[$i][$j] = $counter++;
                  }
            }
        }
    }
    // Направление справа налево
    for($i = 0; $i < $rows; $i++){
        for($j = $cols; $j >= 0; $j--){
            if($i == $rows-1-$countRing && $j >= $countRing && $j <= $cols-1-$countRing ){
                if($counter <= ($rows*$cols)){
                $mass[$i][$j] = $counter++; 
                }
            }
        }
    }
    // Направление снизу вверх
    for($i = $rows-2; $i > 0; $i--){
        for($j = 0; $j < $cols; $j++){
            if(($i > $countRing && $i < $rows-1-$countRing) && $j == $countRing){
                  if($counter <= ($rows*$cols)){
                  $mass[$i][$j] = $counter++;
                  }
            }
        }
    }    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Заполнение массива по спирали</title>
        <style>
            table, tr, td
                {
                //border-collapse:collapse;
                padding:4px;
                border-spacing: 10px 10px;
                text-align: center;
                }
                tr, td{
                    border-style:solid;
                    border-width:1px;
                   cellspacing: "3";
                }
        </style>
</head>
<body>
    <form action="" method="get">
        <label for="rows">Число строк - <?=$rows ?></label><br/>
        <input id="rows" type="text" name="rows" placeholder="Строки"><br/><br/>
        <label for="cols">Число столбцов - <?=$cols ?></label><br/>
        <input id="cols" type="text" name="cols" placeholder="Столбцы"><br/><br/>
        <input type="submit" value="Отправить">
    </form>
    <br/>
    <table>
        <? for($i = 0; $i < $rows; $i++){ ?>
        <tr>
            <? for($j = 0; $j < $cols; $j++){?>
            <td><?=$mass[$i][$j]?></td>
            <? } ?>
        </tr>
        <?} ?>
    </table>
    <p>Размерность массива (строки * столбцы): <?=$rows ?> * <?=$cols ?> </p>
    <p>Максимальное колличество значений в массиве (строки * столбцы): <?=$rows*$cols ?></p>
    <p>Колличество колец: <?=$numbertRing ?></p>
</body>
</html>
