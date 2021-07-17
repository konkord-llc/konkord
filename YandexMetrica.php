<?php 
/*
========================================================================
|контактные данные : почта - art-ti3@yandex.ru , telegram - @manclassic|
========================================================================
*/
namespace konkord;
include_once(__DIR__."/config.php");
 
class YandexMetrika
{
/*
Массив с данными для запроса
*/
public $parametrs = array();
/*
end
*/

   function __construct()
    {
        $this->token = TOKEN;  //токен доступа к янддекс метрике
        $this->counterId = COUNTER_ID;// номер счетчика
        $this->url = ""; // ссылка на яндекс апи пример https://api-metrika.yandex.net/stat/v1/data?
        $this->answer = array(); /// хранит ответ полученный курлом
        $this->parametrs = [];  //передаваемые параметры для запроса
    }
     public function GetFromMetrica()
    {
     /*
      собираем параметры для запроса
     */
     $parametrs = [
	   'ids'  => $this->counterId,
	    'pretty' => 'true'
     ]+$this->parametrs;
      /*
      end
      */
       $this->GetCurl($parametrs);
     /*
      возвращаем ответ
     */       
      return($this->answer);
      /*
      end
      */
    }
   
     public function GetCurl($parametrs)
    {
   
     //собираем запрос и curl ом получаем информацию
       $get = curl_init($this->url . urldecode(http_build_query($parametrs)));
       curl_setopt($get, CURLOPT_HTTPHEADER, array('Authorization: OAuth '.$this->token));
       curl_setopt($get, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($get, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($get, CURLOPT_HEADER, false);
       $result = curl_exec($get);
        curl_close($get);
        $result = json_decode($result, true);
        $this->answer=$result;
    }
  
}
?>