# konkord
Yandex Metrika API (PHP) Библиотека на чистом php

Установка: 
1) В файле <code>config.php </code>прописать токен доступа и номер счетчика
2) К проекту подключить<code> include_once(__DIR__."/YandexMetrica.php");</code>
3) создаем объект<code> $getMetrica->new konkord\YandexMetrika();</code>
4) передаем url api<code> $getMetrica->url = "https://api-metrika.yandex.net/stat/v1/data/bytime?";</code>
5) Передаем необъодимые параметры <code>
$getMetrica->parametrs = [<br>
'date1'   => 'today', // $startDate < $endDate. дата начала <br>
'date2'   =>'today', //дата конца<br>
'metrics'  =>'ym:s:visits,ym:s:pageviews,ym:s:users,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds' // показатели<br>
];</code><br>
6) вызываем   <code>$result=$getMetrica->GetFromMetrica();</code>
7) выводим результат работы<br>
<code>var_dump($result);</code>
    
/*
Для желающих отблагодарить, сбер карта: 2202 2018 6769 5815
*/
