<?php
$client_id = '' //id приложения;
$scope = 'offline,messages' //оставляем без изменений ;
?>
												
<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="UTF-8"> 
<title>Document</title> 
</head>
<body> 
<a href="https://oauth.vk.com/authorize?client_id=<?=$client_id;?>&display=page&redirect_uri=https://oauth.vk.com/blank.html&scope=<?=$scope;?>&response_type=token&v=5.37">Получить токен</a>
</body>
</html> 