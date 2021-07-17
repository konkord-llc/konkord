<?php 

include_once(__DIR__."/YandexMetrica.php");
 /*
 =====================================================================================================================
 Для вызова функции нужно передать два обязательных параметра:
 1)
 $getMetrica->url = "https://api-metrika.yandex.net/stat/v1/data/bytime?"; используется для вывода показателя сайта
 or
 https://api-metrika.yandex.net/stat/v1/data?   используется для вывода например поисковых запросов
 =====================================================================================================================
 2)
 $getMetrica->parametrs = [
	   'date1'   => 'today', // $startDate < $endDate
	   'date2'   =>'today',
	   'metrics'  =>'ym:s:visits'
     ];
 параметры можно взять из оф. документации https://yandex.ru/dev/metrika/doc/api2/api_v1/attrandmetr/dim_all.html
 =====================================================================================================================
Доступные параметры :
 & metrics=<string>
 & [accuracy=<string>]
 & [callback=<string>]
 & [date1=<string>]
 & [date2=<string>]
 & [dimensions=<string>]
 & [direct_client_logins=<string,_string,...>]
 & [filters=<string>]
 & [id=<integer>]
 & [include_undefined=<boolean>]
 & [lang=<string>]
 & [limit=<int>]
 & [offset=<int>]
 & [preset=<string>]
 & [pretty=<boolean>]
 & [proposed_accuracy=<boolean>]
 & [sort=<string>]
 & [timezone=<string>]
 ссылка - https://yandex.ru/dev/metrika/doc/api2/api_v1/data.html
=====================================================================================================================
*/
 
$getMetrica = new konkord\YandexMetrika();
$getMetrica->url = "https://api-metrika.yandex.net/stat/v1/data/bytime?";
$getMetrica->parametrs = [
	   'date1'   => 'today', // $startDate < $endDate
	   'date2'   =>'today',
	   'metrics'  =>'ym:s:visits,ym:s:pageviews,ym:s:users,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds' 
     ];
       $result=$getMetrica->GetFromMetrica();
       //echo '<pre>';
       //var_dump($result);
       //echo '</pre>';
        
unset($getMetrica);
     	
echo ("Визиты ".$result['totals'][0][0]."<br>");

// Просмотры	
echo ("Просмотры".$result['totals'][0][1]."<br>");
 
// Посетители	
echo ("Посетители".$result['totals'][0][2]."<br>");
 
// Отказы, %
echo ("Отказы, %".$result['totals'][0][3]."<br>");
 
// Глубина просмотра	
echo ("Глубина просмотра".$result['totals'][0][4]."<br>");
 
// Время на сайте, сек.
echo ("Время на сайте, сек.".$result['totals'][0][5]."<br>");

//==========================================ПРИМЕР 2=========================
$getMetrica = new konkord\YandexMetrika();
$getMetrica->url = "https://api-metrika.yandex.net/stat/v1/data?";
$getMetrica->parametrs = [
	   'date1'   => '7daysAgo', // $startDate < $endDate
	   'date2'   =>'today',
	   'preset'  =>'geo_country',
	   'date1'   => '7daysAgo', // $startDate < $endDate
	   'date2'   =>'today'
     ];
        $result=$getMetrica->GetFromMetrica();
        // echo '<pre>';
       //  var_dump($result);
        //  echo '</pre>';
  unset($getMetrica);        
//==========================================ПРИМЕР 3=========================          
          
$getMetrica = new konkord\YandexMetrika();
$getMetrica->url = "https://api-metrika.yandex.net/stat/v1/data?";
$getMetrica->parametrs = [
	   'date1'   => '7daysAgo', // $startDate < $endDate
	   'date2'   =>'today',
	   'preset'  =>'publishers_sources'
     ];
      $result=$getMetrica->GetFromMetrica();
         // echo '<pre>';
        //  var_dump($result);
       //   echo '</pre>';         
      unset($getMetrica);  
//==========================================ПРИМЕР 4=========================  

$getMetrica = new konkord\YandexMetrika();
$getMetrica->url = "https://api-metrika.yandex.net/stat/v1/data?";
$getMetrica->parametrs = [
	   'date1'   => '30daysAgo', // $startDate < $endDate
	   'date2'   =>'today',
	   'preset'  =>'sources_search_phrases'
     ];
       $result=$getMetrica->GetFromMetrica();
    
echo("<table>
<tr><td>Источник:</td> <td>Фраза:</td> <td>Визиты:</td> <td>Посетители:</td> <td>Отказы:</td> <td>Глубина просмотра:</td> <td>Время на сайте:</td></tr>");
foreach ($result['data'] as $row) {
	echo ("<tr><td>".$row['dimensions'][1]['name']."</td><td>".$row['dimensions'][0]['name']."</td><td>".$row['metrics'][0]."</td><td>".$row['metrics'][1].
	"</td><td>".$row['metrics'][2]."</td><td>".$row['metrics'][3]."</td><td>".$row['metrics'][4]."</td></tr>");
}
echo("</table>");        
        

?>