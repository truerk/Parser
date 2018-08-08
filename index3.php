<?php 
  require_once('phpQuery/phpQuery/phpQuery.php');
  
 /* $context = stream_context_create(
    array(
        "https" => array(
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 7.0; WOW32) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
        )
    )
);*/

  //file_get_contents("https://google.com", false, $context);

  //$doc = phpQuery::newDocument('https://www.dns-shop.ru');

  //$html = file_get_contents('https://www.dns-shop.ru');
  //echo "<a href=".'parser.php'.">Первый парсер</a>";
  define(br, '<br>');
  //echo $doc->find('title')->html();
  /*$html = file_get_contents('https://pogoda.yandex.ru');

  $doc = phpQuery::newDocument($html);//подключение документа

  //$title = pq('title')->html();//содержимое тега title
  $title = $doc->find('title')->html();
  
  //$temperature = pq('.fact__feels-like > .term__label')->text();
  echo $temperature.br;
  echo $title;
  $temperature = pq('.fact__feels-like > .term__label')->attr('class');
  echo $temperature.br;

  $forecast = $doc->find('.forecast-briefly__days')->children('.forecast-briefly__day');
  //echo $forecast;
  pq('.dsfds meta[itempro=price]')
  //для обработки в foreach обязательно для ключа pq()
  foreach ($forecast as $day) {
    $day = pq($day);
    $day->find('.time')->remove();    
    $count++;
    $day->append("<p>$count</p>");
    echo $day;
    if ($count == 2) {
      return false;
    }
  }
  $price = pq('span.regular-price meta[itemprop=price]')->attr('content');
  */


  $html = file_get_contents("http://www.stolmeb.ru/kresla-i-stulya/dlya-rukovoditelej.html");

  $doc = phpQuery::newDocument($html);

  echo $doc->find('.block_product')->html();




  phpQuery::unloadDocuments($doc);//закрытие всех процессов

  // $doc = phpQuery::newDocument($html);
  // phpQuery::unloadDocuments($doc);
?>