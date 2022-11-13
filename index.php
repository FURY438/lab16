<?php
echo '<h3>Москалик Василь, СП-41 (4.11.2022)</h3>';
echo '<br>';
?>
<div>
    <?php
    echo "<h3>Завдання 1. Кодування та декодування тексту</h3>";
    echo '<form action="" method="post">
    <input type="text" name="string" placeholder="Введіть текст:" ><br>
    <label> Закодувати
    <input type="checkbox" name="encoding">
</label><br>
<label> Розкодувати
    <input type="checkbox" name="decoding">
</label><br>
    <input type="submit" name="coding" value="Виконати">
</form>';

    function enCoding($text){
        $str='';
        for($i = 0; $i < strlen($text); $i++) {
            $str .= '/'.dechex(ord($text[$i]));
        }

        return $str;
    }
    function deCoding($text){
        for($i = 0; $i < strlen($text);$i++) {
            if($text[$i]=='/'){
                $text=substr_replace($text,'',$i,1);


            }
        }
        $str1='';
        $step=0;
        for($i = 0; $i < strlen($text);$i++){
            $str1.=chr(hexdec(substr($text,$step,2)));
            $step+=2;
        }

        return $str1;
    }

if(isset($_POST["encoding"])){
    echo enCoding($_POST["string"]);
}
else if(isset($_POST["decoding"])){
    echo deCoding($_POST["string"]);
}


    ?>
</div>
<div>

    <?php
    echo "<h3>Завдання 2</h3>";
    echo '<img src="Screenshot_1.png"/>';
    echo '<br>';
echo '<form action="" method="post">
    <input type="text" name="string_2" placeholder="Введіть П.І.Б. :" >
    <input type="submit" name="task_2" value="Виконати">
</from>';
$regexp="%[a-zа-я]%";
 $text=$_POST["string_2"];
    if(preg_match($regexp,$text)){
        $personalInfo=array();
        $start = -1;
        while ( $start <> 0 )
        {
            $end = strpos( $text, " ", $start + 1 );
            if ( $end == 0 )
                $personalInfo[] = substr( $text, $start + 1, strlen( $text ) - $start - 1 );

     else
         $personalInfo[] = substr( $text, $start + 1, $end - $start - 1 );
     $start = $end;
     }

        $lastNameLength=strlen($personalInfo[0]);
        $firstNameLength=strlen($personalInfo[1]);
        $dadNameLength=strlen($personalInfo[2]);
        $lastNameRevers=strrev($personalInfo[0]);
    }
    else
        echo "Потрібно вводити тільки букви!!";
    ?>
</div>
<div>
<?php
echo "<br>Довжина прізвища: $lastNameLength";
?>
</div>

<div>
<?php
echo "<br>Довжина ім'я: $firstNameLength";
?>
</div>
<div>
<?php
echo "<br>Довжина по батькові: $dadNameLength";
?>
</div>
    <div>
<?php
echo "<br>Прізвище задом на перед: $lastNameRevers";
?>
</div>

