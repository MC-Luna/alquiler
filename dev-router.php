<?php
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$file = __DIR__ . $uri;

// Static (non-PHP) files: serve directly
if ($uri !== '/' && file_exists($file) && !preg_match('/\.php$/i', $uri)) {
    return false;
}

// PHP files: change CWD to the file's own directory (mimics Apache behaviour)
if (file_exists($file) && preg_match('/\.php$/i', $uri)) {
    chdir(dirname($file));
    require $file;
    return;
}

// Anything else goes to index.php
chdir(__DIR__);
require_once __DIR__ . '/index.php';
