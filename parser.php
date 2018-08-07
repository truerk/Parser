<?php 
  function Parser($p1, $p2, $p3){
    //получаем позицию начала (в виде числа) где начинается $p2 в $p1
    $num1 = strpos($p1, $p2);
    if($num1 === false) return 0;
    //обрезаем страницу до найденого 1 элемента $num1
    $num2 = substr($p1, $num1);
    //возвращаем обрезанный элемент с обрезанной страницы $num2, до 2 элемента $p3(при этом получаем позцию 2 элемента $p3)
    return strip_tags(substr($num2, 0, strpos($num2, $p3)));
  }
 
  $string = file_get_contents('https://togliatti.hh.ru/');
  $div1 = '<div class="footer__additional-text">';
  $div2 = '</div>';
  echo Parser($string, $div1, $div2);
  // substr(строка, откуда начинать, сколько символов обрезать'длина');
?>