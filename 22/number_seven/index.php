<?php

require __DIR__ . '/Form.php';

$form = new Form();

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
<body>
<?php echo $form->open(['action'=>'index.php', 'method'=>'POST']) . PHP_EOL; ?>
<p>
<?php echo $form->input(['type'=>'text', 'placeholder'=>'Ваше имя', 'name'=>'name']). PHP_EOL; ?>
</p>
<p>
<?php echo $form->password(['placeholder'=>'Ваш пароль', 'name'=>'pass']). PHP_EOL; ?>
</p>
<p>
<?php echo $form->textarea(['placeholder'=>'Ваше сообщение']). PHP_EOL; ?>
</p>
<p>
<?php echo $form->submit(['type' => 'submit', 'value'=>'Отправить']).PHP_EOL; ?>
</p>
<?php echo $form->close(); ?>

</body>
</html>
<!--Можно занести в массив и по одному вызывать(рефлексия)-->