<?php

return [

     // register
    '' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    //login Controller
    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    //content pages with  letters
    'account/inbox' => [
        'controller' => 'account',
        'action' => 'inbox',
    ],
    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout',
        ],
    'account/message' => [
        'controller' => 'account',
        'action' => 'message',
    ],
    'account/sent' => [
        'controller' => 'account',
        'action' => 'sent',
    ],
];