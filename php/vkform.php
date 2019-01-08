<?php
//config 
$id_group = ; //id беседы с заказчиком
$access_token = ; //токен из token.php 
   
    
$errorMSG = "";    

// NAME  
if (empty($_POST["name"])) {
    $errorMSG = "Name is required "; 
} else { 
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $mes = $_POST["message"];
}
 
  $message = "Новый заказ на сайте".PHP_EOL."Имя: ".$name.PHP_EOL."Email: ".$email.PHP_EOL."Сообщение: ".$mes;
     
  function send($id , $message, $token) {
    $url = 'https://api.vk.com/method/messages.send'; 
    $params = array(
      'user_id' => $id,    // Кому отправляем
      'message' => $message,   // Что отправляем
      'access_token' => $token,  
      'v' => '5.62',    
    );       
 
    $result = file_get_contents($url, false, stream_context_create(array(
        'http' => array(
          'method'  => 'POST',
          'header'  => 'Content-type: application/x-www-form-urlencoded',
          'content' => http_build_query($params)
        )
    )));  

    if ($result == false)
    {  
      return false;
    } 
 
    return true; 
  
  }      

  $success = send($id_group,$message,$access_token); // id беседы с заказчиком        
   
// redirect to success page 
if ($success && $errorMSG == ""){  
   echo true; 
}else{  
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}  

?>
  
 