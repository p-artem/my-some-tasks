<?
header('Content-type: text/html; charset=UTF-8');

$textArea = '';
if(!empty($_POST))
    $textArea = strtolower($_POST['text']);

$letterEn = searchEnLetter($textArea);
$letterRu = searchRuLetter($textArea);

function searchEnLetter($text){
    $lenghtText = strlen($text);

    $vowersEn = 'aeiouy';
    $lenghtVowersEn = strlen($vowersEn);
    $countEn = 0;

    for($i = 0; $i < $lenghtText ; $i++){
        for($j = 0; $j < $lenghtVowersEn ; $j++){
            if($text[$i] === $vowersEn[$j]){
                $countEn++;
            }
        }
    }
    return $countEn;
}

function translitT($str){
    $translit = array( "А"=>"0","Е"=>"1","И"=>"2","О"=>"3",
                "У"=>"4","Ы"=>"5","Э"=>"6","Ю"=>"7","Я"=>"8","Ё"=>"9",
                "а"=>"0","е"=>"1","и"=>"2","о"=>"3",
                "у"=>"4","ы"=>"5","э"=>"6","ю"=>"7","я"=>"8","ё"=>"9"
                );
    return strtr($str,$translit);
}

function searchRuLetter($text){
    
    $letters = preg_replace('/[^АЕИОУЫЭЮЯЁаеиоуыэюяё]/u', '', $text);
    $translitText = translitT($letters);
    $lenghtArray = strlen($translitText);
    $countRu = 0;
    $rus = '0123456789';
    $lenghtRus = strlen($rus);
    for($c = 0; $c < $lenghtArray; $c++){
        for($d = 0; $d < $lenghtRus; $d++){
            if($translitText[$c] == $rus[$d]){
                $countRu++;
            }
        }
    }
    return $countRu;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Кол-во гласных букв</title>
        <style>
            #content{
                margin: 10px;
            }
            .right{
                float: left;
                width: 800px;
                min-height: 160px;
                border: 1px solid #ccc;
                padding: 0 5px;
                border-radius: 5px;
            }
            .left{
                float: left;
                margin-right: 50px;   
            }
        </style>
</head>
<body>
    <div id="content">
        <div class="left">
            <form action="" method="post">
                <textarea rows="10" cols="40" name="text"></textarea><br/>
                <input type="submit" value="Отправить">
            </form>
            <p>Колличество английский гласных букв в тексте: <?=$letterEn ?></p>
            <p>Колличество русских гласных букв в тексте: <?=$letterRu ?></p>
        </div>
        <div class="right">
        <? $_POST['text'] = ''; ?>
            <p><?=$_POST['text'] ?></p>
        </div>
    </div>    
</body>
</html>
