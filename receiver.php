<?php
if (count($_GET) != 2 || !isset($_GET['q'])  || !isset($_GET['name'])) exit;
if (strpos(base64_decode($_GET['name']), "\n") !== false) exit;
if (strpos(base64_decode($_GET['q']), "%\\n") !== false) exit;
if (base64_decode($_GET['q']) == "") exit;
if (base64_decode($_GET['name']) == "") exit;

file_put_contents("buffer", "{$_GET['name']} {$_GET['q']}\n", FILE_APPEND);
