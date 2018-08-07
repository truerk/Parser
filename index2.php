<?php 
  require_once('phpQuery/phpQuery/phpQuery.php');
  function pr($var) {
    static $int=0;
    echo '<pre><b style="background: #909090;padding: 1px 5px; color:#fff">'.$int.'</b> ';
    print_r($var);
    echo '</pre>';
    $int++;
  }

  define(br, '<br>');
  /*foreach ($forecast as $day) {
    $day = pq($day);
    $day->find('.time')->remove();   
  }
  $temperature = pq('.fact__feels-like > .term__label')->text();
  $title = $doc->find('title')->html();*/

  /*  
  ===================================
  $html = file_get_contents("");
  $doc = phpQuery::newDocument($html);shopwindow-products
  phpQuery::unloadDocuments($doc);
  ===================================
  */

  /* ======================= curl ======================= */

  //сеанс курл и возвращает дескриптор для setopt, exec, close
  /*$ch = curl_init('http://dns-shop.ru');

  //установка параметров (дескриптор, название опции, значение)
  //CURLOPT_RETURNTRANSFER true - данные в результате запроса сохраняются в переменную
  //CURLOPT_FOLLOWLOCATION true - следовать редиректам, CURLOPT_MAXREDIRS но не более 10 раз
  //SSL_VERIFYHOST false для https
  //SSL_VERIFYPEER false
  //CURLOPT_NOBODY true - только заголовки
  //CURLOPT_HEADER true -получение заголовков
  //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file) - файл, куда пишутся куки
  //curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file) - файл, откуда читаются куки
  //curl_setopt($ch, CURLOPT_COOKIESESSION, true); - передаются только нормадбные куки с временем

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, true);
  curl_setopt($ch, CURLOPT_NOBODY, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
  curl_setopt($ch, CURLOPT_COOKIE, 'curl_check=2');
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
  curl_setopt($ch, CURLOPT_PROXY, '83.149.198.196:1080');
  curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
  curl_setopt($ch, CURLOPT_TIMEOUT, 9); на загрузку данных
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 6); в течение которго соединение должно быть установлено

  $html = curl_exec($ch);
  echo $html;
  curl_close($ch);*/

  /* ======================= curl cookies ======================= */

  /*$cookiefile = $_SERVER['DOCUMENT_ROOT'].'/cookie.txt';

  $ch = curl_init('http://companion/');

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, true);
  //curl_setopt($ch, CURLOPT_COOKIE, 'curl_check=3');
  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
  curl_setopt($ch, CURLOPT_COOKIESESSION, true);


  $html = curl_exec($ch);
  var_dump($html);
  curl_close($ch);*/

  /* ======================= curl post ======================= */
  /*$cookiefile = $_SERVER['DOCUMENT_ROOT'].'/cookie.txt';

  function request($url, $cf, $postdata = null){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36');
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cf);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cf);
    //curl_setopt($ch, CURLOPT_COOKIE, 'login_id=5; login_name=admin; login_pass=c3284d0f94606de1fd2af172aba15bf3');

    if ($postdata) {
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    }

    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
  }


  file_put_contents('cookie.txt', '');//обнуляем файл

  //$html = request('http://companion/', $cookiefile);

  $post = [
    'login' => 'admin',
    'pass' => 'admin',
    'remember' => 'yes'
  ];

  $html = request('http://companion/login.php', $cookiefile, $post);
  echo $html;
  $html = request('http://yandex.ru/', $cookiefile);
  var_dump($html);*/

  /* ======================= curl прокси ======================= */

  /*function request($url, $cf, $postdata = null){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);    
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36');

    curl_setopt($ch, CURLOPT_COOKIEJAR, $cf);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cf);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //curl_setopt($ch, CURLOPT_COOKIE, 'login_id=5; login_name=admin; login_pass=c3284d0f94606de1fd2af172aba15bf3');

    curl_setopt($ch, CURLOPT_PROXY, '93.170.123.77:1080');
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);

    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);


    if ($postdata) {
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    }

    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
  }


  file_put_contents('cookie.txt', '');
  $post = [
    'login' => 'admin',
    'pass' => 'admin',
    'remember' => 'yes'
  ];

  //$html = request('http://httpbin.org/ip', $cookiefile);
  //https://hidemyna.me/en/proxy-list/?country=RUUA&ports=1080&type=45#list

  $html = request('http://avito.ru', $cookiefile);  
  $doc = phpQuery::newDocument($html);
  echo $doc->find(title)->html();
  //echo $doc->find('.shopwindow-products');
  phpQuery::unloadDocuments($doc);

  $ch для открытия, настройки и закрытия курл, потом его передаем в phpQuery

  */

  /* ======================= curl многопоточность ======================= */
  //$multi = curl_multi_init(); - Позволяет асинхронную обработку множества cURL-дескрипторов
  //curl_multi_add_handle($mh, $ch); - Добавляет обычный cURL-дескриптор к набору cURL-дескрипторов, те в массиве из 1 $ch соединяет несколько
  //$mrc == CURLM_CALL_MULTI_PERFORM пока mrc равен этой константе, работа еще не завершена
  //curl_multi_select() - Блокирует выполнение скрипта, пока какое-либо из соединений curl_multi не станет активным. врнет -1 если ошибка
  //curl_multi_getcontent вернет содержимое этого cURL-дескриптора в виде строки
  //curl_multi_remove_handle($mh, $channel);
  //$urls = array_chunk($urls, 2); разбиваем урл на под массивы если их слишком много
  $i = 20;
  while ( $i <= 120) {
    $urls [] = 'http://www.stolmeb.ru/kresla-i-stulya/dlya-rukovoditelej.html?start='.$i;
    $i = $i + 20;
  }

  $urls = array_chunk($urls, 2);//настраиваем потоки

  pr($urls);
  function multicurl($u){
    $urls = $u;

    #create mh
    $mh = curl_multi_init();
    $handles = [];

    foreach ($urls as $url) {
      #create ch
      $ch = curl_init($url);

      #add option for ch
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_PROXY, '93.170.123.77:1080');
      curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
      curl_setopt($ch, CURLOPT_TIMEOUT, 100);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

      #add ch in mh
      curl_multi_add_handle($mh, $ch);

      $handles[$url] = $ch;          
    }

    pr($handles);  

    $active = null;
    do {
      #run mh
      $mrc = curl_multi_exec($mh, $active);
    } while ($mrc == CURLM_CALL_MULTI_PERFORM);

    #check result
    while ($active && $mrc == CURLM_OK) {
      if (curl_multi_select($mh) == -1) {
        usleep(100);
      }

      do{
        $mrc = curl_multi_exec($mh, $active);
      }while ($mrc == CURLM_CALL_MULTI_PERFORM); 
    }

    //get html for phpQuery from ch
    foreach ($handles as $channel) {
      //получаем типо exec(ch)
      $html = curl_multi_getcontent($channel);
      //$doc[] = phpQuery::newDocument($html);
      /*$htmls[] = $html;
      return $htmls;*/
      $doc = phpQuery::newDocument($html);
      $product[] = $doc->find('.block_product')->html();
      //удаляем хандлы ch
      curl_multi_remove_handle($mh, $channel);
    }  
    curl_multi_close($mh);

    return $product;
  }
  $i = 0;

  //прогоняем продукт_лист
  foreach ($urls as $chunk) {  
    $product = multicurl($chunk);
    foreach ($product as $p) {
      $prod = pq($p);
      $name = $prod->find('.name');
      //прогоняем найденные имена кресел в текущем продукт_лист и выводим их
      foreach ($name as $n) {
        $i++;
        echo pq($n);
        echo br;
        echo $i;
      }
    }
  }
  //php curl class библиотека php
  //научиться получать количество сылок
  //научиться переключаться между сылками
  //начиться работать с аякс - динамическими страницами
  //научиться делать калбек - если успешно{}, если ошибка {}
  //Burpsuite только когда надо прокси с перехватом
  //postman
  //иногда если не работает, нужно отправлять заголвки
  //curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-Requested-With: XMLHttpRequest', 'Accept-Language: ru-RU']);

  /* ================= Последовательность работы с cURL =================
  
  1) инициализируем $ch = curl_init($url);
  2) настраиваем curl_setopt($ch)
  3) выполняем curl_exec($ch) p.s после отправки в phpQuery закрываем curl_close($ch)
  4) отправляем ch в phpQuery ( 
                                1 - $html = curl_exec(ch)
                                2 - $doc = phpQuery::newDocument($html)
                              )
  5) работает с полученной страничкой $product = $doc->find('.product')
  7) после прогонки в foreach обязательно для элемента сделать pq(элемент)
  8) чтобы работать с найденными элементами, нужно обязательно сделать pq(элемент)

  ======================================================================= */



  /* ================= Последовательность работы с multicURL =================
  1) получаем массив адрессов ($urls);
    1.1) если много урл, то можно разбить на под массивы - $urls = array_chunk($urls, 2);
  2) инициализируем $mh и создаем массив $handles для наших будущих ch
    function multicurl($u){
      $urls = $u;
    }
    2.1) $mh = curl_multi_init();
    2.2) $handles = [];
  3) перебераем в foreach наш массив адрессов foreach ($urls as $url), где мы:
    3.1) инициализируем - $ch = curl_init($url);
    3.2) настраиваем - curl_setopt($ch);
    3.3) добавляем нащи ch в mh - curl_multi_add_handle($mh, $ch);
    3.4) в массив $handles закидываем наши ch - $handles[$url] = $ch;
    3.5)  foreach ($urls as $url) {
            #create ch
            $ch = curl_init($url);

            #add option for ch
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_PROXY, '93.170.123.77:1080');
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);

            curl_setopt($ch, CURLOPT_TIMEOUT, 100);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

            #add ch in mh
            curl_multi_add_handle($mh, $ch);

            $handles[$url] = $ch;    
          }
  4) запускаем mh через массив:
    4.1)  $active = null;
          do {
            #run mh
            $mrc = curl_multi_exec($mh, $active);
          } while ($mrc == CURLM_CALL_MULTI_PERFORM);
  5) проверяем результаты через массив:
    5.1)  while ($active && $mrc == CURLM_OK) {
            if (curl_multi_select($mh) == -1) {
              usleep(100);
            }

            do{
              $mrc = curl_multi_exec($mh, $active);
            }while ($mrc == CURLM_CALL_MULTI_PERFORM); 
          }
  6) прогоняем наш массив $handles для инициализации всех ch и последующей отправки в phpQuery в виде массива и закрываем хандлы:
    6.1)  foreach ($handles as $channel) {
            //получаем типо exec(ch)
            $html = curl_multi_getcontent($channel);
            $doc = phpQuery::newDocument($html);
            $product[] = $doc->find('.block_product')->html();
            //удаляем хандлы ch
            curl_multi_remove_handle($mh, $channel);
          }
  7) закрываем $mh - curl_multi_close($mh) 
  8) далее пример работы с полученными данными:
    $urls = array_chunk($urls, 2);//настраиваем потоки
    foreach ($urls as $chunk) {  
      $product = multicurl($chunk);
      {}
    }
   8.1) //прогоняем массив с продукт_лист
        foreach ($product as $p) {
          $prod = pq($p);
          $name = $prod->find('.name');
          //прогоняем массив с найденными имена кресел в текущем продукт_лист и выводим их
          foreach ($name as $n) {
            $i++;
            echo pq($n);
            echo br;
            echo $i;
          }
        }
  9) можно это запихнуть в функцию и возвращать тот же продукт $product = multicurl($urls);
   9.1) $htmls[] = $html;
   9.2) return $htmls;
  ======================================================================= */

  
?>