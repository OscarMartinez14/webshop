<?php

require_once '../Libraries/Dispatcher.php';
require_once '../Libraries/View.php';

session_start();

set_exception_handler('handleException');

function handleException(Throwable $exception)
{
    $error = $exception->getMessage();
    error_log($error);
    exit(header("Location: /error.html"));
    die();
}

Dispatcher::dispatch();

