<?php

$database = require __DIR__ . "/database.php";

return [
    /** Название проекта */
    'name' => 'ErrCode Base Project',

    /** Относительные ссылки на главную страницу и страницу авторизации */
    'homeUrl' => '/directions/',
    'authUrl' => '/',

    'database' => $database,

    /** Названия файлов стилей из public_html/css/, которые нужно подключить */
    'styles' => [
        'main.css',
        'fonts.css',
        'mystyle.css'
    ],

    /** Названия скриптовых файлов из public_html/js/, которые нужно подключить */
    'scripts' => [
        'script.js'
    ],

    /** Ссылка на favicon относительно public_html/ */
    'favicon' => '',

    'errors' => [
        404 => 'errors/404',
        'access' => 'errors/access'
    ],

    'DSA' => [
        "digest_alg" => "sha512",
        "private_key_bits" => 4096,
    ],

    'mail' => [
        'host' => '',
        'username' => '',
        'password' => '',
        /** secure => 'ssl'/'tls' */
        'secure' => '',
        'port' => 25
    ],

    'any' => [

    ]
];