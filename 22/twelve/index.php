<?php

require __DIR__ . '/Db.php';

$conn = new Db();

$conn->insert('MyGuests', 'test', 'Lazarev', 'andrey20010012@gmail.com');

$conn->getData('firstname', 'MyGuests', 28);

$conn->update('MyGuests', 'firstname', 'Tanya', 1);

$conn->getData('firstname', 'MyGuests', 1);

$conn->count('MyGuests');



