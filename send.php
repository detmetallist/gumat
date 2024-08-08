<?php
  error_reporting(E_ALL);
  $sendto   = "gumatkaliyadp@gmail.com";
  $subject  = "Заявка с сайта"; 
  $headers = 'From: Гумат Калия <no-reply@gumatkaliya.com.ua>' . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
  if(isset($_POST['name'])) {$name = $_POST['name']; }
  if(isset($_POST['phone'])) {$phone = $_POST['phone']; } 
  if(isset($_POST['email'])) {$mail = $_POST['email']; }
  if(isset($_POST['cena'])) {$cena = $_POST['cena']; }
  if(isset($_POST['kol_litr'])) {$kol_litr = $_POST['kol_litr']; }
  if(isset($_POST['vid_producta'])){
    if($_POST['vid_producta']=='1'){$vid_producta='Гумат калия Стандарт'; }
    elseif($_POST['vid_producta']=='2'){$vid_producta='Гумат калия Зерновой'; }
    elseif($_POST['vid_producta']=='3'){$vid_producta='Гумат калия Кукуруза'; }
    elseif($_POST['vid_producta']=='4'){$vid_producta='Гумат калия Бор'; }
    elseif($_POST['vid_producta']=='5'){$vid_producta='Гумат калия Масличные'; }
    elseif($_POST['vid_producta']=='6'){$vid_producta='Гумат калия Индивидуальные разработки'; }
  }
  if(isset($_POST['nazv_tov'])){
    if($_POST['nazv_tov']=='1'){$nazv_tov='Гумат калия Стандарт'; }
    elseif($_POST['nazv_tov']=='2'){$nazv_tov='Гумат калия Зерновой'; }
    elseif($_POST['nazv_tov']=='3'){$nazv_tov='Гумат калия Кукуруза'; }
    elseif($_POST['nazv_tov']=='4'){$nazv_tov='Гумат калия Бор'; }
    elseif($_POST['nazv_tov']=='5'){$nazv_tov='Гумат калия Масличные'; }
    elseif($_POST['nazv_tov']=='6'){$nazv_tov='Гумат калия Индивидуальные разработки'; }
  }
  $msg  = "<html><body style='font-family:Arial,sans-serif;'>";
  $msg  .= "К вам поступила заявка<br>";
  if(isset($name))  {$msg.=" Имя - ".$name."<br>"; }
  if(isset($phone))  {$msg.=" Телефон - ".$phone."<br>"; }
  if(isset($mail))  {$msg.=" e-mail - ".$mail."<br>"; }
  if(isset($vid_producta)) {$msg.=" Продукт - ".$vid_producta."<br>"; }
  if(isset($nazv_tov)) {$msg.=" Продукт - ".$nazv_tov."<br>"; }
  if(isset($kol_litr)) {$msg.=" Количество - ".$kol_litr."<br>"; }
  if(isset($cena)) {$msg.=" Цена со скидкой - ".$cena."<br>"; }
  $msg .= "</body></html>";
  if(mail($sendto, $subject, $msg, $headers)) {
      echo "<center>Заявка отправлена!</center>";
  } else {
      echo "<center>Заявка не отправлена!</center>";
  }

  $picture = "price.xls"; 
   // Если поле выбора вложения не пустое - закачиваем его на сервер 
    $path = 'price.xls'; 
   $thm = 'gumatkaliya.com.ua - прайс лист'; //Тема письма
   $msg = 'gumatkaliya.com.ua - прайс лист'; //Текст сообщения
   $mail_to = $mail; //Адрес получателя

   // Отправляем почтовое сообщение 
   if(empty($picture)) mail($mail_to, $thm, $msg); 
   else send_mail2($mail_to, $thm, $msg, $picture);

   function send_mail2($mail_to, $thema, $msg, $path) { 
   // Вспомогательная функция для отправки почтового сообщения с вложением
   // Параметры - адрес получателя, тема письма, текст письма, путь к загруженному файлу
   if ($path) {  
    $fp = fopen($path,"rb");   
    if (!$fp) { print "Cannot open file"; exit(); }   
    $file = fread($fp, filesize($path));   
    fclose($fp);   
   }  
   $name = basename($path); // в этой переменной надо сформировать имя файла (без пути)  
   $EOL = "\r\n"; // ограничитель строк, некоторые почтовые сервера требуют \n - подобрать опытным путём
   $boundary     = "--".md5(uniqid(time()));  // любая строка, которой не будет ниже в потоке данных.  
   $headers    = "MIME-Version: 1.0;$EOL";   
   $headers   .= "Content-Type: multipart/mixed; boundary=\"$boundary\"$EOL";  
   $headers   .= "From: noreply@gumatkaliya.com.ua";  
   $multipart  = "--$boundary$EOL";
   $multipart .= "------------".$bondary."\nС уважением, компания «Евротехресурс»\n";
   $multipart .= "\n\n$msg\n\n";
   $multipart .= $EOL; // раздел между заголовками и телом html-части 
   $multipart .=  "$EOL--$boundary$EOL";   
   $multipart .= "Content-Type: application/octet-stream; name=\"$name\"$EOL";   
   $multipart .= "Content-Transfer-Encoding: base64$EOL";   
   $multipart .= "Content-Disposition: attachment; filename=\"$name\"$EOL";   
   $multipart .= $EOL; // раздел между заголовками и телом прикрепленного файла 
   $multipart .= chunk_split(base64_encode($file));   
   $multipart .= "$EOL--$boundary--$EOL";   
   if (!mail($mail_to, $thema, $multipart, $headers)) { //если не письмо не отправлено
    return false;          
    echo "Письмо не отправлено"; 
   }  
   else { // если письмо отправлено
    return true; 
    echo "Письмо отправлено";
   }  
   exit;  
  }

  die($subject . '/' . $text);
?>