<?php

error_reporting(E_ALL);

require __DIR__ . '/Session.php';
require __DIR__ . '/Flash.php';

$session = new Session();

$session->createSession("user1", "Andrew Lazarev");

echo  "<p>{$session->getNameSession()}</p>";
echo "<p>{$session->checkSession($session->getNameSession())}</p>";



$message = new Flash;
$message->setMessage('message1', $_POST["user_name"]);
echo $message->getMessage($_POST["user_name"]);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<form method="post">
    <label>
        <input name="user_name" placeholder = "your name "type="text" maxlength="20" size="25" value="" />
    </label>
    <label>
        <input name = "send" type="submit" maxlength="20" size="25" value="Send form" />
    </label>
</form>
</body>
</html>

